<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Ký túc xá</title>
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
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- client.css -->
    <link rel="stylesheet" href="{{asset('public/dist/css/client-pages.css')}}">
</head>

<body class="sidebar-mini layout-fixed text-sm">
    <div class="wrapper">
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

        <!--end header -->
        <div class="slide-show mt-3">
            <div class="container">
                <div class="carousel slide" id="carouselExampleIndicators" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li class="active" data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=777&amp;fg=555&amp;text=First slide" alt="First slide [800x400]" src="{{('public/assests/img/slideshow2.jpg')}}" data-holder-rendered="true" />
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=666&amp;fg=444&amp;text=Second slide" alt="Second slide [800x400]" src="{{('public/assests/img/slideshow2.jpg')}}" data-holder-rendered="true" />
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" data-src="holder.js/800x400?auto=yes&amp;bg=555&amp;fg=333&amp;text=Third slide" alt="Third slide [800x400]" src="{{('public/assests/img/slideshow2.jpg')}}" data-holder-rendered="true" />
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a>
                </div>
            </div>
        </div>

        <!-- start about-tab -->
        <div class="about-tab mt-5">
            <div class="container no-padding">
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="text-justify p-4">
                            <span>
                                <strong>
                                    Lựa chọn phòng ở phù hợp với điều kiện và nhu cầu của bạn
                                </strong>
                            </span>
                        </h3>
                    </div>
                    <div class="col-md-8 text-justify p-4">
                        <span class="">
                            Ký túc xá Trường ĐHSP Hà Nội tọa lạc trên diện tích 12.000m2,
                            với 05 tòa nhà cao tầng đáp ứng được hơn 3000 chỗ ở cho sinh
                            viên. Phòng ở trong Ký túc xá được trang bị các trang thiết bị
                            cần thiết cho cuộc sống: ti vi, điều hòa, bình nóng lạnh,...
                            Chúng tôi cố gắng cung cấp đầy đủ các dịch vụ để học sinh, sinh
                            viên nội trú cảm thấy hài lòng nhất. Sẽ có nhiều lựa chọn phòng
                            ở phù hợp với nhu cầu và điều kiện của bạn. Hãy liên hệ với
                            chúng tôi để đăng ký ngay cho bạn chỗ ở phù hợp nhất.
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- end about-tab -->
        <!-- start imgages tab -->
        <div class="container image-tab mt-4">
            <div class="row">
                <div class="col-md-4">
                    <div class="box-images">
                        <img src="{{('public/assests/img/images1.jpg')}}" alt="" width="100%" height="100%" />
                        <h5 class="text-center p-4"><a href="#">PHÒNG Ở</a></h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box-images">
                        <img src="{{('public/assests/img/images2.jpg')}}" alt="" width="100%" height="100%" />
                        <h5 class="text-center p-4"><a href="#">BẢNG GIÁ</a></h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box-images">
                        <img src="{{('public/assests/img/images3.jpg')}}" alt="" width="100%" height="100%" />
                        <h5 class="text-center p-4"><a href="#">ĐĂNG KÝ</a></h5>
                    </div>
                </div>
            </div>
        </div>
        <!-- end start images -->

        <!--start featurePane -->
        <div class="featurePane">
            <div class="container feature-tab text-center">
                <h3 class="p-4">TRANG THIẾT BỊ VÀ DỊCH VỤ</h3>
                <div class="row p-4">
                    <div class="col-md-4 box-hover">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <a href="#">Khu vực SHC</a>
                    </div>
                    <div class="col-md-4 box-hover">
                        <i class="fa fa-wifi" aria-hidden="true"></i>
                        <a href="#">Internet - Wifi</a>
                    </div>
                    <div class="col-md-4 box-hover">
                        <i class="fa fa-recycle" aria-hidden="true"></i>
                        <a href="#">Giặt là</a>
                    </div>
                </div>
                <div class="row p-4">
                    <div class="col-md-4 box-hover">
                        <i class="fa fa-car" aria-hidden="true"></i>
                        <a href="#">Nhà xe</a>
                    </div>
                    <div class="col-md-4 box-hover">
                        <i class="fa fa-futbol" aria-hidden="true"></i>
                        <a href="#">Khu thể thao</a>
                    </div>
                    <div class="col-md-4 box-hover">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <a href="#">Siêu thị</a>
                    </div>
                </div>
                <div class="row p-4">
                    <div class="col-md-4 box-hover">
                        <i class="fa fa-coffee" aria-hidden="true"></i>
                        <a href="#">Nhà ăn - Cafe</a>
                    </div>
                    <div class="col-md-4 box-hover">
                        <i class="fa fa-question-circle" aria-hidden="true"></i>
                        <a href="#">Hỗ trợ sinh viên</a>
                    </div>
                    <div class="col-md-4 box-hover">
                        <i class="fa fa-user-secret" aria-hidden="true"></i>
                        <a href="#">An ninh</a>
                    </div>
                </div>
            </div>
        </div>
        <!--end featurePane-->

        <!--ưu điểm-->
        <div class="container mt-5">
            <h2 class="text-center">NHỮNG ƯU ĐIỂM KHI SỐNG TRONG KÝ TÚC XÁ</h2>
            <p style="text-align: justify" class="mt-3">
                <span style="font-size: 14px">Học sinh, sinh viên&nbsp;nội trú&nbsp;tại&nbsp;Ký túc xá&nbsp;sẽ có
                    một môi trường&nbsp;xã hội tích cực để học tập và rèn luyện,&nbsp;từ
                    đó có điều kiện xây dựng cơ sở vững chắc hơn cho tương lai. Khi sống
                    trong môi trường Ký túc xá, học sinh, sinh viên nội trú&nbsp;sẽ có
                    những&nbsp;kỷ niệm sâu sắc và những người bạn suốt đời.&nbsp;Sống
                    trong khuôn viên Ký túc xá, học sinh, sinh viên&nbsp;sẽ có điều kiện
                    ở gần các giảng đường, phòng thí nghiệm, thư viện,... của Trường.
                    Ngoài ra, khi sống ở Ký túc xá, học sinh, sinh viên&nbsp;sẽ sống
                    và&nbsp;học tập trong&nbsp;một môi trường xanh, sạch, đẹp và an
                    toàn.</span>
            </p>
            <p style="text-align: justify" class="mb-4">
                <span style="font-size: 14px">Học sinh, sinh viên cũng có điều kiện để sử dụng&nbsp;các dịch vụ
                    khác: dịch vụ giao thông (Ký túc xá nằm&nbsp;gần bến xe Mỹ Đình, ga
                    tàu điện trên cao, bến xe bus); dịch vụ y tế (Ký túc xá nằm gần các
                    bệnh viện lớn, có uy tín như: Bệnh viện Bộ Công an 19/8, Bệnh viện
                    E,...);&nbsp;các tiện ích xã hội khác (Ký túc xá nằm gần&nbsp;công
                    viên Cầu Giấy, Công viên Nghĩa Đô, Bảo tàng Dân Tộc học,…).
                    Đây&nbsp;sẽ là các điều kiện hết sức lý tưởng cho sinh hoạt và học
                    tập của học sinh, sinh viên.</span>
            </p>
        </div>
        <!--end ưu điểm -->

        <!-- faq-tab -->
        <div class="faq-tab">
            <div class="container">
                <h3 class="text-center p-4">
                    <span id="dnn_ctr433_dnnTITLE_titleLabel" class="TitleH3 centered">CÂU HỎI THƯỜNG GẶP</span>
                </h3>
                <div class="row">
                    <div class="col-md-4">
                        <div class="faqbody">
                            <h3 class="text-center">Các câu hỏi chung</h3>
                            <div class="dropdown p-2">
                                <div class="question-answer">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        1. Tôi phải làm sao để được vào ở Ký túc xá?
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        Để được duyệt đơn vào ở Ký túc xá (KTX), trước hết bạn
                                        phải vào đăng ký tại www.qlktx.hnue.edu.vn. Sau khi điền
                                        đầy đủ thông tin bắt buộc, bạn sẽ nhận được email thông
                                        báo và làm theo hướng dẫn
                                    </div>
                                </div>

                                <div class="question-answer">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        2. Sau khi được duyệt đơn, tôi phải làm gì?
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        Bạn cần đến ngay Ban Quản lý Ký túc xá để làm các thủ tục
                                        hoàn thiện hồ sơ đăng ký chỗ ở.
                                    </div>
                                </div>

                                <div class="question-answer">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        3. Khi nào tôi phải nộp đơn đăng ký ở?
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        Cuối mỗi năm học, KTX sẽ có thông báo đến tất cả các bạn
                                        sinh viên nội trú về kế hoạch đăng ký chỗ ở cho năm học
                                        mới.
                                    </div>
                                </div>

                                <div class="question-answer">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        4. Tôi có được chọn chỗ ở không?
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        Có. Bạn có thể hoàn toàn đăng ký chỗ ở theo ý muốn nếu bạn
                                        đăng ký ở sớm và lúc đó KTX còn đủ phòng ở theo nhu cầu
                                        của bạn.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="faqbody">
                            <h3 class="text-center">
                                Các câu hỏi liên quan đến hợp đồng và thanh lý hợp đồng
                            </h3>
                            <div class="dropdown p-2">
                                <div class="question-answer">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        1. Thời hạn hợp đồng của tôi là bao lâu?
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        Theo quy định của Trường, hợp đồng 01 năm học là 10 tháng.
                                    </div>
                                </div>

                                <div class="question-answer">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        2. Tôi có thể biết giá của các phòng ở không?
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        Có. Bạn truy cập vào: Bảng giá để tra tìm giá của các loại
                                        phòng ở.
                                    </div>
                                </div>

                                <div class="question-answer">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        3. Các khoản phí khác gồm những gì?
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        Là các khoản phụ trội khi bạn sử dụng trong phòng ở, như:
                                        điện, nước, vệ sinh.
                                    </div>
                                </div>

                                <div class="question-answer">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        4. Tiền cược tài sản là gì?
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        Tiền cược là số tiền bạn phải đặt cược đối với các tài sản
                                        được trang bị trong phòng để đảm bảo bạn có trách nhiệm
                                        với các loại tài sản đó. Sau khi thanh toán hợp đồng, bạn
                                        sẽ được hoàn trả.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="faqbody">
                            <h3 class="text-center">
                                Các câu hỏi liên quan đến an ninh, dịch vụ
                            </h3>
                            <div class="dropdown p-2">
                                <div class="question-answer">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        1. Tôi có được rời khỏi phòng dài ngày không?
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        Có. Tuy nhiên, bạn phải báo cáo với cán bộ quản lý nhà.
                                    </div>
                                </div>

                                <div class="question-answer">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        2. Ở trong KTX có an toàn không?
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        Có. KTX đã xây dựng hàng rào xung quanh, lắp đặt camera an
                                        ninh tại các toà nhà, các khu công cộng. Ngoài ra, phòng
                                        Bảo vệ của Trường đảm nhận nhiệm vụ trực tại các cổng ra
                                        vào. Cổng chính trực 24/24.
                                    </div>
                                </div>

                                <div class="question-answer">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        3. Y tế trong KTX có đảm bảo không?
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        Có. Hằng ngày, từ 18h00 đến 6h00, có y tá túc trực để đảm
                                        bảo an toàn sức khỏe cho bạn và thực hiện sơ cứu ban đầu
                                        nếu có vấn đề xảy ra.
                                    </div>
                                </div>

                                <div class="question-answer">
                                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        4. Khi cần, tôi nên gọi điện báo cho ai?
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        Bạn có thể gọi điện trực tiếp cho cán bộ quản lý nhà, hoặc
                                        đường dây nóng
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end faq-tab -->

        <!-- Footer -->
        <footer class="page-footer font-small blue-grey lighten-5">
            <div style="background-color: #21d192">
                <div class="container">
                    <!-- Grid row-->
                    <div class="row py-4 d-flex align-items-center">
                        <!-- Grid column -->
                        <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
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
                        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px" />
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
                        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px" />
                        <div class="working-time">
                            <span class="elementor-icon-list-icon">
                                <i aria-hidden="true" class="fas fa-clock"></i>
                            </span>
                            <span class="elementor-icon-list-text">Thời gian làm việc:<br />8h00–17h00&nbsp;(Thứ 2 đến Thứ7)</span>
                        </div>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-6 col-lg-4 col-xl-4 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase font-weight-bold">Bản đồ</h6>
                        <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px" />
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8008438613642!2d105.78322931424547!3d21.04065329274964!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab345cc4acf7%3A0xeb0c296556f22ff!2zS8O9IHTDumMgeMOhIMSQ4bqhaSBo4buNYyBTxrAgcGjhuqFtIEjDoCBO4buZaQ!5e0!3m2!1svi!2s!4v1607611837236!5m2!1svi!2s" width="500" height="250" frameborder="0" style="border: 0" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
            <!-- Footer Links -->

            <!-- Copyright -->
            <div class="footer-copyright text-center text-black-50 py-3">
                <b>© 2020 Copyright: Thuộc về Ban quản lí Ký túc xá - Trường ĐHSP Hà
                    Nội</b>
            </div>
            <!-- Copyright -->
        </footer>
        <!-- Footer -->
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
    <!-- Validations -->
    <script src="{{asset('public/dist/js/form-validator.min.js')}} "></script>
</body>

</html>