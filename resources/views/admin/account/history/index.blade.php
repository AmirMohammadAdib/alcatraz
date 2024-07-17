@extends('admin.layouts.master')

@section('head-tag')
    <title>فهرست تاریخچه سفارشات سایت - آلکاتراز</title>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
    <li><a href="">فروشگاه</a></li>
    <li><a href="{{ route('account-order.index', ['history']) }}">تاریخچه سفارشات</a></li>
@endsection

@section('content')
<div class="col-lg-12">
    <div class="portlet box shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">                                        
                    <i class="icon-frane"></i>
                    لیست تاریخچه سفارشات
                </h3>
            </div><!-- /.portlet-title -->


            <canvas id="myChart" style="width:100%; height: 20rem;margin-top:1rem"></canvas>


            <div class="buttons-box">
                <a class="btn btn-sm btn-default btn-round btn-fullscreen" rel="tooltip" title="تمام صفحه" href="#">
                    <i class="icon-size-fullscreen"></i>
                </a>
                <a class="btn btn-sm btn-default btn-round btn-collapse" rel="tooltip" title="کوچک کردن" href="#">
                    <i class="icon-arrow-up"></i>
                </a>
            </div><!-- /.buttons-box -->
        </div><!-- /.portlet-heading -->
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="data-table">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>خریدار</th>
                            <th>اکانت</th>
                            <th>کد رهگیری</th>
                            <th>ایمیل</th>
                            <th>رمز عبور</th>
                            <th>تاریخ</th>
                            <td>عملیات</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>09338744117</td>
                            <td>اکانت کال اف دیوتی لول ۱۰۰ - ۲</td>
                            <td>۹۹۱۰۲۱</td>
                            <td>test@gmail.com</td>
                            <td>******</td>
                            <td>{{ verta(time())->format('Y-m-d') }}</td>
                            <td>
                                <a href="#" class="btn btn-info">تاریخچه مالی کاربر</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div><!-- /.table-responsive -->
        </div><!-- /.portlet-body -->
    </div><!-- /.portlet -->
</div><!-- /.col-lg-12 -->                  
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    
    <script>

const xValues = ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'];
const yValues = [7,8,8,9,9,9,10,11,14,14,15,16];

new Chart("myChart", {
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