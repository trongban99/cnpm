<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Bill_Detail;
use App\Models\Room;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class BillController extends Controller
{
    public function Authlogin(){
        $User_id = Auth::id();
        if($User_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('login-acount')->send();
        }
    }
    public function list_bill(){
        $this->Authlogin();
        $list_bill = Bill::join('Room', 'Room.Room_id', '=','Bill.Room_id')
        ->select('Bill.*', 'Room.Room_name')->orderBy('Bill.Bill_status','DESC')->get();
        return view('Staff.Manage_bill.list_bill')->with(compact('list_bill'));
    }
    public function detail_bill_room($Room_id, $bill_id)
    {
        $this->Authlogin();
        // Chi tiet hoa don
        $service_detail = Bill_Detail::join('Service', 'Service.Service_id', '=', 'Bill_Detail.Service_id')
            ->where('Bill_id', $bill_id)
            ->select('Bill_Detail.*', 'Service.Service_name')
            ->get();
        // Chi tiet phong
        $find = Bill::where('Bill_id',$bill_id)->select('Bill_create')->first();
        $date = $find->Bill_create;
        $arr_date = explode('-',$date,3);
        $month = $arr_date[1];
        $info_room =  Room::JoinSub('SELECT Room_id, COUNT(Room_id) as SLDK
            From Registration 
            WHERE Registration_status =1 and  month(Registration_create) <='.$month.' and registration.Room_id ='.$Room_id.'
            GROUP by Room_id', 'A', 'Room.Room_id', '=', 'A.Room_id')
            ->select('Room.*', 'A.SLDK')
            ->get();
        return view('Staff.Manage_bill.detail_bill')->with(compact('service_detail', 'info_room'));
    }

    public function add_bill(){
        $this->Authlogin();
        $room =Room::select('Room_id','Room_name')->get();
        return view('Staff.Manage_bill.add_bill')->with(compact('room'));
    }
    public function save_bill(Request $request){
        $this->Authlogin();
        $data = $request->all();
        $bill = new Bill();
        $bill->Room_id = $data['Room_id'];
        $bill->Bill_name = $data['Bill_name'];
        $bill->Bill_create = $data['Bill_create'];
        $bill->Bill_total = 0;
        $bill->Bill_status = 0;
        $check = Bill::where('Bill_name', $bill->Bill_name)->first();
        if(isset($check)){
            Session::put('message', 'Hóa đơn này đã tồn tại.');
            return Redirect::to('add-bill');
        }else{
            $bill->save();
            Session::put('message', 'Thêm Hóa đơn thành công');
            return Redirect::to('add-bill');
        }
    }
    public function  add_bill_service(){
        $this->Authlogin();
        $bill = Bill::select('Bill_id','Bill_name')->where('Bill_status',0)->get();
        return view('Staff.Manage_bill.add_bill_service')->with(compact('bill'));
    }
    public function add_bill_service_find(Request $request){
        $this->Authlogin();
        $bill_id = $request->Bill_id;
        $data = DB::select("SELECT Bill.Room_id, service_room.Service_id, service.Service_name
        from bill
        join service_room
        on bill.Room_id = service_room.Room_id AND bill.Bill_id=".$bill_id." 
        JOIN service
        on service.Service_id = service_room.Service_id");
        return response()->json($data);
    }
    public function add_bill_service_findprice(Request $request){
        $this->Authlogin();
        $data = Service::where('Service_id',$request->Service_id)->select('Service_price')->first();
        return response()->json($data);
    }
    public function save_bill_service(Request $request){
        $this->Authlogin();
        $data = $request->all();  
        $new_bill = new Bill_Detail();
        $new_bill->Bill_id = $data['Bill_id'];
        $new_bill->Service_id = $data['Service_id'];
        $new_bill->Old_index = $data['Old_index'];
        $new_bill->New_index = $data['New_index'];

        $price = Service::where('Service_id',$data['Service_id'])->first();
        $new_bill->Price = $price->Service_price;
        
        if( !isset($data['Old_index']) && !isset($data['New_index'])){
            $new_bill->Total = $new_bill->Price;
        }else{
            $new_bill->Total = $new_bill->Price * ($data['New_index'] - $data['Old_index']);
        }
        //$new_bill->save();
        
        //Xử lý update tiền hóa đơn
        $id_bill = $data['Bill_id'];
        $find = Bill::where('Bill_id',$id_bill)->select('Room_id', 'Bill_create')->first();
        $room_id = $find->Room_id;
        $date = $find->Bill_create;
        $arr_date = explode('-',$date,3);
        $month = $arr_date[1];
        $update = DB::select("
        SELECT bill.Bill_id, bill.Room_id, B.Tienphong + C.Tongtien as Thanhtoan
        FROM bill
        INNER JOIN ( 
            SELECT room.Room_id, room.Room_price * A.SLDK as Tienphong
            FROM room
            INNER JOIN(
                SELECT `Room_id`, COUNT(`Room_id`) as SLDK 
                From Registration 
                WHERE `Registration_status`=1 and  month(Registration_create) <=".$month." and registration.Room_id =".$room_id."
                GROUP by Room_id) as A
            on room.Room_id = A.Room_id ) as B
        on bill.Room_id = B.Room_id and bill.Bill_id =".$id_bill."
        INNER join (
        SELECT Bill_id, Sum(
        case 
            When ( `New_index` - `Old_index`) is null then 1*Price
            else ( `New_index` - `Old_index`) * Price
            END
        )
        as Tongtien
        FROM bill_detail
        GROUP by Bill_id) as C
        on bill.Bill_id = C.bill_id");
        
        foreach($update as $k){
            $total = $k->Thanhtoan;
        }
        DB::select("UPDATE bill
        set Bill_total = ".$total."
        WHERE Bill_id = ".$id_bill);
        Session::put('message', 'Thêm hóa đơn dịch vụ thành công');
        return Redirect::to('add-bill');
    }
}
