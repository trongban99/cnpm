@extends('admin_layout')
@section('admin_content')
<section class="content mt-4">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thêm hóa đơn</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class="bill" role="form" method="post" action="{{URL::to('save-bill')}}">
                        {{ csrf_field() }}
                        <?php
                        use Illuminate\Support\Facades\Session;
                        $message = Session::get('message');
                        if ($message) {
                            echo '<span class="err-login">' . $message . '</span>';
                            Session::put('message', null);
                        } ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Tên hóa đơn</label>
                                <input type="text" class="form-control" id="Bill_name" name="Bill_name" placeholder="Nhập hóa đơn">
                            </div>
                            <div class="form-group">
                                <label>Mã phòng</label>
                                <select class="form-control" id="select1" name="Room_id">
                                    <option value="">----Please select----</option>
                                    @foreach($room as $k => $v)
                                    <option value="{{$v->Room_id}}">{{$v->Room_id}}----{{$v->Room_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Ngày lập hóa đơn</label>
                                <div class="input-control">
                                    <input class="form-control" id="date-input" type="date" name="Bill_create">
                                </div>
                                <!-- /.input group -->
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary" name="add_bill" value="Thêm mới"></input>
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
@endsection