<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đăng ký</title>
    <link
      rel="icon"
      href="{{asset('public/assests/img/icon-logo-title.png')}}"
      type="image/icon type"
    />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('public/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/dist/css/style.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        body {
            background-image: url('../../assests/img/bg.webp') !important;
            background-repeat: no-repeat !important;
            background-position: center !important;
            background-size: cover !important;
        }

        .login-card-body {
            border-radius: 20px !important;
        }

        .DK {
            width: 45%;
            height: auto;
        }
    </style>
</head>

<body class="hold-transition login-page">
        <div class="card card-primary mt-4 DK">
            <div class="card-header">
                <h5 class=""><center>Đăng ký thành viên mới </center> </h5>
            </div>
            <form class="st" role="form" method="POST" action="{{URL::to('/save-acount')}}" enctype="multipart/form-data">
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
                        <label for="">Lớp</label>
                        <input type="text" class="form-control" id="Student_class" value="{{old('Student_class')}}" name="Student_class" placeholder="Nhập lớp">
                    </div>
                    <div class="form-group">
                        <label for="">Khoa</label>
                        <input type="text" class="form-control" id="Student_faculty" value="{{old('Student_faculty')}}" name="Student_faculty" placeholder="Nhập khoa">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Ảnh</label>
                        <input type="file" class="form-control" id="exampleInputFile" name="User_image">
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <input type="submit" class="btn btn-primary" name="addt" value="Đăng ký"></input>
                    </div>
            </form>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
    
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('public/dist/js/adminlte.min.js')}}"></script>
     <!-- Validations -->
     <script src="{{asset('public/dist/js/validation.js')}}"> </script>
    <script src="{{asset('public/dist/js/checkdata.js')}}"> </script>
</body>

</html>