<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đăng nhập</title>
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
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}"> -->
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{asset('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/dist/css/adminlte.min.css')}}">

    <link rel="stylesheet" href="{{asset('public/dist/css/formValidation.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/dist/css/client.css')}}">
    <link rel="stylesheet" href="{{asset('public/dist/css/style.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
        body {
            /* background-image: url('./bg.png') !important; */
            background-repeat: no-repeat !important;
            background-position: center !important;
            background-size: cover !important;
        }
        .login-card-body {
            border-radius: 20px !important;
        }
    </style>
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg"> <b> Đăng nhập</b></p>

                <form class ="login" action="{{URL::to('/login')}}" method="post">
                    {{ csrf_field() }}
                    <?php
                    use Illuminate\Support\Facades\Session;
                    $message = Session::get('message');
                    if ($message) {
                        echo '<span class="err-login">' . $message . '</span>';
                        Session::put('message', null);
                    }
                    ?>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Nhập tài khoản" value="{{old('User_acount')}}" name="User_acount" >
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Nhập mật khẩu" value="{{old('User_password')}}" name="User_password" >

                    </div>
                    <div class="row">
                        <div class="col-7">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Nhớ tài khoản
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-5">
                            <button type="submit" class="btn btn-primary btn-block">Đăng nhập</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div>
                <!-- /.social-auth-links -->

                <p class="mb-1">
                    <a href="{{URL::to('/')}}">Trang chủ</a>
                </p>
                <p class="mb-0">
                    <a href="{{URL::to('/register-acount')}}" class="text-center">Đăng ký tài khoản</a>
                </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

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