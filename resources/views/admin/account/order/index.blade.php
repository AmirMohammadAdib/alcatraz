@extends('admin.layouts.master')

@section('head-tag')
    <title>فهرست سفارشات سایت - آلکاتراز</title>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
    <li><a href="">اکانت</a></li>
    <li><a href="{{ route('account-order.index') }}">سفارشات</a></li>
@endsection

@section('content')
<div class="col-lg-12">
    <div class="portlet box shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">                                        
                    <i class="icon-frane"></i>
                    لیست سفارشات
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
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="data-table">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>خریدار</th>
                            <th>اکانت</th>
                            <th>کد رهگیری</th>
                            <th>وضعیت پرداختی</th>
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
                            <td>
                                <span class="alert-success">پرداخت شده</span>
                            </td>
                            <td>test@gmail.com</td>
                            <td>dD@13qa</td>
                            <td>{{ verta(time())->format('Y-m-d') }}</td>
                            <td>
                                <a href="#" class="btn btn-danger">کنسل کردن</a>
                                <a href="#" class="btn btn-success">اعلام پایان کار</a>
                            </td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>09338744117</td>
                            <td>اکانت کال اف دیوتی لول ۱۰۰ - ۲</td>
                            <td>-</td>
                            <td>
                                <span class="alert-warning">پرداخت نشده</span>
                            </td>
                            <td>test@gmail.com</td>
                            <td>dD@13qa</td>
                            <td>{{ verta(time())->format('Y-m-d') }}</td>
                            <td>
                                <a href="#" class="btn btn-danger">کنسل کردن</a>
                                <a href="#" class="btn btn-success">پرداخت دستی</a>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div><!-- /.table-responsive -->
        </div><!-- /.portlet-body -->
    </div><!-- /.portlet -->
</div><!-- /.col-lg-12 -->                  
@endsection