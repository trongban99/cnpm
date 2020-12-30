<?php

namespace App\Http\Controllers;

use App\Models\Facilities;
use App\Models\Room;
use App\Models\Service;
use App\Models\Staff;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function Authlogin(){
        $User_id = Auth::id();
        if($User_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('login-acount')->send();
        }
    }
    public function dashboard(){
        $this->Authlogin();
        return view('Admin_layout');
    }
    public function statistical(){
        $this->Authlogin();
        $count_room = Room::count();
        $count_student = Student::count();
        $count_service = Service::count();
        $count_facilities = Facilities::count();
        return view('Admin.Statistical.Statistical')->with(compact('count_room','count_student','count_service','count_facilities'));
    }
    public function choose_sta(Request $request){
        $this->Authlogin();
        $data = $request->all();
        $month_today = Carbon::now('Asia/Ho_Chi_Minh')->format('m');
        $last3 = Carbon::now('Asia/Ho_Chi_Minh')->subMonth(3)->format('m');
        $last6 = Carbon::now('Asia/Ho_Chi_Minh')->subMonth(6)->format('m');
        $last9 = Carbon::now('Asia/Ho_Chi_Minh')->subMonth(9)->format('m');
        if($data['type'] =="thangnay"){
            $get = DB::select('SELECT month(Bill_create) as month, sum(Bill_total) as total , COUNT(Room_id) as quantity
            FROM bill
            GROUP By month(Bill_create)
            HAVING month = '.$month_today);
        }else if($data['type'] =="3thangtruoc"){
            $get = DB::select("SELECT month(Bill_create) as month, sum(Bill_total) as total , COUNT(Room_id) as quantity
            FROM bill
            GROUP By month(Bill_create)
            HAVING month BETWEEN ".$last3." and ".$month_today);
        }else if($data['type'] =="6thangtruoc"){
            $get = DB::select("SELECT month(Bill_create) as month, sum(Bill_total) as total , COUNT(Room_id) as quantity
            FROM bill
            GROUP By month(Bill_create)
            HAVING month BETWEEN ".$last6." and ".$month_today);
        }else{
            $get = DB::select("SELECT month(Bill_create) as month, sum(Bill_total) as total , COUNT(Room_id) as quantity
            FROM bill
            GROUP By month(Bill_create)
            HAVING month BETWEEN ".$last9." and ".$month_today);
        }
        foreach($get as $k => $v){
            $chart_data[] = array(
                'month' => $v->month,
                'total' => $v->total,
                'quantity' => $v->quantity
            );
        }
        echo $data = json_encode($chart_data);
    }

}
