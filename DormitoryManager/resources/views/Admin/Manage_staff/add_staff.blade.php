@extends('admin_layout')
@section('admin_content')
<!-- Main content -->
<section class="content mt-4">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thêm nhân viên</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="staff" role="form" method="POST" action="{{URL::to('/save-staff')}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <?php

                        use Illuminate\Support\Facades\Session;

                        $message = Session::get('message');
                        if ($message) {
                            echo '<span class="err-login">' . $message . '</span>';
                            Session::put('message', null);
                        }
                        ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Tài khoản</label>
                                <input type="text" class="form-control" id="User_acount" value="{{old('User_acount')}}" name="User_acount" placeholder="Nhập tài khoản">
                            </div>
                            <div class="form-group">
                                <label for="">Mật khẩu</label>
                                <input type="password" class="form-control" id="User_password" value="{{old('User_password')}}" name="User_password" placeholder="Nhập mật khẩu">
                            </div>
                            <div class="form-group">
                                <label for="">Họ và tên</label>
                                <input type="text" class="form-control" id="User_name" value="{{old('User_name')}}" name="User_name" placeholder="Nhập họ và tên">
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh</label>
                                <div class="input-control">
                                    <input class="form-control" id="date-input" value="{{old('Date_of_birth')}}" type="date" name="Date_of_birth" placeholder="date">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group clearfix">
                                <div class="row">
                                    <label class="col-md-3">Giới tính</label>
                                    <div class="col-md-9">
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-" type="radio" value="1" name="User_sex" checked>
                                            <label class="form-check-label" for="inline-radio1">Nam</label>
                                        </div>
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="-radio2" type="radio" value="0" name="User_sex">
                                            <label class="form-check-label" for="inline-radio2">Nữ</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Địa chỉ</label>
                                <input type="text" class="form-control" id="User_address" value="{{old('User_address')}}" name="User_address" placeholder="Nhập địa chỉ">
                            </div>
                            <div class="form-group">
                                <label for="">Dân tộc</label>
                                <input type="text" class="form-control" id="User_folk" value="{{old('User_folk')}}" name="User_folk" placeholder="Nhập dân tộc">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" id="User_email" value="{{old('User_email')}}" name="User_email" placeholder="Nhập email">
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="text" class="form-control" id="User_phone" value="{{old('User_phone')}}" name="User_phone" placeholder="Nhập số điện thoại">
                            </div>
                            <div class="form-group">
                                <label>Loại nhân viên</label>
                                <select class="form-control" id="select1" name="Staff_type">
                                    <option value="">--- Lựa Chọn ----</option>
                                    <option value="Nhân viên QL phòng">Nhân viên quản lý phòng - Trang thiết bị</option>
                                    <option value="Nhân viên QL sinh viên">Nhân viên quản lý sinh viên</option>
                                    <option value="Nhân viên QL hóa đơn">Nhân viên quản lý hóa đơn - Dịch vụ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Ảnh</label>
                                <input type="file" class="form-control" id="exampleInputFile" name="User_image">
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" name="add_staff" value="Thêm nhân viên"></input>
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