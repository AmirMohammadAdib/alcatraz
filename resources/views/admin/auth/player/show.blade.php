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
                                @for ($i=1; $i < 6; $i++)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td><a href="">click</a></td>
                                    <td>
                                        {{ number_format(200000) . ' تومان ' }}
                                    </td>
                                    <td>
                                        1403/11/23
                                    </td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                </div><!-- /.portlet-body -->
            </div><!-- /.portlet -->
        </div>

        <h1>کیف پول:‌ {{ number_format(2000000) . ' تومان '  }}</h1>


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
                                    @for ($i=1; $i < 6; $i++)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>amiradib</td>
                                        <td>
                                            {{ number_format(200000) . ' تومان ' }}
                                        </td>
                                        <td>
                                            1403/11/23
                                        </td>
                                    </tr>
                                    @endfor
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
                                    @for ($i=1; $i < 6; $i++)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>amiradib</td>
                                        <td>
                                            {{ number_format(200000) . ' تومان ' }}
                                        </td>
                                        <td>
                                            1403/11/23
                                        </td>
                                    </tr>
                                    @endfor
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
                                        <th>uID</th>
                                        <th>قیت اعلامی</th>
                                        <th>عملیات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for ($i=1; $i < 6; $i++)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>amiradib</td>
                                        <td>
                                            {{ number_format(200000) . ' تومان ' }}
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-warning">مشاهده</a>
                                        </td>
                                    </tr>
                                    @endfor
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

const xValues = ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'];
const yValues = [7,8,8,9,9,9,10,11,14,14,15,16];

new Chart("game", {
    type: "line",
    data: {
        labels: xValues,
        datasets: [{
        backgroundColor:"rgba(0,0,255,0.3)",
        borderColor: "rgba(0,0,255,0.1)",
        data: yValues
        }]
    },
    options:{
        responsive: true,
        legend: {
            display: false
        },
    }
});


</script>

@endsection