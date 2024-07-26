@extends('admin.layouts.master')

@section('head-tag')
    <title>فهرست بازیکنان سایت - آلکاتراز</title>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
    <li><a href="">احراز هویت</a></li>
    <li><a href="{{ route('player.index') }}">بازیکنان</a></li>
    <li><a href="">تاریخچه معاملات</a></li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8">
            <div class="portlet box shadow">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">                                        
                            <i class="icon-graph"></i>
                            بازی های انجام شده
                        </h3>
                    </div><!-- /.portlet-title -->
                    <div class="buttons-box">
                        <a class="btn btn-sm btn-default btn-round btn-fullscreen" rel="tooltip" title="تمام صفحه" href="#">
                            <i class="icon-size-fullscreen"></i>
                        </a>
                        <a class="btn btn-sm btn-default btn-round btn-close" rel="tooltip" title="بستن" href="#">
                            <i class="icon-trash"></i>
                        </a>
                    </div><!-- /.buttons-box -->
                </div><!-- /.portlet-heading -->
                <div class="portlet-body">
                    <canvas id="game" class="min-height-400"></canvas>
                </div><!-- /.portlet-body -->
            </div><!-- /.portlet -->
        </div><!-- /.col-lg-12 -->
        <div class="col-lg-4">
            <div class="portlet box shadow">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">                                        
                            <i class="icon-speech"></i>
                            برنده شده
                        </h3>
                    </div><!-- /.portlet-title -->
                    <div class="buttons-box">
                        <a class="btn btn-sm btn-default btn-round btn-collapse" rel="tooltip" title="کوچک کردن" href="#">
                            <i class="icon-arrow-up"></i>
                        </a>
                        <a class="btn btn-sm btn-default btn-round btn-close" rel="tooltip" title="بستن" href="#">
                            <i class="icon-trash"></i>
                        </a>
                    </div><!-- /.buttons-box -->
                </div><!-- /.portlet-heading -->
                <div class="portlet-body min-height-400" style="overflow: scroll">
                    <div class="table-responsive"> 
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ردیف</th>
                                    <th>روم</th>
                                    <th>جایزه</th>
                                    <th>تاریخ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($winners as $key => $winner)
                                <tr>
                                    <td>{{ $key += 1 }}</td>
                                    <td><a href="{{ $winner->room->link }}">click</a></td>
                                    <td>
                                        {{ number_format($winner->room->award) . ' تومان ' }}
                                    </td>
                                    <td>
                                        {{ verta($winner->created_at)->format('Y/m/d') }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                </div><!-- /.portlet-body -->
            </div><!-- /.portlet -->
        </div>

        <h1>کیف پول:‌ {{ number_format($player->wallet) . ' تومان '  }}</h1>
        <h1>کیف پول جایزه:‌ {{ number_format($player->award_wallet) . ' تومان '  }}</h1>


        <div class="row mt-3">
            <div class="col-lg-4">
                <div class="portlet box shadow">
                    <div class="portlet-heading">
                        <div class="portlet-title">
                            <h3 class="title">                                        
                                <i class="icon-speech"></i>
                                واریزی های اخیر
                            </h3>
                        </div><!-- /.portlet-title -->
                        <div class="buttons-box">
                            <a class="btn btn-sm btn-default btn-round btn-collapse" rel="tooltip" title="کوچک کردن" href="#">
                                <i class="icon-arrow-up"></i>
                            </a>
                            <a class="btn btn-sm btn-default btn-round btn-close" rel="tooltip" title="بستن" href="#">
                                <i class="icon-trash"></i>
                            </a>
                        </div><!-- /.buttons-box -->
                    </div><!-- /.portlet-heading -->
                    <div class="portlet-body min-height-400" style="overflow: scroll">
                        <div class="table-responsive"> 
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ردیف</th>
                                        <th>کاربر</th>
                                        <th>مقدار</th>
                                        <th>تاریخ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($deposites as $key => $deposite)
                                    <tr>
                                        <td>{{ $key += 1 }}</td>
                                        <td>{{ $deposite->user->username }}</td>
                                        <td>
                                            {{ number_format($deposite->amount) . ' تومان ' }}
                                        </td>
                                        <td>
                                            {{ verta($deposite->created_at)->format('Y/m/d') }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div><!-- /.table-responsive -->
                    </div><!-- /.portlet-body -->
                </div><!-- /.portlet -->
            </div>
    
            <div class="col-lg-4">
                <div class="portlet box shadow">
                    <div class="portlet-heading">
                        <div class="portlet-title">
                            <h3 class="title">                                        
                                <i class="icon-speech"></i>
                                برداشتی های اخیر
                            </h3>
                        </div><!-- /.portlet-title -->
                        <div class="buttons-box">
                            <a class="btn btn-sm btn-default btn-round btn-collapse" rel="tooltip" title="کوچک کردن" href="#">
                                <i class="icon-arrow-up"></i>
                            </a>
                            <a class="btn btn-sm btn-default btn-round btn-close" rel="tooltip" title="بستن" href="#">
                                <i class="icon-trash"></i>
                            </a>
                        </div><!-- /.buttons-box -->
                    </div><!-- /.portlet-heading -->
                    <div class="portlet-body min-height-400" style="overflow: scroll">
                        <div class="table-responsive"> 
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ردیف</th>
                                        <th>کاربر</th>
                                        <th>مقدار</th>
                                        <th>تاریخ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($withdraws as $key => $withdraw)
                                    <tr>
                                        <td>{{ $key += 1 }}</td>
                                        <td>{{ $withdraw->user->username }}</td>
                                        <td>
                                            {{ number_format($withdraw->amount) . ' تومان ' }}
                                        </td>
                                        <td>
                                            {{ verta($withdraw->created_at)->format('Y/m/d') }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div><!-- /.table-responsive -->
                    </div><!-- /.portlet-body -->
                </div><!-- /.portlet -->
            </div>

            <div class="col-lg-4">
                <div class="portlet box shadow">
                    <div class="portlet-heading">
                        <div class="portlet-title">
                            <h3 class="title">                                        
                                <i class="icon-speech"></i>
                                اکانت های ثبت شده برای فروش
                            </h3>
                        </div><!-- /.portlet-title -->
                        <div class="buttons-box">
                            <a class="btn btn-sm btn-default btn-round btn-collapse" rel="tooltip" title="کوچک کردن" href="#">
                                <i class="icon-arrow-up"></i>
                            </a>
                            <a class="btn btn-sm btn-default btn-round btn-close" rel="tooltip" title="بستن" href="#">
                                <i class="icon-trash"></i>
                            </a>
                        </div><!-- /.buttons-box -->
                    </div><!-- /.portlet-heading -->
                    <div class="portlet-body min-height-400" style="overflow: scroll">
                        <div class="table-responsive"> 
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ردیف</th>
                                        <th>عنوان</th>
                                        <th>قیمت</th>
                                        <th>uID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($requests as $key => $request)
                                    <tr>
                                        <td>{{ $key += 1 }}</td>
                                        <td>{{ substr($request->description , 0, 15) }} </td>
                                        <td>{{ number_format($request->saler_price) . ' تومان ' }}</td>
                                        <td>
                                            {{ $request->game_uid }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div><!-- /.table-responsive -->
                    </div><!-- /.portlet-body -->
                </div><!-- /.portlet -->
            </div>

        </div>
    </div>
@endsection


@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    
<script>


$.ajax({
    url: '/api/games/{{ $player->id }}',
    success: function(res){
        new Chart("game", {
            type: "line",
            data: {
                labels: res.result.month,
                datasets: [{
                backgroundColor:"rgba(0,0,255,0.3)",
                borderColor: "rgba(0,0,255,0.1)",
                data: res.result.data
                }]
            },
            options:{
                responsive: true,
                legend: {
                    display: false
                },
            }
        });
    }
})


</script>

@endsection