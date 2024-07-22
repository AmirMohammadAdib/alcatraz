@extends('admin.layouts.master')

@section('head-tag')
    <title>فهرست ادمین های سایت - آلکاتراز</title>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
    <li><a href="">احراز هویت</a></li>
    <li><a href="{{ route('admin.index') }}">ادمین ها</a></li>
@endsection

@section('content')
<div class="col-lg-12">
    <div class="portlet box shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">                                        
                    <i class="icon-frane"></i>
                    لیست ادمین ها
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
                <a class="btn btn-success" href="{{ route('admin.create') }}">
                    <i class="icon-plus"></i>
                    افزودن
                </a>
            </div><!-- /.top-buttons-box -->

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="data-table">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>نام کاربری</th>
                            <th>شماره تماس</th>
                            <th>وضعیت</th>
                            <th>نقش ها</th>
                            <th>تاریخ ساخت</th>
                            <td>عملیات</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $key => $admin)
                        <tr>
                            <td>{{ $key += 1 }}</td>
                            <td>{{ $admin->username }}</td>
                            <td>{{ $admin->phone }}</td>

                            <td>
                                @if($admin->status == '1')
                                    <span class="alert-success">فعال</span>
                                @else
                                    <span class="alert-danger">غیرفعال</span>
                                @endif
                            </td>
                            <td>-</td>
                            <td>{{ verta($admin->created_at)->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('admin.edit', [$admin]) }}" class="btn btn-warning">اعطای مجوز</a>
                                <a href="{{ route('admin.edit', [$admin]) }}" class="btn btn-info">ویرایش</a>
                                <form action="{{ route('admin.destroy', [$admin]) }}" method="POST" style="display: inline-block">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" class="btn btn-danger" value="حذف">                                
                                </form>
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