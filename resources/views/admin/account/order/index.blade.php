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
                            <th>ایمیل</th>
                            <th>رمز عبور</th>
                            <th>تاریخ</th>
                            <td>عملیات</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key => $order)
                        <tr>
                            <td>{{ $key += 1 }}</td>
                            <td>{{ $order->user->phone }}</td>
                            <td>{{ $order->account->title }}</td>
                            <td>{{ $order->payment_id == null ? ' - ' : $order->payment->transaction_id  }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->password }}</td>
                            <td>{{ verta($order->created_at)->format('Y-m-d') }}</td>
                            <td>
                                <form action="{{ route('order.destroy', [$order]) }}" method="POST" style="display: inline-block">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" class="btn btn-danger" value="کنسل کردن">                                
                                </form>
                                <a href="{{ route('order.edit', [$order]) }}" class="btn btn-success">اعلام پایان کار</a>
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