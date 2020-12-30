<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\Student;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('Home');
    }
    public function login_acount()
    {
        return view('Admin.custom_auth.login');
    }
    public function login(Request $request)
    {
        $data = $request->all();
        if (Auth::attempt(['User_acount' => $request->User_acount, 'User_password' => $request->User_password])) {
            if (Student::find(Auth::id())) {
                return  Redirect::to('/student');
            } else {
                return  Redirect::to('/dashboard');
            }
        } else {
            return  Redirect::to('/login-acount')->with('message', 'Tài khoản hoặc mật khẩu sai. Vui lòng đăng nhập lại!');
        }
    }
    public function logout_acount()
    {
        Auth::logout();
        return  Redirect::to('/login-acount');
    }
    public function introduce (){
        return view('Home.introduce');
    }
    public function contact (){
        return view('Home.contact');
    }

    public function register_acount()
    {
        return view('Admin.custom_auth.register_acount');
    }

    public function save_acount(Request $request)
    {
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
            return Redirect::to('register-acount');
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
            Session::put('message', 'Đăng ký thành công');
            return Redirect::to('login-acount');
        }
    }
}
