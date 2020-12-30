@extends('admin_layout')
@section('admin_content')
<section class="content mt-4">
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <h5 class="card-header">Danh sách phòng</h5>
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
                    <form method="post" action>
                        <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <!-- <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_length" id="DataTables_Table_0_length">
                                        <label>
                                            Show entries
                                            <select name="DataTables_Table_0_length" aria-controls="DataTables_Table_0" class="custom-select custom-select-sm form-control form-control-sm">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div id="DataTables_Table_0_filter" class="dataTables_filter">
                                        <label>Search:
                                            <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="DataTables_Table_0" />
                                        </label>
                                    </div>
                                </div>
                            </div> -->

                            <div class="row">
                                <div class="col-sm-12">
                                    <table class="table table-striped table-bordered datatable dataTable no-footer" id="table-search" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Username: activate to sort column descending" style="width: 150px">
                                                    Tên phòng
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 187px">
                                                    Địa chỉ
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 187px">
                                                   Loại phòng
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" >
                                                    Giá phòng
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >
                                                   Số người ở
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" >
                                                   Diện tích
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 198px">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $room as $key =>$v)
                                            <tr role="row" class="odd">
                                                <td>{{ $v->Room_name }}</td>
                                                <td>{{ $v->Room_address }}</td>
                                                <td>{{ $v->Room_type }}</td>
                                                <td>{{ $v->Room_price }}</td>
                                                <td>{{ $v->Number_people }}</td>
                                                <td>{{ $v->Room_acreage }}</td>
                                                <td>
                                                    <a class="btn btn-sm btn-primary" href="{{URL::to('/edit-room/'.$v->Room_id)}}" >
                                                        <i class="fas fa-tools"></i>
                                                    </a>
                                                    <a class="btn btn-sm btn-danger"   href="{{URL::to('/delete-room/'.$v->Room_id)}}" onclick="return confirm('Bạn có chắc chán muốn xóa không?')">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <!-- <div class="col-sm-12 col-md-7"></div>
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                                        <ul class="pagination">
                                            <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous">
                                                <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                            </li>
                                            <li class="paginate_button page-item active">
                                                <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0" class="page-link">1</a>
                                            </li>
                                            <li class="paginate_button page-item">
                                                <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" class="page-link">2</a>
                                            </li>
                                            <li class="paginate_button page-item">
                                                <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="3" tabindex="0" class="page-link">3</a>
                                            </li>
                                            <li class="paginate_button page-item">
                                                <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="4" tabindex="0" class="page-link">4</a>
                                            </li>
                                            <li class="paginate_button page-item next" id="DataTables_Table_0_next">
                                                <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="5" tabindex="0" class="page-link">Next</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection