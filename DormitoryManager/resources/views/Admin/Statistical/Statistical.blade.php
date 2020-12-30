@extends('admin_layout')
@section('admin_content')
<div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $count_room }}</h3>

                    <p>Phòng</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="{{URL::to('list-room')}}" class="small-box-footer"> Xem Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $count_student }}</h3>

                    <p>Sinh viên</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person"></i>
                </div>
                <a href="{{URL::to('list-student')}}" class="small-box-footer">Xem Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $count_service}}</h3>

                    <p>Dịch vụ</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="{{URL::to('list-service')}}" class="small-box-footer">Xem Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $count_facilities}}</h3>

                    <p>Trang thiết bị</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{URL::to('list-infrastructure')}}" class="small-box-footer">Xem Chi tiết <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-9 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-pie mr-1"></i><b> Doanh thu </b>
                    </h3>
                    <div class="card-tools">
                        <form autocomplete="off">
                            <select class="form-control choose_sta">
                                <option>---Lựa chọn---</option>
                                <option value="thangnay"> Tháng này</option>
                                <option value="3thangtruoc"> 3 Tháng trước</option>
                                <option value="6thangtruoc">6 Tháng trước</option>
                                <option value="9thangtruoc">9 Tháng trước</option>
                            </select>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content p-0">
                        <!-- Morris chart - Sales -->
                        <div id="chart" style="height: 250px;"></div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.Left col -->
        <section class="col-lg-3 connectedSortable">
        </section>
        <!-- right col -->
    </div>
    <!-- /.row (main row) -->
</div>

@endsection