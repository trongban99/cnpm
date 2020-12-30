<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\InfrastructureController;
use App\Http\Controllers\RoomController;
// -----------------Home-----------------
Route::get('/',[HomeController::class,'index']);
    //---------login-logout-Auth--------
    Route::get('/login-acount',[HomeController::class,'login_acount']);
    Route::post('/login',[HomeController::class,'login']);
    Route::get('/logout-acount',[HomeController::class,'logout_acount']);
    Route::get('/introduce',[HomeController::class,'introduce']);
    Route::get('/contact',[HomeController::class,'contact']);

    Route::get('/register-acount',[HomeController::class,'register_acount']);
    Route::post('/save-acount',[HomeController::class,'save_acount']);


//-----------------Admin------------------
Route::get('/dashboard',[AdminController::class,'dashboard'])->middleware('auth.rolesMany');

Route::group(['middleware'=> 'auth.roles'],function (){
    //---------------Manage-Staff----
    Route::get('/list-staff',[StaffController::class,'list_staff']);

    Route::get('/add-staff',[StaffController::class,'add_staff']);
    Route::post('/save-staff',[StaffController::class,'save_staff']);

    Route::get('/edit-staff/{User_id}', [StaffController::class,'edit_staff']);
    Route::post('/update-staff/{User_id}', [StaffController::class,'update_staff']);

    Route::get('/delete-staff/{User_id}', [StaffController::class,'delete_staff']);

    //--------------Statistical-------------------------
    Route::get('/statistical',[AdminController::class,'statistical']);
    Route::get('/choose-sta',[AdminController::class,'choose_sta']);
});

//----------------Staff---------------------
Route::group(['middleware'=> 'auth.rolesMany'],function (){
    //---------------Manage-Service------------
    Route::get('/list-service',[ServiceController::class,'list_service']);

    Route::get('/add-service',[ServiceController::class,'add_service']);
    Route::post('/save-service',[ServiceController::class,'save_service']);

    Route::get('/edit-service/{Service_id}', [ServiceController::class,'edit_service']);
    Route::post('/update-service/{Service_id}', [ServiceController::class,'update_service']);

    Route::get('/delete-service/{Service_id}', [ServiceController::class,'delete_service']);

    //---------------Manage-Register------------
    Route::get('/list-register',[RegisterController::class,'list_register']);
    Route::get('/confirm-register/{Registration_id}',[RegisterController::class,'comfirm_register']);
        
    Route::get('/emptyRoom',[RegisterController::class,'emptyRoom']);
    Route::get('/registerRoom/{Room_id}',[RegisterController::class,'registerRoom']);
    Route::post('/saveRegister', [RegisterController::class,'saveRegister']);

    //---------------Manage-Bill------------
    Route::get('/list-bill',[BillController::class,'list_bill']);
    Route::get('/detail-bill-room/{room_id}/{bill_id}',[BillController::class,'detail_bill_room']);

    Route::get('/add-bill',[BillController::class,'add_bill']);
    Route::post('/save-bill',[BillController::class,'save_bill']);

    Route::get('/add-bill-service',[BillController::class,'add_bill_service']);
    Route::get('/add-bill-service-find',[BillController::class,'add_bill_service_find']); // find-service
    Route::get('/add-bill-service-findprice',[BillController::class,'add_bill_service_findprice']); // find-price
    Route::post('/save-bill-service',[BillController::class,'save_bill_service']);

    //---------------Manage-room------------
    Route::get('/list-room',[RoomController::class,'list_room']);

    Route::get('/add-room',[RoomController::class,'add_room']);
    Route::post('/save-room',[RoomController::class,'save_room']);

    Route::get('/edit-room/{Room_id}', [RoomController::class,'edit_room']);
    Route::post('/update-room/{Room_id}', [RoomController::class,'update_room']);

    Route::get('/delete-room/{Room_id}', [RoomController::class,'delete_room']);
    

    //---------------Manage-infrastructure------------
    Route::get('/list-infrastructure',[InfrastructureController::class,'list_infrastructure']);

    Route::get('/add-infrastructure',[InfrastructureController::class,'add_infrastructure']);
    Route::post('/save-infrastructure',[InfrastructureController::class,'save_infrastructure']);

    Route::get('/edit-infrastructure/{Facilities_id}', [InfrastructureController::class,'edit_infrastructure']);
    Route::post('/update-infrastructure/{Facilities_id}', [InfrastructureController::class,'update_infrastructure']);

    Route::get('/delete-infrastructure/{Facilities_id}', [InfrastructureController::class,'delete_infrastructure']);

    //---------------Manage-student------------
    Route::get('/list-student',[StudentController::class,'list_student']);

    Route::get('/add-student',[StudentController::class,'add_student']);
    Route::post('/save-student',[StudentController::class,'save_student']);

    Route::get('/edit-student/{Student_id}', [StudentController::class,'edit_student']);
    Route::post('/update-student/{Student_id}', [StudentController::class,'update_student']);

    Route::get('/delete-student/{Student_id}', [StudentController::class,'delete_student']);
});

// ---------------Student ----------------------
Route::group(['middleware'=> 'auth.user'],function (){
Route::get('/student',[StudentController::class,'index']);
    //-----------info-Student---------------------
    Route::get('/info-student/{student_id}',[StudentController::class,'info_student']);
    Route::get('/edit-info/{Student_id}', [StudentController::class,'edit_info']);
    Route::post('/update-info-student/{Student_id}', [StudentController::class,'update_info_student']);

    //----------paybill---------------------
    Route::get('/list-paybill/{student_id}',[StudentController::class,'list_paybill']);
    Route::get('/detail-bill/{student_id}/{room_id}/{Bill_id}',[StudentController::class,'detail_bill']);
    Route::get('/pay-bill/{room_id}/{bill_id}',[StudentController::class,'pay_bill']);

    //--------- pay room --------------------
    
    // ---------register dormitory-------------
    Route::get('/empty-room',[StudentController::class,'empty_room']);
    Route::get('/register-room/{Room_id}',[StudentController::class,'register_room']);
    Route::post('/save-register', [StudentController::class,'save_register']);
});
