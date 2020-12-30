@extends('admin_layout')
@section('admin_content')
<section class="content">
    <div class="container-fluid">
    <h5 class="card-header">Danh sách các phòng còn trống</h5>
        <div class="row">
            @foreach($room as $k => $v)
            <div class="col-lg-3 col-6">
                <a href="{{URL::to('/registerRoom/'.$v->Room_id)}}" class="">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3> {{ $v->Room_name }}</h3>
                        </div>
                        <div class="icons">
                            <?php for ($i = $v->Number_people; $i > $v->Conlai; $i--) { ?>
                                <i class="fas fa-user stay"></i>
                            <?php } ?>
                            <?php for ($i = 1; $i <= $v->Conlai; $i++) { ?>
                                <i class="fas fa-user"></i>
                            <?php } ?>
                        </div>
                        
                        <br><br>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>
<style>
    .stay{
        color: orangered;
    }

    .icons, .inner {
        width: 245px;
        height: auto;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .inner h3 {
        color: orange;
    }

    .icons i {
        font-size: 30px;
        padding-left: 8px;
    }


</style>
@endsection