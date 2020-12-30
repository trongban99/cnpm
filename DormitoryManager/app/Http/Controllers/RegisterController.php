<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Room;
use App\Models\Service;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    public function Authlogin()
    {
        $User_id = Auth::id();
        if ($User_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('login-acount')->send();
        }
    }
    public function list_register()
    {
        $this->Authlogin();
        $list_register = Registration::where('Registration.Registration_status', '0')->join('Room', 'Room.Room_id', '=', 'Registration.Room_id')
            ->join('Users', 'Users.User_id', '=', 'Registration.Student_id')
            ->select('Registration.*', 'Room.Room_name', 'Users.User_name')->get();
        return view('Staff.Manage_register.list_register')->with(compact('list_register'));
    }
    public function comfirm_register($id)
    {
        $this->Authlogin();
        $res = Registration::find($id);
        $res->update(['Registration_status' => 1]);
        return redirect('/list-register')->with('message', 'Phê duyệt đơn đăng ký thành công!');
    }
    // Đăng ký ký túc xá

    public function emptyRoom()
    {
        $room = DB::select("SELECT room.Room_id, room.Room_name,room.Number_people,
        case 
            When (room.Number_people - A.SL) is null then room.Number_people
            else (room.Number_people - A.SL)
            END
        as Conlai
        FROM room
        left JOIN ( SELECT `Room_id`, COUNT(`Room_id`) as SL From Registration WHERE `Registration_status`=1 GROUP by `Room_id`) as A
        ON room.Room_id = A.room_id
        WHERE 
        (CASE	
            When (room.Number_people - A.SL) is null then room.Number_people >0
            else (room.Number_people - A.SL) >0
            END)");

        return view('Staff.Manage_register.emptyRoom')->with(compact('room'));
    }
    public function registerRoom($room_id)
    {
        $room = Room::find($room_id);

        $serviceOfRoom = Room::where('Room.Room_id', $room_id)
            ->Join('service_room', 'service_room.Room_id', '=', 'Room.Room_id')
            ->join('service', 'service.Service_id', '=', 'service_room.Service_id')->select('service.Service_id', 'service.Service_name')->get();
        $service2 = array();
        foreach ($serviceOfRoom as $k => $v) {
            array_push($service2, $v->Service_id);
        }
        $service = Service::wherenotIn('Service_id', $service2)->select('service.Service_id', 'service.Service_name')->get();
        $student = DB::select("SELECT student.Student_id, users.User_name ,registration.Registration_status 
                FROM student
                left JOIN Registration
                on student.Student_id = Registration.Student_id
                left JOIN users
                on users.User_id= student.Student_id
                WHERE registration.Registration_status =2 or registration.Registration_status is Null");
        return view('Staff.Manage_register.registerRoom')->with(compact('room', 'service', 'serviceOfRoom', 'student'));
    }
    public function saveRegister(Request $request)
    {
        $this->Authlogin();
        $data = $request->all();
        $register = new Registration();
        $register->Room_id = $data['Room_id'];
        $register->Student_id = $data['Student_id'];
        $register->NumberOfMonth = $data['NumberOfMonth'];
        $register->Registration_create = $data['Registration_create'];
        $register->Registration_status = 0;
        // Lưu đăng ký
        $register->save();
        //Lưu thêm dịch vụ
        if (isset($data['Service'])) {
            $service_register = $data['Service'];
            foreach ($service_register as $k) {
                DB::table('service_room')->insert(['Room_id' => $data['Room_id'], 'Service_id' => $k]);
            }
        }
        return redirect('/list-register')->with('message', 'Đăng ký thành công!');
    }
}
