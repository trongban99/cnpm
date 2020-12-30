@extends('student_layout')
@section('student_content')
<!-- Main content -->
<section class="content mt-4">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <h5 class="card-header">Danh sách hóa đơn chưa thanh toán</h5>
                <div class="card-body">
                    <form method="post" action>
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-striped table-bordered datatable dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column descending" style="width: 150">
                                                    Mã hóa đơn
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 200">
                                                    Tên hóa đơn
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 150px">
                                                    Tên phòng
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 150px">
                                                    Ngày lập
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 150px">
                                                    Tổng tiền
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 150px">
                                                    Trạng thái
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 150px">
                                                    Xem chi tiết
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                
                                            @foreach( $list_bill as $key =>$v)
                                            <tr role="row" class="odd">
                                                <td>{{ $v->Bill_id }}</td>
                                                <td>{{ $v->Bill_name }}</td>
                                                <td>{{ $v->Bill_name }}</td>
                                                <td>{{ $v->Bill_create }}</td>
                                                <td>{{ $v->Bill_total}}</td>
                                                <td>{{ $v->Bill_status ==0 ? 'Chưa thanh toán' :'Đã thanh toán' }}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-primary" href="{{URL::to('/detail-bill/'.$student_id.'/'.$room_id.'/'.$v->Bill_id)}}">
                                                        Xem chi tiết
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection