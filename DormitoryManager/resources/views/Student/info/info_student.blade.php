@extends('student_layout')
@section('student_content')


<section class="content mt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{URL::to('public/uploads/staff/avatar2.png')}}" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center">{{$student1->User_name}}</h3>
                        <p class="text-muted text-center">Student</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Ngày sinh</b> <a class="float-right">{{$student1->Date_of_birth}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Giới tính</b> <a class="float-right">{{$student1->User_sex ==0 ? 'Nam' : 'Nữ'}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Lớp </b> <a class="float-right">{{$student->Student_class}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Khoa </b> <a class="float-right">{{$student->Student_faculty}}</a>
                            </li>
                        </ul>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <h3 class="profile-username text-center">Thông tin cá nhân</h3>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <div class="tab-pane" id="settings">
                                    <form class="form-horizontal">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Tài khoản</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName" disabled value="{{$student1->User_acount}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label" >Mật khẩu</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="inputEmail" disabled value="{{$student1->User_password}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label" disabled >Email</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName2" disabled value="{{$student1->User_email}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputExperience" class="col-sm-2 col-form-label">Số điện thoại</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName3" disabled value="{{$student1->User_phone}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">Địa chỉ</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName4" disabled value="{{$student1->User_address}}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputSkills" class="col-sm-2 col-form-label">Dân tộc</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="inputName5" disabled value="{{$student1->User_folk}}">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <a href="{{URL::to('/edit-info/'.$student->Student_id)}}" class="btn btn-danger">Chỉnh sửa </a> 
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>
</section>
@endsection