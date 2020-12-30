@extends('admin_layout')
@section('admin_content')

<!-- Main content -->
<section class="content mt-4">
  <div class="container-fluid">
    <div class="fade-in">
      <div class="card">
        <h5 class="card-header">Danh sách đăng ký ký túc xá</h5>
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
                       
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" >
                          Mã đăng ký
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" >
                          Tên phòng
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" >
                          Tên sinh viên
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" >
                          Ngày đăng ký
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" >
                         Số tháng ở
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" >
                         Action
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      @if(isset($list_register))
                        @foreach( $list_register as $k => $v)
                        <tr>
                          <td>{{$v->Registration_id}}</td>
                          <td>{{$v->Room_name}}</td>
                          <td>{{$v->User_name}}</td>
                          <td>{{$v->Registration_create}}</td>
                          <td>{{$v->NumberOfMonth}}</td>
                          <td><a href="{{URL::to('confirm-register/'.$v->Registration_id)}}" class="btn btn-primary">Phê Duyệt</a></td>
                        </tr>
                        @endforeach
                      @endif
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
<!-- /.content -->

@endsection