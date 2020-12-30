<?php

namespace App\Http\Controllers;

use App\Models\Facilities;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;


class InfrastructureController extends Controller
{
    public function Authlogin(){
        $User_id = Auth::id();
        if($User_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('login-acount')->send();
        }
    }
    public function list_infrastructure(){
        $this->Authlogin();
        $facilities = Facilities::all();
        return view('Staff.Manage_infrastructure.list_infrastructure')->with(compact('facilities'));
    }
    public function add_infrastructure(){
        $this->Authlogin();
        return view('Staff.Manage_infrastructure.add_infrastructure');
    }
    public function save_infrastructure(Request $request)
    {
        $this->Authlogin();
        $data = $request->all();
        $facilities = new Facilities();
        $facilities->Facilities_name = $data['Facilities_name'];
        $facilities->Facilities_quantity = $data['Facilities_quantity'];
        $facilities->Facilities_brand = $data['Facilities_brand'];
        $check = Facilities::where('Facilities_name',  $facilities->Facilities_name)->first();
        if(isset($check)){
            Session::put('message', 'Trang thiết bị đã tồn tại.');
            return Redirect::to('add-infrastructure');
        }else{
            $facilities->save();
            Session::put('message', 'Thêm Cơ sở vật chất thành công');
            return Redirect::to('list-infrastructure');
        }
        
    }

    public function edit_infrastructure($facilities_id)
    {
        $this->Authlogin();
        $facilities = Facilities::find($facilities_id);
        return view('Staff.Manage_infrastructure.edit_infrastructure')->with(compact('facilities'));
    }
    public function update_infrastructure($facilities_id, Request $request)
    {
        $this->Authlogin();
        $data = $request->all();
        $facilities = Facilities::find($facilities_id);
        $facilities->Facilities_name = $data['Facilities_name'];
        $facilities->Facilities_quantity = $data['Facilities_quantity'];
        $facilities->Facilities_brand = $data['Facilities_brand'];
        // $id_check = $facilities_id;
        // $check1 = Facilities::where('Facilities_name', $data['Facilities_name'])->where('Facilities_id',$id_check)->get();
        // $check2 = Facilities::where('Facilities_name', $data['Facilities_name'])->get();
        // if(!empty($check1) &&isset($check1)){
        //     echo "không rỗng ";
        //     return $check1 ;
        // }else{
        //         echo " rỗng ";
        //         return $check1 ;
        // }
        $facilities->save();
        Session::put('message', 'Sửa cơ sở vật chất thành công');
        return redirect('/list-infrastructure');
    }
    public function delete_infrastructure($facilities_id)
    {
        $this->Authlogin();
        $facilities = Facilities::find($facilities_id);
        if($facilities){
            $facilities->delete();
            Session::put('message', 'Xóa cơ sở vật chất thành công');
            return redirect('/list-infrastructure');
        }
        
    }
}
