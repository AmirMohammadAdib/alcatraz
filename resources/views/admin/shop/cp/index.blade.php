@extends('admin.layouts.master')

@section('head-tag')
    <title>فهرست محصولات سایت - آلکاتراز</title>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
    <li><a href="">فروشگاه</a></li>
    <li><a href="{{ route('cp.index') }}">محصولات</a></li>
@endsection

@section('content')
<div class="col-lg-12">
    <div class="portlet box shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">                                        
                    <i class="icon-frane"></i>
                    لیست محصولات
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
                <a class="btn btn-success" href="{{ route('cp.create') }}">
                    <i class="icon-plus"></i>
                    افزودن
                </a>
            </div><!-- /.top-buttons-box -->

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="data-table">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>عنوان محصول</th>
                            <th>مقدار</th>
                            <th>تصویر</th>
                            <th>مبلغ</th>
                            <th>وضعیت</th>
                            <th>تاریخ ساخت</th>
                            <td>عملیات</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>سی پی دوبل (فوری)</td>
                            <td>90 عدد</td>
                            <td>
                                <img src="https://codpointsandcredits.com/wp-content/uploads/2019/11/Free-COD-Points.png" width="50">
                            </td>
                            <td>۱۳۰،۰۰۰ تومان</td>
                            <td>
                                <span class="alert-success">موجود</span>
                            </td>
                            <td>{{ verta(time())->format('Y-m-d') }}</td>
                            <td>
                                <a href="#" class="btn btn-warning">ناموجود کردن</a>
                                <a href="#" class="btn btn-info">ویرایش</a>
                                <a href="#" class="btn btn-danger">حذف</a>
                            </td>
                        </tr>

                        <tr>
                            <td>1</td>
                            <td>سی پی دوبل (فوری)</td>
                            <td>90 عدد</td>
                            <td>
                                <img src="https://codpointsandcredits.com/wp-content/uploads/2019/11/Free-COD-Points.png" width="50">
                            </td>
                            <td>۱۳۰،۰۰۰ تومان</td>
                            <td>
                                <span class="alert-danger">ناموجود</span>
                            </td>
                            <td>{{ verta(time())->format('Y-m-d') }}</td>
                            <td>
                                <a href="#" class="btn btn-warning">موجود کردن</a>
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