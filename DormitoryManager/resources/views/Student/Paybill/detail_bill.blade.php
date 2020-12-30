@extends('student_layout')
@section('student_content')
<!-- Main content -->
<section class="content mt-4">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <h5 class="card-header">Chi tiết hóa đơn dịch vụ</h5>
                <div class="card-body">
                    <form method="post" action>
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-striped table-bordered datatable dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column descending" >
                                                 Tên dịch vụ
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" s>
                                                  Chỉ số cũ
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" >
                                                    Chỉ số mới
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >
                                                  Đơn giá
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" >
                                                  Thành tiền
                                                </th>
                                            </tr>
                                                <?php $total =0;?>
                                                 @foreach( $service_detail as $key =>$v)
                                            <tr role="row" class="odd">
                                                <td>{{ $v-> Service_name}}</td>
                                                <td>{{ $v->Old_index != '' ? $v->Old_index: 'NULL' }}</td>
                                                <td>{{ $v->New_index != '' ? $v->Old_index: 'NULL' }}</td>
                                                <td>{{ $v->Price }}</td>
                                                <td>{{ $v->Total}}</td>
                                            </tr>
                                                <?php $total+= $v->Total;?>
                                                @endforeach
                                            <tr role="row" class="odd">
                                                <td colspan="4"><center>Tổng tiền dịch vụ</center></td>
                                                <td>{{$total}}</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header"> <center> Chi Tiết Thông tin Phòng</center> </div>
                <div class="card-body">
                    <form method="post" action>
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-striped table-bordered datatable dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column descending" >
                                                  Tên phòng
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" >
                                                   Số người đang ở
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" >
                                                    Giá phòng/Người
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >
                                                   Tổng tiền
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach( $info_room as $key1 =>$v1)
                                            <tr role="row" class="odd">
                                                <td>{{ $v1->Room_name}}</td>
                                                <td>{{ $v1->SLDK }}</td>
                                                <td>{{ $v1->Room_price}}</td>
                                                <td>{{ $v1->SLDK * $v1->Room_price}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3"><center>Tổng thanh toán</center></td>
                                                <td>{{$total + $v1->SLDK * $v1->Room_price}}</td>
                                            </tr>
                                            @endforeach
                    
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <a href="{{URL::to('/pay-bill/'.$room_id.'/'.$v->Bill_id)}}" class=" btn btn-sm btn-danger">Xác nhận thanh toán hóa đơn</a>
            </div>
        </div>
    </div>
</section>

@endsection