@extends('admin_layout')
@section('admin_content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="c-subheader justify-content-between px-3">
                <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item"><a href="#">Staff</a></li>
                    <li class="breadcrumb-item active">Danh sách hóa đơn</li>
                </ol>
            </div>
        </div>
    </div>

</section>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header"> <center> Chi Tiết Hóa Đơn Dịch vụ </center></div>
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
                                            <tr >
                                                <td>{{ $v-> Service_name}}</td>
                                                <td>{{ $v->Old_index != '' ? $v->Old_index: 'NULL' }}</td>
                                                <td>{{ $v->New_index != '' ? $v->New_index: 'NULL' }}</td>
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
                                                <td colspan="3"><center>Tổng tiền hóa đơn</center></td>
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
                    <a href="{{URL::to('list-bill')}}" class="form-control btn btn-sm btn-danger">Trở về</a>
            </div>
        </div>
    </div>
</section>

@endsection