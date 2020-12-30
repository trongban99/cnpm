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
                        <h3 class="card-title">Sửa phòng</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="room" role="form" method="post" action="{{URL::to('/update-room/'.$room->Room_id)}}" enctype="multipart/form-data">
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
                                <input type="text" class="form-control" id="Room_name" name="Room_name" placeholder="Nhập tên phòng" value="{{$room->Room_name}}">
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ</label>
                                <input type="text" class="form-control" id="Room_address" name="Room_address" placeholder="Nhập địa chỉ" value="{{$room->Room_address}}">
                            </div>
                            <div class="form-group">
                                <label>Loại phòng</label>
                                <select class="form-control" id="Room_type" name="Room_type">
                                    <option value="Nam" {{ $room->Room_type == "Nam" ? 'selected' : ''}}>Nam</option>
                                    <option value="Nữ" {{ $room->Room_type == "Nữ" ? 'selected' : ''}}>Nữ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Giá phòng</label>
                                <input type="text" class="form-control" id="Room_price" name="Room_price" placeholder="Nhập giá phòng" value="{{$room->Room_price}}">
                            </div>
                            <div class="form-group">
                                <label>Số người ở</label>
                                <select class="form-control" id="Number_people" name="Number_people">
                                    <option value="Nam" {{ $room->Number_people == "6" ? 'selected' : ''}}>6</option>
                                    <option value="Nữ" {{ $room->Number_people == "8" ? 'selected' : ''}}>8</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Diện tích</label>
                                <input type="text" class="form-control" id="Room_acreage" name="Room_acreage" placeholder="Nhập diện tích" value="{{$room->Room_acreage}}">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" name="edit_room" value="Sửa"></input>
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