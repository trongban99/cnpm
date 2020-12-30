<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\Staff;
use App\Models\Users;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class StaffController extends Controller
{
    public function Authlogin(){
        $User_id = Auth::id();
        if($User_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('login-acount')->send();
        }
    }
    public function list_staff()
    {
        $this->Authlogin();
        $staff = Staff::leftJoin('Users','Users.User_id', '=', 'Staff.Staff_id')->get();
        return view('Admin.Manage_staff.list_staff')->with(compact('staff'));
    }
    public function add_staff()
    {
        $this->Authlogin();
        return view('Admin.Manage_staff.add_staff');
    }
    public function save_staff(Request $request)
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
        $check = Users::where('User_acount',$user->User_acount )->first();
        if(isset($check)){
            Session::put('message', 'Tài khoản đã tồn tại.');
            return Redirect::to('add-staff');
        }else{
            $user->save();
            //lưu quyền nhân viên
            $staffRoles = Roles::where('name', 'staff')->first();
            $user->roles()->attach($staffRoles);

            //Lưu bản nhân viên
            $id_staff = $user->User_id;
            $staff = new Staff();
            $staff->Staff_id = $id_staff;
            $staff->Staff_type = $data['Staff_type'];
            $staff->save();
            Session::put('message', 'Thêm nhân viên thành công');
            return Redirect::to('add-staff');
        }
    }

    public function edit_staff($User_id)
    {
        $this->Authlogin();
        $staff = Users::find($User_id);
        $staff1 = Staff::find($User_id);
        return view('Admin.Manage_staff.edit_staff')->with(compact('staff','staff1'));
    }
    public function update_staff($User_id, Request $request)
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
        $staff = Staff::find($User_id);
        $staff->Staff_type = $data['Staff_type'];
        $staff->save();
        Session::put('message', 'Sửa nhân viên thành công');
        return redirect('/list-staff');
    }
    public function delete_staff($User_id)
    {
        $this->Authlogin();
        $user = Users::find($User_id);
        if($user){
            //Xóa bảng user và xóa quyền Xóa quyền
            $user->roles()->detach();
            $user->delete();
            //Xóa bảng nhân viên
            $staff = Staff::find($User_id);
            $staff->delete();
            Session::put('message', 'Xóa nhân viên thành công');
             return redirect('/list-staff');
        }
        
    }
}
