<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Giới thiệu chung</title>
    <link
      rel="icon"
      href="../../assests/img/icon-logo-title.png"
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
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- client.css -->
    <link rel="stylesheet" href="{{asset('public/dist/css/client-pages.css')}}">
  </head>
  <body class="sidebar-mini layout-fixed text-sm">
    <!-- header -->
    <div class="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a title="Ký túc xá - Trường Đại học Sư phạm Hà Nội" href="#"><img id="" class="logo" src="{{('public/assests/img/logo.png')}}" alt="Ký túc xá - Trường Đại học Sư phạm Hà Nội" /></a>
                    </div>
                    <div class="col-md-9">
                        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto topnav">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{URL::to('/')}}">Trang chủ <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{URL::to('/introduce')}}">Giới thiệu</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Đăng ký thuê phòng</a>
                                    </li>
                                    <?php
                                        use Illuminate\Support\Facades\Auth;
                                        use Illuminate\Support\Facades\DB;
                                        $id = Auth::id();
                                        if(isset($id) ){
                                        $checkroles = DB::select("SELECT users_User_id
                                        from roles_users
                                        WHERE users_User_id = ".$id." and roles_id_roles = 3");
                                        }?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{URL::to('/contact')}}">Liên hệ</a>
                                    </li>
                                    
                                    <?php   if(isset($id)){?>
                                         <li class="nav-item">
                                        <a class="nav-link" href="{{URL::to('/logout-acount')}}">Đăng xuất</a>
                                        </li>
                                    <?php }else{?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{URL::to('/login-acount')}}">Đăng nhập</a>
                                    </li>
                                    <?php }?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{URL::to('/register-acount')}}">Đăng kí</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    <!-- ./header -->

    <!--main-->
    <div class="container mt-5">
      <div class="row">
        <div class="contentPane">
          <h4 class="text-center">
            KÝ TÚC XÁ TRƯỜNG ĐHSP HÀ NỘI - NƠI ĐÁNG SỐNG CỦA&nbsp;SINH VIÊN
          </h4>
          <p class="mt-4">
            <img
              src="{{('public/assests/img/banner-introduce.jpg')}}"
              alt=""
              width="100%"
              height="auto"
            />
          </p>
          <div class="text-content">
            <p>
              <span style="font-size: 16px"
                ><strong>CHỨC NĂNG - NHIỆM VỤ</strong></span
              >
            </p>
            <p>
              <span style="font-size: 16px"
                ><strong>1. Chức năng:</strong></span
              >
            </p>
            <p>
              <span style="font-size: 16px"
                >- Giúp Hiệu trưởng thực hiện chức năng quản lý, phục vụ sinh
                viên nội trú ngoài giờ lên lớp.</span
              >
            </p>
            <p>
              <span style="font-size: 16px"
                >- Quản lý cơ sở vật chất, an ninh trật tự, vệ sinh môi trường
                trong khuôn viên Ký túc xá.</span
              >
            </p>
            <p>
              <span style="font-size: 16px"><strong>2. Nhiệm vụ:</strong></span>
            </p>
            <p>
              <span style="font-size: 16px"
                >- Quản lý sinh viên ngoài giờ lên lớp:</span
              >
            </p>
            <p style="text-align: justify">
              <span style="font-size: 16px"
                >- Bảo đảm an ninh chính trị, trật tự an toàn, phòng chống cháy
                nổ và vệ sinh môi trường</span
              >
            </p>
            <p style="text-align: justify">
              <span style="font-size: 16px"
                >- Quản lý, tổ chức các dịch vụ phục vụ sinh viên</span
              >
            </p>
            <p style="text-align: justify">
              <span style="font-size: 16px"
                >- Quản lý, sử dụng và sửa chữa nâng cấp cơ sở vật chất.</span
              >
            </p>
            <p style="text-align: justify">
              <span style="font-size: 16px"
                >- Quản lý, sử dụng nguồn tài chính do trường cấp và nguồn tài
                chính thu tại chỗ.</span
              >
            </p>
            <p style="text-align: justify">
              <span style="font-size: 16px"
                >Trong hơn nửa thế kỷ xây dựng và trưởng thành, cùng với sự phát
                triển của Nhà trường, Ký túc xá không ngừng hoàn thiện về mô
                hình, cơ chế quản lý, từng bước phát triển với mục tiêu trở
                thành “nơi đáng sống của sinh viên”.</span
              >
            </p>
            <p>
              <span style="font-size: 16px"
                >&nbsp;Ký túc xá trường Đại học Sư phạm Hà Nội là đơn vị phục vụ
                sinh viên ở tại Ký túc xá, có nhiều kinh nghiệm trong việc quản
                lý, tập hợp và hỗ trợ sinh viên ở nhiểu lĩnh vực, góp phần nâng
                cao đời sống tinh thần, hỗ trợ kịp thời những khó khăn, giải đáp
                những thắc mắc của học viên, sinh viên. Với quy mô đào tạo ngày
                càng tăng của trường Đại học Sư phạm Hà Nội, Ban Quản lý Ký túc
                xá &nbsp;đã và đang từng bước đổi mới mạnh mẽ để ngày càng hoàn
                thiện hơn để hỗ trợ và phục vụ cho sinh viên.</span
              >
            </p>
            <p>
              <span style="font-size: 16px"
                >Với phương châm:&nbsp;“Ký túc xá phải là nơi đáng sống của sinh
                viên”, Ký túc xá Trường Đại học Sư phạm Hà Nội luôn đồng hành,
                là cầu nối và hỗ trợ Ban Giám hiệu, các đơn vị chức năng trong
                và ngoài trường nhằm đem đến cho học sinh, sinh viên, học viên,…
                những điều kiện ăn, ở, học tập và sinh hoạt tốt nhất.</span
              >
            </p>
          </div>
        </div>
      </div>
    </div>

    <!--./main-->

    <!-- Footer -->
    <footer class="page-footer font-small blue-grey lighten-5 mt-5">
      <div style="background-color: #21d192">
        <div class="container">
          <!-- Grid row-->
          <div class="row py-4 d-flex align-items-center">
            <!-- Grid column -->
            <div
              class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0"
            >
              <h6 class="mb-0">
                Hãy kết nối với chúng tôi trên các mạng xã hội!
              </h6>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-6 col-lg-7 text-center text-md-right">
              <!-- Facebook -->
              <a class="fb-ic">
                <i class="fab fa-facebook-f white-text mr-4"> </i>
              </a>
              <!-- Twitter -->
              <a class="tw-ic">
                <i class="fab fa-twitter white-text mr-4"> </i>
              </a>
              <!-- Google +-->
              <a class="gplus-ic">
                <i class="fab fa-google-plus-g white-text mr-4"> </i>
              </a>
              <!--Linkedin -->
              <a class="li-ic">
                <i class="fab fa-linkedin-in white-text mr-4"> </i>
              </a>
              <!--Instagram-->
              <a class="ins-ic">
                <i class="fab fa-instagram white-text"> </i>
              </a>
            </div>
            <!-- Grid column -->
          </div>
          <!-- Grid row-->
        </div>
      </div>

      <!-- Footer Links -->
      <div class="container text-center text-md-left mt-5">
        <!-- Grid row -->
        <div class="row mt-3 dark-grey-text">
          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
            <!-- Content -->
            <h6 class="text-uppercase font-weight-bold">VỀ CHÚNG TÔI</h6>
            <hr
              class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto"
              style="width: 60px"
            />
            <p>BAN QUẢN LÝ KÝ TÚC XÁ ĐẠI HỌC SƯ PHẠM HÀ NỘI</p>

            <p><i class="fas fa-envelope mr-3"></i> info@hnue.edu.vn</p>
            <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
            <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase font-weight-bold">GIỜ LÀM VIỆC</h6>
            <hr
              class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto"
              style="width: 60px"
            />
            <div class="working-time">
              <span class="elementor-icon-list-icon">
                <i aria-hidden="true" class="fas fa-clock"></i>
              </span>
              <span class="elementor-icon-list-text"
                >Thời gian làm việc:<br />8h00–17h00&nbsp;(Thứ 2 đến Thứ7)</span
              >
            </div>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-6 col-lg-4 col-xl-4 mx-auto mb-4">
            <!-- Links -->
            <h6 class="text-uppercase font-weight-bold">Bản đồ</h6>
            <hr
              class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto"
              style="width: 60px"
            />
            <iframe
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8008438613642!2d105.78322931424547!3d21.04065329274964!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab345cc4acf7%3A0xeb0c296556f22ff!2zS8O9IHTDumMgeMOhIMSQ4bqhaSBo4buNYyBTxrAgcGjhuqFtIEjDoCBO4buZaQ!5e0!3m2!1svi!2s!4v1607611837236!5m2!1svi!2s"
              width="500"
              height="250"
              frameborder="0"
              style="border: 0"
              allowfullscreen=""
              aria-hidden="false"
              tabindex="0"
            ></iframe>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row -->
      </div>
      <!-- Footer Links -->

      <!-- Copyright -->
      <div class="footer-copyright text-center text-black-50 py-3">
        <b
          >© 2020 Copyright: Thuộc về Ban quản lí Ký túc xá - Trường ĐHSP Hà
          Nội</b
        >
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <!-- jQuery -->
   
  </body>
</html>
