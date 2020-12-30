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
                        <h3 class="card-title">Sửa sinh viên</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="st" role="form" method="POST" action="{{URL::to('/update-student/'.$student->User_id)}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Tài khoản</label>
                                <input type="text" disabled class="form-control" id="User_acount" name="User_acount" value="{{$student->User_acount}}">
                            </div>
                            <div class="form-group">
                                <label for="">Mật khẩu</label>
                                <input type="password" class="form-control" id="User_password" name="User_password" value="{{$student->User_password}}" >
                            </div>
                            <div class="form-group">
                                <label for="">Họ và tên</label>
                                <input type="text" class="form-control" id="User_name" name="User_name" value="{{$student->User_name}}" >
                            </div>
                            <div class="form-group">
                                <label>Ngày sinh</label>
                                <div class="input-group">
                                    <input class="form-control" id="date-input" type="date" name="Date_of_birth" value="{{$student->Date_of_birth}}">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <div class="form-group clearfix">
                                <div class="row">
                                    <label class="col-md-3">Giới tính</label>
                                    <div class="col-md-9">
                                        @if($student->User_sex ==1)
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
                                <input type="text" class="form-control" id="User_address" name="User_address" value="{{$student->User_address}}" >
                            </div>
                            <div class="form-group">
                                <label for="">Dân tộc</label>
                                <input type="text" class="form-control" id="User_folk" name="User_folk" value="{{$student->User_folk}}" >
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" id="User_email" name="User_email" value="{{$student->User_email}}" >
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="text" class="form-control" id="User_phone" name="User_phone" value="{{$student->User_phone}}">
                            </div>
                            <div class="form-group">
                                <label for=""> Lớp</label>
                                <input type="text" class="form-control" id="Student_class" name="Student_class" value="{{$student1->Student_class}}" >
                            </div>
                            <div class="form-group">
                                <label for="">Khoa</label>
                                <input type="text" class="form-control" id="Student_faculty" name="Student_faculty" value="{{$student1->Student_faculty}}" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Ảnh</label>
                                <input type="file" class="form-control" id="" name="User_image">
                                <img src="{{URL::to('public/uploads/staff/'.$student->User_image)}}" width="100px" alt="">
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" name="edit_student" value="Sửa"></input>
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