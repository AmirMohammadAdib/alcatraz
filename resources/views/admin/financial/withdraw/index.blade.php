@extends('admin.layouts.master')

@section('head-tag')
    <title>فهرست برداشتی های سایت - آلکاتراز</title>
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
                        <tr>
                            <td>1</td>
                            <td>09338744117</td>
                            <td>درحالت انتظار</td>
                            <td>{{ number_format(150000) . ' تومان ' }}</td>
                            <td>{{ verta(time())->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('withdraw.edit', 1) }}" class="btn btn-warning">پرداخت کردن</a>
                                <a href="#" class="btn btn-danger">کنسل</a>                                
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>09338744117</td>
                            <td>پایان یافته</td>
                            <td>{{ number_format(150000) . ' تومان ' }}</td>
                            <td>{{ verta(time())->format('Y-m-d') }}</td>
                            <td>
                                <a href="#" class="btn btn-info">مشاهده فیش</a>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div><!-- /.table-responsive -->
        </div><!-- /.portlet-body -->
    </div><!-- /.portlet -->
</div><!-- /.col-lg-12 -->                  
@endsection