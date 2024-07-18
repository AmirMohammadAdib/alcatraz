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
                        <div class="counter-down" data-value="4096"></div>
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
                        <div class="counter-down" data-value="2048"></div>
                        <div class="h3">فاکتور فروش</div>
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
                        <div class="counter-down" data-value="1024"></div>
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
                        <div class="counter-down" data-value="512"></div>
                        <div class="h3">میلیون تومان درآمد</div>
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
                                @for ($i=1; $i < 7; $i++)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>mairadib</td>
                                    <td>20</td>
                                    <td>1396/03/16</td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                    <a href="#" class="btn btn-success btn-block">
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
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i=1; $i < 6; $i++)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>اکانت کال اف ریوتی ... </td>
                                    <td>{{ number_format(250000) . ' تومان ' }}</td>
                                    <td>
                                        <a href="" class="btn btn-warning">مشاهده</a>
                                    </td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                    <a href="#" class="btn btn-success btn-block">
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
                                    <th>عنوان</th>
                                    <th>لینک</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i=1; $i < 6; $i++)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>مسابقه بتل ویژه</td>
                                    <td>
                                        <a href="">click</a>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-warning">بازیکنان</a>
                                    </td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div><!-- /.table-responsive -->
                    <a href="#" class="btn btn-success btn-block">
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
                    <a href="#" class="btn btn-success btn-block">
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
                    <a href="#" class="btn btn-success btn-block">
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

new Chart("cpShop", {
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

new Chart("accShop", {
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



new Chart("usersSite", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      data: [860,1140,1060,1060,1070,1110,1330,2210,7830,2478, 3100, 3500],
      borderColor: "red",
      fill: false,
      label: 'نوب'

    },{
      data: [1600,1700,1700,1900,2000,2700,4000,5000,6000,7000, 5000, 5500],
      borderColor: "green",
      fill: false,
      label: 'پلیر'

    },{
      data: [300,700,2000,5000,6000,4000,2000,1000,200,100, 50, 75],
      borderColor: "blue",
      fill: false,
      label: 'اولترا پلیر'
    }]
  },
  options: {
    responsive: true,

  }
});

</script>

@endsection