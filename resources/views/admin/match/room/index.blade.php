@extends('admin.layouts.master')

@section('head-tag')
    <title>فهرست روم های سایت - آلکاتراز</title>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
    <li><a href="">مسابقات</a></li>
    <li><a href="{{ route('room.index') }}">روم ها</a></li>
@endsection

@section('content')
<div class="col-lg-12">
    <div class="portlet box shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">                                        
                    <i class="icon-frane"></i>
                    لیست روم ها
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
                <a class="btn btn-success" href="{{ route('room.create') }}">
                    <i class="icon-plus"></i>
                    افزودن
                </a>
            </div><!-- /.top-buttons-box -->

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="data-table">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>لینک اتاق</th>
                            <th>فی</th>
                            <th>جایزه</th>
                            <th>نوع تخصیص جایزه</th>
                            <th>ظرفیت</th>
                            <th>بازیکنان فعلی</th>
                            <th>وضعیت</th>
                            <th>تاریخ</th>
                            <td>عملیات</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>
                                <a href="#">click to redirect</a>
                            </td>
                            <td>
                                {{ number_format(19000) . ' تومان '  }}
                            </td>
                            <td>
                                {{ number_format(1000000) . ' تومان '  }}
                            </td>
                            <td>نفر اول</td>
                            <td>100</td>
                            <td>94</td>
                            <td>در انتظار اجرا</td>
                            <td>{{ verta(time())->format('Y-m-d') }}</td>
                            <td>
                                <a href="#" class="btn btn-warning">بازیکنان</a>
                                <a href="#" class="btn btn-info">ویرایش</a>
                                <a href="#" class="btn btn-danger">حذف</a>
                            </td>
                        </tr>

                        
                    </tbody>
                </table>
            </div><!-- /.table-responsive -->
        </div><!-- /.portlet-body -->
    </div><!-- /.portlet -->
</div><!-- /.col-lg-12 -->                  
@endsection