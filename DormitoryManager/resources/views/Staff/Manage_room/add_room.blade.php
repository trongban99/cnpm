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
                        <h3 class="card-title">Thêm phòng</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="room" role="form" method="post" action="{{URL::to('/save-room')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <?php
                        use Illuminate\Support\Facades\Session;
                        $message =Session::get('message');
                        if($message){
                            echo '<span class="err" style="text-align: center;
                            color: red;
                            font-weight: bold;">'.$message.'</span>';
                            Session::put('message',null);
                        }
                        ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Tên phòng</label>
                                <input type="text" class="form-control" id="Room_name" name="Room_name" placeholder="Nhập tên phòng" 
                                value="{{old('Room_name')}}">
                            </div>
                            <div class="form-group">
                                <label for="">Địa chỉ</label>
                                <input type="text" class="form-control" id="Room_address" name="Room_address" placeholder="Nhập địa chỉ" 
                                value="{{old('Room_address')}}" >
                            </div>
                            <div class="form-group">
                                <label>Loại phòng</label>
                                <select class="form-control" id="Room_type" name="Room_type">
                                    <option value="">------Please select--------</option>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Giá phòng</label>
                                <input type="text" class="form-control" id="Room_price" name="Room_price" placeholder="Nhập giá phòng" 
                                value="{{old('Room_price')}}" >
                            </div>
                            <div class="form-group">
                                <label>Sô người ở</label>
                                <select class="form-control" id="Number_people" name="Number_people">
                                    <option value="">------Please select--------</option>
                                    <option value="6">6</option>
                                    <option value="6">8</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Diện tích</label>
                                <input type="text" class="form-control" id="Room_acreage" name="Room_acreage" placeholder="Nhập diện tích" 
                                value="{{old('Room_acreage')}}">
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" name="add_room" value="Thêm mới"></input>
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