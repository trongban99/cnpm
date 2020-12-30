<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin</title>
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
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('public/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('public/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('public/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('public/plugins/summernote/summernote-bs4.css')}}">
    <link rel="stylesheet" href="{{asset('public/dist/css/formValidation.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/dist/css/style.css')}}">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Charjs.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
     <!--Datatable js -->
  <link rel="stylesheet" href="{{asset('public/dist/css/datatablejs.css')}}">
</head>

<body class="sidebar-mini layout-fixed text-sm">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                <a href="{{URL::to('/')}}" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.html" class="brand-link">
                <img src="{{asset('public/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">
                    KÝ TÚC XÁ ĐHSP HÀ NỘI
                </span>

            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{asset('public/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">
                            <?php
                            use Illuminate\Support\Facades\Auth;
                            use App\Models\Users;
                            $name = Auth::user()->User_name;
                            if ($name) {
                                echo $name;
                            }
                            ?>
                        </a>
                        <a class="d-block" href="{{URL::to('logout-acount')}}">Đăng xuất</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-flat nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                            
                        </li>

                        @hasrole(['admin'])
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>
                                    Quản lý nhân viên
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{URL::to('add-staff')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm nhân viên</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{URL::to('/list-staff')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách nhân viên</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th-list"></i>
                                <p>
                                    Thống kê
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{URL::to('/statistical')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thống kê</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endhasrole
                        @hasrole(['admin','staff'])
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-toolbox"></i>
                                <p>
                                    Quản lý dịch vụ
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{URL::to('/add-service')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm dịch vụ</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{URL::to('list-service')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách dịch vụ</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cash-register"></i>
                                <p>
                                    Quản lý đăng ký ký túc xá
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{URL::to('/list-register')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách đăng ký</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{URL::to('/emptyRoom')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Đăng ký ký túc xá</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-money-bill"></i>
                                <p>
                                    Quản lý hóa đơn
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{URL::to('/list-bill')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách hóa đơn</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{URL::to('/add-bill')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm hóa đơn</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{URL::to('/add-bill-service')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm hóa đơn - dịch vụ</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-industry"></i>
                                <p>
                                    Quản lý cơ sở vật chất
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{URL::to('/list-infrastructure')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách cơ sở vật chất</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{URL::to('/add-infrastructure')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm cơ sở vật chất</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-hospital-alt"></i>
                                <p>
                                    Quản lý phòng
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{URL::to('/list-room')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách phòng</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{URL::to('/add-room')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm phòng</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-graduate"></i>
                                <p>
                                    Quản lý sinh viên
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{URL::to('/list-student')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Danh sách sinh viên</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{URL::to('/add-student')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Thêm sinh viên</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endhasrole

                    </ul>

                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
                @yield('admin_content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2020 <a href="http://adminlte.io">Trường Đại học Sư phạm Hà Nội</a>.</strong>
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{asset('public/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('public/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

    <!-- Bootstrap 4 -->
    <script src="{{asset('public/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{asset('public/plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('public/plugins/sparklines/sparkline.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('public/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('public/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('public/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    
    <!-- daterangepicker -->
    <script src="{{asset('public/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('public/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('public/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('public/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('public/dist/js/adminlte.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{asset('public/dist/js/pages/dashboard.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('public/dist/js/demo.js')}}"></script>
    <script>
        // $.validate({});
    </script>
    <!-- Chartjs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{asset('public/plugins/chart.js/morris.min.js')}}"></script>
    <!-- Validations -->
    <script src="{{asset('public/dist/js/validation.js')}}"> </script>
    <script src="{{asset('public/dist/js/checkdata.js')}}"> </script>
    <!-- datatablejs -->
    <script src="{{asset('public/dist/js/datatablejs.js')}}"> </script>
    <script> 
        $(document).ready( function () {
            $('#table-search').DataTable();
        } );
    </script>
    <script>
        $(document).ready(function() {
            $('.Bill_id').change(function() {
                var Bill_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var div = $(this).parent().parent();

                var op = " ";
                $.ajax({
                    url: "{{url::to('/add-bill-service-find')}}",
                    type: 'GET',
                    dataType: "JSON",
                    data: {
                        'Bill_id': Bill_id
                    },
                    success: function(data) {
                        op += '<option value="">Please select</option>';
                        for (var i = 0; i < data.length; i++) {
                            op += '<option value="' + data[i].Service_id + '">' + data[i].Service_name + '</option>';
                        }
                        div.find('.Service_id').html(" ");
                        div.find('.Service_id').append(op);
                    }
                });
            });
            $('.Service_id').change(function() {
                var Service_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var a = $(this).parent().parent();
                var op = " ";
            
                $.ajax({
                    url: "{{url::to('/add-bill-service-findprice')}}",
                    type: 'GET',
                    dataType: "JSON",
                    data: {
                        'Service_id': Service_id
                    },
                    success: function(data) {
                        op += '<input type="text" class="form-control Price" id="Price" name="Price" value="' + data.Service_price + '" disabled/>';
                        a.find('.Price').html(" ");
                        a.find('.Price').append(op);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            // Morics Chartjs
            var chart= new Morris.Bar({
                element: 'chart',
                parseTime : false,
                hidelHover: 'auto',
                xkey: 'month',
                ykeys: ['total', 'quantity'],
                labels: ['Doanh số', 'Số phòng thuê']
            });
            $('.choose_sta').change(function() {
                var type = $(this).val()
                $.ajax({
                    url: "{{URL::to('/choose-sta')}}",
                    method: "GET",
                    dataType: "JSON",
                    data: {
                        'type': type
                    },
                    success: function(data) {
                        chart.setData(data);
                    }
                });
            });
    });
    </script>
   
</body>

</html>