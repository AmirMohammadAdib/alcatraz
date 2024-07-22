@extends('admin.layouts.master')

@section('head-tag')
    <title>فهرست برداشتی های سایت - آلکاتراز</title>

    <style>
        .waiting{
            animation: blinker .8s linear infinite;
            font-weight: 900;
            color: rgb(215, 168, 39);
            text-shadow: 0 5px 20px rgba(208, 184, 30, 0.8)
        }
    </style>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
    <li><a href="">مالی</a></li>
    <li><a href="{{ route('depoceit.index') }}">برداشتی ها</a></li>
@endsection

@section('content')
<div class="col-lg-12">
    <div class="portlet box shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">                                        
                    <i class="icon-frane"></i>
                    لیست برداشتی ها
                </h3>
            </div><!-- /.portlet-title -->
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
            <div class="top-buttons-box mb-2">

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="data-table">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>کاربر</th>
                            <th>وضعیت</th>
                            <th>مقدار درخواست برداشت</th>
                            <th>تاریخ ثبت درخواست</th>
                            <td>عملیات</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($withdraws as $key => $withdraw)
                            <tr>
                                <td>{{ $key += 1 }}</td>
                                <td>{{ $withdraw->user->username }}</td>
                                @if ($withdraw == '0')
                                    <td class="waiting">درحالت انتظار</td>
                                @elseif($withdraw == '1')
                                    <td>پایان یافته</td>
                                @else
                                    <td>کنسل شده</td>
                                @endif
                                <td>{{ number_format($withdraw->amount) . ' تومان ' }}</td>
                                <td>{{ verta($withdraw->created_at)->format('Y-m-d') }}</td>
                                <td>
                                    @if ($withdraw->status == '1')
                                        <a href="{{ asset('images/withdraws/' . $withdraw->receipt) }}" download class="btn btn-info">مشاهده فیش</a>
                                    @endif

                                    @if ($withdraw->status == '0')
                                        <a href="{{ route('withdraw.edit', [$withdraw]) }}" class="btn btn-warning">پرداخت کردن</a>
                                        <a href="{{ route('withdraw.edit', [$withdraw, 'block']) }}" class="btn btn-danger">مسدود کردن</a>   
                                    @endif

                                    @if ($withdraw->status == '2')
                                        <a href="{{ route('withdraw.edit', [$withdraw, 'block']) }}" class="btn btn-warning">رفع مسدودی</a>
                                    @endif                       
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- /.table-responsive -->
        </div><!-- /.portlet-body -->
    </div><!-- /.portlet -->
</div><!-- /.col-lg-12 -->                  
@endsection