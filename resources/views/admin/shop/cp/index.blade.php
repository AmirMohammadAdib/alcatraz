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
                            <th>کاور</th>
                            <th>مبلغ</th>
                            <th>مبلغ سوپر فوری</th>
                            <th>وضعیت</th>
                            <th>تاریخ ساخت</th>
                            <td>عملیات</td>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($cps as $key => $cp)
                            <tr>
                                <td>{{ $key += 1 }}</td>
                                <td>{{ $cp->title }}</td>
                                <td>{{ number_format($cp->amount) }} عدد</td>
                                <td>
                                    <img src="{{ asset('images/cp/cover/' . $cp->cover) }}" width="50">
                                </td>
                                <td>{{ number_format($cp->price) . ' تومان ' }}</td>
                                <td>{{ number_format($cp->super_price) . ' تومان ' }}</td>
                                <td>
                                    @if ($cp->status == '0')
                                        <span class="alert-danger">ناموجود</span>
                                    @else
                                        <span class="alert-success">موجود</span>             
                                    @endif
                                </td>
                                <td>{{ verta($cp->created_at)->format('Y-m-d') }}</td>
                                <td>
                                    @if ($cp->status == '0')
                                        <a href="{{ route('cp.edit', [$cp, 'status']) }}" class="btn btn-warning">موجود کردن</a>
                                    @else
                                        <a href="{{ route('cp.edit', [$cp, 'status']) }}" class="btn btn-warning">ناموجود کردن</a>
                                    @endif

                                    <a href="{{ route('cp.edit', [$cp]) }}" class="btn btn-info">ویرایش</a>
                                    <form action="{{ route('cp.destroy', [$cp]) }}" method="POST" style="display: inline-block">
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