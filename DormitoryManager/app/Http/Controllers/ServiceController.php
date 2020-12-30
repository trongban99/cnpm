<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function Authlogin(){
        $User_id = Auth::id();
        if($User_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('login-acount')->send();
        }
    }
    public function list_service(){
        $this->Authlogin();
        $service = Service::all(); //paginate(2);
        return view('Staff.Manage_service.list_service')->with(compact('service'));;
    }
    public function add_service(){
        $this->Authlogin();
        return view('Staff.Manage_service.add_service');
    }
    public function save_service(Request $request)
    {
        $this->Authlogin();
        $data = $request->all();
        $service = new Service();
        $service->Service_name = $data['Service_name'];
        $service->Service_desc = $data['Service_desc'];
        $service->Service_unit = $data['Service_unit'];
        $service->Service_price = $data['Service_price'];
        $check = Service::where('Service_name', $service->Service_name)->first();
        if(isset($check)){
            Session::put('message', 'Dịch vụ đã tồn tại.');
            return Redirect::to('add-service');
        }else{
            $service->save();
           Session::put('message', 'Thêm dịch vụ thành công');
           return Redirect::to('add-service');
        }
    }

    public function edit_service($Service_id)
    {
        $this->Authlogin();
        $service = Service::find($Service_id);
        return view('Staff.Manage_service.edit_service')->with(compact('service'));
    }
    public function update_service($Service_id, Request $request)
    {
        $this->Authlogin();
        $data = $request->all();
        $service = Service::find($Service_id);
        $service->Service_name = $data['Service_name'];
        $service->Service_desc = $data['Service_desc'];
        $service->Service_unit = $data['Service_unit'];
        $service->Service_price = $data['Service_price'];
        $service->save();
        Session::put('message', 'Sửa dịch vụ thành công');
        return redirect('/list-service');
    }
    public function delete_service($service_id)
    {
        $this->Authlogin();
        $service = Service::find($service_id);
        if($service){
            $service->delete();
            Session::put('message', 'Xóa dịch vụ thành công');
            return redirect('/list-service');
        }
        
    }
}
