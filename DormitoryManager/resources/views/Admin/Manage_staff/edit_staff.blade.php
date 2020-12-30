@extends('admin_layout')
@section('admin_content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="c-subheader justify-content-between px-3">
                <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item"><a href="#">Staff</a></li>
                    <li class="breadcrumb-item active">Sửa nhân viên</li>
                </ol>
            </div>
        </div>
        <!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Sửa nhân viên</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="staff" role="form" method="POST" action="{{URL::to('/update-staff/'.$staff->User_id)}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                        <div class="form-group">
                                <label for="">Tài khoản</label>
                                <input type="text" disabled class="form-control" id="User_acount" name="User_acount" value="{{$staff->User_acount}}">
                            </div>
                            <div class="form-group">
                                <label for="">Mật khẩu</label>
                                <input type="password" class="form-control" id="User_password" name="User_password" value="{{$staff->User_password}}" >
                            </div>
                            <div class="form-group">
                                <label for="">Họ và tên</label>
                                <input type="text" class="form-control" id="User_name" name="User_name" value="{{$staff->User_name}}" >
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh</label>
                                <div class="input-group">
                                    <input class="form-control" id="date-input" type="date" name="Date_of_birth" value="{{$staff->Date_of_birth}}">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group clearfix">
                                <div class="row">
                                    <label class="col-md-3">Giới tính</label>
                                    <div class="col-md-9">
                                        @if($staff->User_sex ==1)
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-" type="radio" value="1" name="User_sex" checked>
                                            <label class="form-check-label" for="inline-radio1">Nam</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="-radio2" type="radio" value="0" name="User_sex">
                                            <label class="form-check-label" for="inline-radio2">Nữ</label>
                                        </div>
                                        @else
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-" type="radio" value="1" name="User_sex">
                                            <label class="form-check-label" for="inline-radio1">Nam</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="-radio2" type="radio" value="0" name="User_sex" checked>
                                            <label class="form-check-label" for="inline-radio2">Nữ</label>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Địa chỉ</label>
                                <input type="text" class="form-control" id="User_address" name="User_address" value="{{$staff->User_address}}" >
                            </div>
                            <div class="form-group">
                                <label for="">Dân tộc</label>
                                <input type="text" class="form-control" id="User_folk" name="User_folk" value="{{$staff->User_folk}}" >
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" id="User_email" name="User_email" value="{{$staff->User_email}}" >
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="text" class="form-control" id="User_phone" name="User_phone" value="{{$staff->User_phone}}">
                            </div>
                            <div class="form-group">
                                <label>Loại nhân viên</label>
                                <select class="form-control" id="select1" name="Staff_type" >
                                    <option value="Nhân viên QL phòng" {{ $staff1->Staff_type == "Nhân viên QL phòng" ? 'selected' : ''}}>Nhân viên quản lý phòng - Trang thiết bị</option>
                                    <option value="Nhân viên QL sinh viên" {{ $staff1->Staff_type =="Nhân viên QL sinh viên" ? 'selected' : ''}}>Nhân viên quản lý sinh viên</option>
                                    <option value="Nhân viên QL hóa đơn" {{ $staff1->Staff_type == "Nhân viên QL hóa đơn" ? 'selected' : ''}}>Nhân viên quản lý hóa đơn - Dịch vụ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Ảnh</label>
                                <input type="file" class="form-control" id="" name="User_image">
                                <img src="{{URL::to('public/uploads/staff/'.$staff->User_image)}}" width="100px" alt="">
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" name="edit_staff" value="Sửa nhân viên"></input>
                            </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection