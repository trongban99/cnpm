@extends('student_layout')
@section('student_content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="c-subheader justify-content-between px-3">
                <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item"><a href="#">Student</a></li>
                    <li class="breadcrumb-item active">Đăng ký Ký túc xá</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Đăng ký ký túc xá</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="res-staff" role="form" method="POST" action="{{URL::to('/save-register')}}" enctype="multipart/form-data">
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
                                <label for="">Tên phòng</label>
                                <input type="text" class="form-control" id="Room_name" value="{{$room->Room_name}}" name="Room_name" disabled>
                                <input type="text" class="form-control" id="Room_id" value="{{$room->Room_id}}" name="Room_id" hidden>
                            </div>
                            <div class="form-group">
                                <label>Ngày đăng ký</label>
                                <div class="input-control">
                                    <input class="form-control" id="date-input" value="{{old('Registration_create')}}" type="date" name="Registration_create"  >
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Số tháng ở</label>
                                <select class="form-control" id="select1" name="NumberOfMonth">
                                    <option value="">--- Lựa Chọn ----</option>
                                    <option value="3">3 tháng</option>
                                    <option value="6">6 tháng</option>
                                    <option value="9">9 tháng</option>
                                    <option value="12">12 tháng</option>
                                </select>
                            </div>
                            <div class="form-group clearfix">
                                <div class="row">
                                    <label class="col-md-3">Lựa chọn dịch vụ</label>
                                    <div class="col-md-9">
                                        @foreach($serviceOfRoom as $k => $v)
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-" type="checkbox" value="{{$v->Service_id}}" name="Service1" checked disabled>
                                            <label class="form-check-label" for="inline-radio1">{{$v->Service_name}}</label>
                                        </div>
                                        @endforeach
                                        @foreach($service as $k => $v)
                                        <div class="form-check form-check-inline mr-1">
                                            <input class="form-check-input" id="inline-" type="checkbox" value="{{$v->Service_id}}" name="Service[]">
                                            <label class="form-check-label" for="inline-radio1">{{$v->Service_name}}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <input type="submit" class="btn btn-primary" name="add_register" value="Đăng ký"></input>
                            </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>


@endsection