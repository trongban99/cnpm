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
                        <h3 class="card-title">Thêm hóa đơn - Dịch vụ</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form class ="bill-service" role="form" method="post" action="{{URL::to('save-bill-service')}}">
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
                                <label>Mã hóa đơn</label>
                                <select class="form-control Bill_id" id="Bill_id" name="Bill_id" >
                                    <option value="">Please select</option>
                                    @foreach($bill as $k => $v)
                                    <option value="{{$v->Bill_id}}">{{$v->Bill_id}}---{{$v->Bill_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tên dịch vụ</label>
                                <select class="form-control Service_id" id="Service_id" name="Service_id" >
                                    <option value="" >Tên dịch vụ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Đơn giá</label>
                                <div class="Price">
                                    <input type="text" class="form-control Price" id="Price2" name="Price2" placeholder="Nhập đơn giá" disabled/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Chỉ số cũ</label>
                                <input type="text" class="form-control" id="Old_index" name="Old_index" placeholder="Nhập chỉ số cũ" />
                            </div>
                            <div class="form-group">
                                <label for="">Chỉ số mới</label>
                                <input type="text" class="form-control" id="New_index" name="New_index" placeholder="Nhập chỉ số mới" />
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">
                                Thêm mới
                            </button>
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
