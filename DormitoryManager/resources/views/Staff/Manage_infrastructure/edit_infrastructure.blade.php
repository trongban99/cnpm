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
                        <h3 class="card-title">Sửa Cở sở vật chất</h3>
                    </div>
                    <!-- /.card-header -->

                    <!-- form start -->
                    <form class="facilities" role="form" method="post"  action="{{URL::to('/update-infrastructure/'.$facilities->Facilities_id)}}" enctype="multipart/form-data">
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
                                <label for="">Tên Cơ sở vật chất</label>
                                <input type="text" class="form-control" id="Facilities_name" name="Facilities_name" value="{{$facilities->Facilities_name}}">
                            </div>
                           
                            <div class="form-group">
                                <label for="">Thương hiệu</label>
                                <input type="text" class="form-control" id="Facilities_brand" name="Facilities_brand" value="{{$facilities->Facilities_brand}}" >
                            </div>
                            <div class="form-group">
                                <label for="">Số lượng </label>
                                <input type="text" class="form-control" id="Facilities_quantity" name="Facilities_quantity" value="{{$facilities->Facilities_quantity}}" >
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" name="edit_facilities" value="Sửa"></input>
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