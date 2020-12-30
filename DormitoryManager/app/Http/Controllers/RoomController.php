<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class RoomController extends Controller
{
    public function Authlogin(){
        $User_id = Auth::id();
        if($User_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('login-acount')->send();
        }
    }
    public function list_room(){
        $this->Authlogin();
        $room = Room::all();
        return view('Staff.Manage_room.list_room')->with(compact('room'));
    }
    public function add_room(){
        $this->Authlogin();
        return view('Staff.Manage_room.add_room');
    }
    public function save_room(Request $request)
    {
        $this->Authlogin();
        $data = $request->all();
        $room = new Room();
        $room->Room_name = $data['Room_name'];
        $room->Room_type = $data['Room_type'];
        $room->Room_address = $data['Room_address'];
        $room->Room_price = $data['Room_price'];
        $room->Room_acreage = $data['Room_acreage'];
        $room->Number_people = $data['Number_people'];
        $check = Room::where('Room_name', $room->Room_name)->first();
        if(isset($check)){
            Session::put('message', 'Phòng này đã tồn tại.');
            return Redirect::to('add-room');
        }else{
            $room->save();
            //Thêm mặc định các dịch vụ điện/nước/wifi
            $id  = $room->Room_id;
            DB::table('service_room')->insert(
                ['Room_id' => $id,'Service_id' => 1]
            );
            DB::table('service_room')->insert(
                ['Room_id' => $id,'Service_id' => 2]
            );
            DB::table('service_room')->insert(
                ['Room_id' => $id,'Service_id' => 3]
            );
            Session::put('message', 'Thêm phòng thành công');
            return Redirect::to('list-room');
        }
    }

    public function edit_room($Room_id)
    {
        $this->Authlogin();
        $room = Room::find($Room_id);
        return view('Staff.Manage_room.edit_room')->with(compact('room'));
    }
    public function update_room($Room_id, Request $request)
    {
        $this->Authlogin();
        $data = $request->all();
        $room = Room::find($Room_id);
        $room->Room_name = $data['Room_name'];
        $room->Room_type = $data['Room_type'];
        $room->Room_address = $data['Room_address'];
        $room->Room_price = $data['Room_price'];
        $room->Room_acreage = $data['Room_acreage'];
        $room->Number_people = $data['Number_people'];
        $room->save();
        Session::put('message', 'Sửa phòng thành công');
        return redirect('/list-room');
    }
    public function delete_room($room_id)
    {
        $this->Authlogin();
        $room = Room::find($room_id);
        if($room){
            $room->delete();
            Session::put('message', 'Xóa dịch vụ thành công');
            return redirect('/list-room');
        }
        
    }
}
