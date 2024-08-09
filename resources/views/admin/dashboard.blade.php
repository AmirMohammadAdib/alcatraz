@extends('admin.layouts.master')

@section('breadcrumb')
    <li><a href="{{ route('admin.index') }}">پیشخوان</a></li>
@endsection


@section('content')


<div class="col-md-12">
    <div class="row">                            
        <div class="col-lg-3 col-6">
            <div class="stat-box use-cyan shadow">
                <a href="#">                                
                    <div class="stat">
                        <div class="counter-down" data-value="{{ $statistic['view'] }}"></div>
                        <div class="h3">بازدیدکننده</div>
                    </div><!-- /.stat -->
                    <div class="visual">
                        <i class="icon-eye"></i>
                    </div><!-- /.visual -->
                </a>
            </div><!-- /.stat-box -->
        </div><!-- /.col-lg-3 -->
        <div class="col-lg-3 col-6">
            <div class="stat-box use-blue shadow">
                <a href="#">                                
                    <div class="stat">
                        <div class="counter-down" data-value="{{ $statistic['cpOrder'] }}"></div>
                        <div class="h3">فاکتور فروش سی پی</div>
                    </div><!-- /.stat -->
                    <div class="visual">
                        <i class="icon-calculator"></i>
                    </div><!-- /.visual -->
                </a>
            </div><!-- /.stat-box -->
        </div><!-- /.col-lg-3 -->
        <div class="col-lg-3 col-6">
            <div class="stat-box use-green shadow">
                <a href="#">                                
                    <div class="stat">
                        <div class="counter-down" data-value="{{ $statistic['usersCount'] }}"></div>
                        <div class="h3">کاربر خشنود</div>
                    </div><!-- /.stat -->
                    <div class="visual">
                        <i class="icon-heart"></i>
                    </div><!-- /.visual -->
                </a>
            </div><!-- /.stat-box -->
        </div><!-- /.col-lg-3 -->
        <div class="col-lg-3 col-6">
            <div class="stat-box use-lime shadow">
                <a href="#">                                
                    <div class="stat">
                        <div style="font-size: 20px">{{ number_format($statistic['income']) }}</div>
                        <div class="h3">تومان درآمد</div>
                    </div><!-- /.stat -->
                    <div class="visual">
                        <i class="icon-wallet"></i>
                    </div><!-- /.visual -->
                </a>
            </div><!-- /.stat-box -->
        </div><!-- /.col-lg-3 -->
    </div><!-- /.row -->


    <div class="row">
        <div class="col-lg-8">
            <div class="portlet box shadow">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">                                        
                            <i class="icon-graph"></i>
                            درآمد سال گذشته حاصل از فروش cp
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
                    <canvas id="cpShop" class="min-height-400"></canvas>
                </div><!-- /.portlet-body -->
            </div><!-- /.portlet -->
        </div><!-- /.col-lg-12 -->

        <div class="col-lg-4">
            <div class="portlet box shadow">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">                                        
                            <i class="icon-speech"></i>
                            بازیکنان برتر مسابقات
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
                                    <th>دفعات برد</th>
                                    <th>اخرین مسابقه</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topUsers as $key => $user)
                                <tr>
                                    <td>{{ $key += 1 }}</td>
                                    <td>{{ \App\Models\User::find($user->user_id)->username }}</td>
                                    <td>{{ $user->total }}</td>
                                    <td>{{ verta(\App\Models\Player::where('user_id', $user->user_id)->orderBy('created_at', 'desc')->first()->created_at)->format('Y/m/d') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                    <a href="{{ route('player.index') }}" class="btn btn-success btn-block">
                        <i class="icon-list fa-flip-horizontal"></i>
                        مشاهده فهرست کامل بازیکنان
                    </a>
                </div><!-- /.portlet-body -->
            </div><!-- /.portlet -->
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="portlet box shadow">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">                                        
                            <i class="icon-graph"></i>
                            کاربران سایت
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
                <div class="portlet-body" >
                    <canvas id="usersSite" ></canvas>
                </div><!-- /.portlet-body -->
            </div><!-- /.portlet -->
        </div><!-- /.col-lg-12 -->



        <div class="col-lg-5">
            <div class="portlet box shadow">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">                                        
                            <i class="icon-speech"></i>
                            اخرین درخواست های فروش اکانت
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
                    <a href="{{ route('request.index') }}" class="btn btn-success btn-block">
                        <i class="icon-list fa-flip-horizontal"></i>
                        مشاهده فهرست کامل درخواست ها
                    </a>
                </div><!-- /.portlet-body -->
            </div><!-- /.portlet -->
        </div>

        <div class="col-lg-7">
            <div class="portlet box shadow">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">                                        
                            <i class="icon-graph"></i>
                            درآمد سال گذشته حاصل از فروش اکانت
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
                    <canvas id="accShop" class="min-height-400"></canvas>
                </div><!-- /.portlet-body -->
            </div><!-- /.portlet -->
        </div>
    </div>


    <div class="row">
        <div class="col-lg-4">
            <div class="portlet box shadow">
                <div class="portlet-heading">
                    <div class="portlet-title">
                        <h3 class="title">                                        
                            <i class="icon-speech"></i>
                            مسابقات جاری
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
                                    <th>فی</th>
                                    <th>لینک</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($currentRooms as $key => $room)
                                <tr>
                                    <td>{{ $key += 1 }}</td>
                                    <td>{{ $room->fee == null ? 'رایگان' : number_format($room->fee) . ' تومان ' }}</td>
                                    <td>
                                        <a href="{{ $room->link }}">click</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('room-player.index', ['room_id' => $room]) }}" class="btn btn-warning">بازیکنان</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                    <a href="{{ route('room.index') }}" class="btn btn-success btn-block">
                        <i class="icon-list fa-flip-horizontal"></i>
                        مشاهده فهرست کامل مسابقات ها
                    </a>
                </div><!-- /.portlet-body -->
            </div><!-- /.portlet -->
        </div>

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
                    <a href="{{ route('depoceit.index') }}" class="btn btn-success btn-block">
                        <i class="icon-list fa-flip-horizontal"></i>
                        مشاهده فهرست کامل واریزی ها
                    </a>
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
                    <a href="{{ route('withdraw.index') }}" class="btn btn-success btn-block">
                        <i class="icon-list fa-flip-horizontal"></i>
                        مشاهده فهرست کامل برداشتی ها
                    </a>
                </div><!-- /.portlet-body -->
            </div><!-- /.portlet -->
        </div>

    </div>
</div>


@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    
<script>

const xValues = ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'];
const yValues = [7,8,8,9,9,9,10,11,14,14,15,16];

$.ajax({
    url: '/api/cp-order',
    success: function(res){
        new Chart("cpShop", {
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

$.ajax({
    url: '/api/account-order',
    success: function (res){
        new Chart("accShop", {
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


$.ajax({
    url: '/api/users',
    success: function(res){
        new Chart("usersSite", {
        type: "line",
            data: {
                labels: res.result.month,

                datasets: [{
                data: res.result.first,
                borderColor: "orange",
                fill: false,
                label: 'تازه کار'

                },{
                data: res.result.nob,
                borderColor: "red",
                fill: false,
                label: 'نوب'

                },{
                data: res.result.player,
                borderColor: "green",
                fill: false,
                label: 'پلیر'

                },{
                data: res.result.proPlayer,
                borderColor: "pink",
                fill: false,
                label: 'پروپلیر'

                },{
                data: res.result.ultraPlayer,
                borderColor: "blue",
                fill: false,
                label: 'اولترا پلیر'
                }]
            },
            options: {
                responsive: true,

            }
        });

    }
})
</script>

@endsection