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
                        <h3 class="card-title">Sửa dịch vụ</h3>
                    </div>
                    <!-- /.card-header -->

                    <!-- form start -->
                    <form  class="service" role="form" method="post" action="{{URL::to('/update-service/'.$service->Service_id)}}" enctype="multipart/form-data">
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
                                <label for="">Tên dịch vụ</label>
                                <input type="text" class="form-control" id="Service_name" name="Service_name" value="{{$service->Service_name}}" >
                            </div>
                            <div class="form-group">
                                <label for="">Mô tả</label>
                                <input type="text" class="form-control" id="Service_desc" name="Service_desc" value="{{$service->Service_desc}}" >
                            </div>
                            <div class="form-group">
                                <label for="">Đơn vị tính</label>
                                <input type="text" class="form-control" id="Service_unit" name="Service_unit" value="{{$service->Service_unit}}" >
                            </div>
                            <div class="form-group">
                                <label for="">Đơn giá</label>
                                <input type="text" class="form-control" id="Service_price" name="Service_price" value="{{$service->Service_price}}" >
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" name="edit_service" value="Sửa dịch vụ"></input>
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
<!-- /.content -->
@endsection