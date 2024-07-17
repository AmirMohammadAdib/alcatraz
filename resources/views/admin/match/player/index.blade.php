@extends('admin.layouts.master')

@section('head-tag')
    <title>فهرست برندگان سایت - آلکاتراز</title>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
    <li><a href="">مسابقات</a></li>
    <li><a href="{{ route('room-player.index') }}">برندگان</a></li>
@endsection

@section('content')
<div class="col-lg-12">
    <div class="portlet box shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">                                        
                    <i class="icon-frane"></i>
                    لیست برندگان
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
                            <th>نام کاربری</th>
                            <th>شماره تماس</th>
                            <th>وضعیت</th>
                            <th>سطح</th>
                            <th>کیف پول</th>
                            <th>تاریخ ساخت</th>
                            <td>عملیات</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>userX</td>
                            <td>09904978193</td>
                            <td>
                                <span class="alert-success">فعال</span>
                            </td>
                            <td>نوب</td>
                            <td>۱۳۰،۰۰۰ تومان</td>
                            <td>{{ verta(time())->format('Y-m-d') }}</td>
                            <td>
                                <a href="#" class="btn btn-warning">تاریخچه معاملات</a>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div><!-- /.table-responsive -->
        </div><!-- /.portlet-body -->
    </div><!-- /.portlet -->
</div><!-- /.col-lg-12 -->                  
@endsection