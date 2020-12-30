<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Bill_Detail;
use App\Models\Registration;
use App\Models\Roles;
use App\Models\Room;
use App\Models\Service;
use App\Models\Staff;
use App\Models\Student;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
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
    public function index()
    {
        $this->Authlogin();
        return view('Student_layout');
    }
    public function list_student()
    {
        $this->Authlogin();
        $student = Student::leftJoin('Users', 'Users.User_id', '=', 'Student.Student_id')->orderBy('Student.Student_id','desc')->get();
        return view('Staff.Manage_student.list_student')->with(compact('student'));
    }
    public function add_student()
    {
        $this->Authlogin();
        return view('Staff.Manage_student.add_student');
    }
    public function save_student(Request $request)
    {
        $this->Authlogin();
        $data = $request->all();
        $user = new Users();
        $user->User_acount = $data['User_acount'];
        $user->User_password = md5($data['User_password']);
        $user->User_name = $data['User_name'];
        $user->Date_of_birth = $data['Date_of_birth'];
        $user->User_sex = $data['User_sex'];
        $user->User_address = $data['User_address'];
        $user->User_email = $data['User_email'];
        $user->User_folk = $data['User_folk'];
        $user->User_phone = $data['User_phone'];
        $get_image = $request->file('User_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/staff', $new_image);
            $user->User_image = $new_image;
        } else {
            $user->User_image = 'avatar2.png';
        }
        $check = Users::where('User_acount', $user->User_acount)->first();
        if (isset($check)) {
            Session::put('message', 'Tài khoản đã tồn tại.');
            return Redirect::to('add-student');
        } else {
            $user->save();
            //lưu quyền sinh viên
            $studentRoles = Roles::where('name', 'user')->first();
            $user->roles()->attach($studentRoles);

            //Lưu bảng sinh viên
            $id_student = $user->User_id;
            $student = new Student();
            $student->Student_id = $id_student;
            $student->Student_class = $data['Student_class'];
            $student->Student_faculty = $data['Student_faculty'];
            $student->save();
            Session::put('message', 'Thêm sinh viên thành công');
            return Redirect::to('add-student');
        }
    }

    public function edit_student($User_id)
    {
        $this->Authlogin();
        $student1 = Student::find($User_id);
        $student = Users::find($User_id);
        return view('Staff.Manage_student.edit_student')->with(compact('student', 'student1'));
    }
    public function update_student($User_id, Request $request)
    {
        $this->Authlogin();
        $data = $request->all();
        $user = Users::find($User_id);
        $user->User_password = md5($data['User_password']);
        $user->User_name = $data['User_name'];
        $user->Date_of_birth = $data['Date_of_birth'];
        $user->User_sex = $data['User_sex'];
        $user->User_address = $data['User_address'];
        $user->User_email = $data['User_email'];
        $user->User_folk = $data['User_folk'];
        $user->User_phone = $data['User_phone'];
        $get_image = $request->file('User_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/staff', $new_image);
            $user->User_image = $new_image;
        }
        $user->save();
        $student = Student::find($User_id);
        $student->Student_class = $data['Student_class'];
        $student->Student_faculty = $data['Student_faculty'];
        $student->save();
        Session::put('message', 'Sửa sinh  viên thành công');
        return redirect('/list-student');
    }
    public function delete_student($User_id)
    {
        $this->Authlogin();
        $user = Users::find($User_id);
        if ($user) {
            //Xóa bảng user và xóa quyền Xóa quyền
            $user->roles()->detach();
            $user->delete();
            //Xóa bảng sinh viên
            $student = Student::find($User_id);
            $student->delete();
            Session::put('message', 'Xóa sinh viên thành công');
            return redirect('/list-student');
        }
    }


    //----------info-------------------------------------
    public function info_student($student_id)
    {
        $this->Authlogin();
        //$student = Student::leftJoin('Users','Users.User_id','=','Student.Student_id')->where('Student.Student_id',$student_id)->get();
        $student = Student::find($student_id);
        $student1 = Users::find($student_id);
        return view('Student.info.info_student')->with(compact('student', 'student1'));
    }
    public function edit_info($User_id)
    {
        $this->Authlogin();
        $student1 = Student::find($User_id);
        $student = Users::find($User_id);
        return view('Student.info.edit_info')->with(compact('student', 'student1'));
    }
    public function update_info_student($User_id, Request $request)
    {
        $this->Authlogin();
        $data = $request->all();
        $user = Users::find($User_id);
        $user->User_password = md5($data['User_password']);
        $user->User_name = $data['User_name'];
        $user->Date_of_birth = $data['Date_of_birth'];
        $user->User_sex = $data['User_sex'];
        $user->User_address = $data['User_address'];
        $user->User_email = $data['User_email'];
        $user->User_folk = $data['User_folk'];
        $user->User_phone = $data['User_phone'];
        $get_image = $request->file('User_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/staff', $new_image);
            $user->User_image = $new_image;
        }
        $user->save();
        $student = Student::find($User_id);
        $student->Student_class = $data['Student_class'];
        $student->Student_faculty = $data['Student_faculty'];
        $student->save();
        Session::put('message', 'Thay đổi thông tin cá nhân thành công');
        return redirect('/student');
    }




    // --------------- paybill---------------------------
    public function list_paybill($student_id)
    {
        $this->Authlogin();

        $room = Registration::where('Student_id', $student_id)->where('Registration_status', 1)->select('Room_id')->first();
        if ($room) {
            $room_id = $room->Room_id;
            $list_bill = Bill::where('Room_id', $room_id)->where('Bill_status', 0)->get();
            $check = Bill::where('Room_id', $room_id)->where('Bill_status', 1)->count();
            return view('Student.Paybill.list_paybill')->with(compact('list_bill', 'student_id', 'room_id','check'));
        } else {
            return redirect('/student')->with('message', 'Bạn chưa có hóa đơn thanh toán!');
        }
    }

    public function detail_bill($student_id, $room_id, $bill_id)
    {
        $this->Authlogin();
        // Chi tiet hoa don
        $service_detail = Bill_Detail::join('Service', 'Service.Service_id', '=', 'Bill_Detail.Service_id')
            ->where('Bill_id', $bill_id)
            ->select('Bill_Detail.*', 'Service.Service_name')
            ->get();
        // Chi tiet phong
        $find = Bill::where('Bill_id', $bill_id)->select('Bill_create')->first();
        $date = $find->Bill_create;
        $arr_date = explode('-', $date, 3);
        $month = $arr_date[1];
        $info_room =  Room::JoinSub('SELECT Room_id, COUNT(Room_id) as SLDK
            From Registration 
            WHERE Registration_status =1 and  month(Registration_create) <=' . $month . ' and registration.Room_id =' . $room_id . '
            GROUP by Room_id', 'A', 'Room.Room_id', '=', 'A.Room_id')
            ->select('Room.*', 'A.SLDK')
            ->get();

        return view('Student.Paybill.detail_bill')->with(compact('service_detail', 'info_room', 'room_id', 'bill_id'));
    }
    public function pay_bill($room_id, $bill_id)
    {
        $Reg = Bill::where([['Room_id', '=', $room_id], ['Bill_id', '=', $bill_id]])->update(['Bill_status' => 1]);
        if ($Reg) {
            return redirect('/student')->with('message', 'Thanh toán hóa đơn thành công!');
        }
    }


    /// ----------------register dormitory-------------
    public function empty_room()
    {
        $id_student = Auth::id();
        $check = DB::select("SELECT Student_id
       FROM registration
       wHERE  Student_id = ".$id_student." and ( Registration_status = 0 or Registration_status =1)");
        if (!empty($check)) {
            return redirect('/student')->with('message', 'Bạn đang thuê phòng. Hãy trả phòng rồi đăng ký mới!');
        } else {
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

            return view('Student.register.empty_room')->with(compact('room'));
        }
    }
    public function register_room($room_id)
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

        return view('Student.register.register_room')->with(compact('room', 'service', 'serviceOfRoom'));
    }
    public function save_register(Request $request)
    {
        $this->Authlogin();
        $data = $request->all();
        $register = new Registration();
        $register->Room_id = $data['Room_id'];
        $register->Student_id = Auth::id();
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
        return redirect('/student')->with('message', 'Đăng ký Ký túc xá thành công!');
    }
}
