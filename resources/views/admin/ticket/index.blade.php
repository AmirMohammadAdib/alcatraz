@extends('admin.layouts.master')

@section('head-tag')
    <title>فهرست تیکت ها سایت - آلکاتراز</title>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
    <li><a href="">تیکت</a></li>
    <li><a href="">تیکت ها</a></li>
@endsection

@section('content')
<div class="col-lg-12">
    <div class="portlet box shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">                                        
                    <i class="icon-frane"></i>
                    لیست تیکت ها
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
                            <th>نویسنده تیکت</th>
                            <th>عنوان تیکت</th>
                            <th>اولویت تیکت</th>
                            <th>ارجاع شده به</th>
                            <th>تیکت مرجع</th>
                            <th>تاریخ</th>
                            <td>عملیات</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>amiradib</td>
                            <td>واریز نشدن درخواست واریزی</td>
                            <td>فوری</td>
                            <td>admin 2</td>
                            <td> - </td>
                           
                            <td>{{ verta(time())->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('admin.ticket.show', 1) }}" class="btn btn-info">مشاهده</a>
                                <a href="{{ route('admin.ticket.change', 1) }}" class="btn btn-danger">بستن</a>
                            </td>
                        </tr>

                        
                    </tbody>
                </table>
            </div><!-- /.table-responsive -->
        </div><!-- /.portlet-body -->
    </div><!-- /.portlet -->
</div><!-- /.col-lg-12 -->                  
@endsection