@extends('admin.layouts.master')

@section('head-tag')
    <title>فهرست واریزی های سایت - آلکاتراز</title>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
    <li><a href="">مالی</a></li>
    <li><a href="{{ route('depoceit.index') }}">واریزی ها</a></li>
@endsection

@section('content')
<div class="col-lg-12">
    <div class="portlet box shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">                                        
                    <i class="icon-frane"></i>
                    لیست واریزی ها
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
                            <th>نوع پرداخت</th>
                            <th>کد رهگیری</th>
                            <th>مقدار واریزی</th>
                            <th>تاریخ واریز</th>
                            <td>عملیات</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($deposits as $key => $deposit)
                            <tr>
                                <td>{{ $key += 1 }}</td>
                                <td>{{ $deposit->user->username }}</td>
                                <td>{{ $deposit->type == '0' ? 'درگاه پرداخت' : 'کارت به کارت'  }}</td>
                                <td>{{ $deposit->transaction_code == null ? '-' : $deposit->transaction_code  }}</td>
                                <td>{{ number_format($deposit->amount) . ' تومان ' }}</td>
                                <td>{{ verta($deposit->created_at)->format('Y-m-d') }}</td>
                                <td>
                                    <a href="{{ asset('images/deposits/' . $deposit->receipt) }}" download class="btn btn-info">مشاهده فیش</a>

                                    @if ($deposit->type == '1')
                                        <a href="#" class="btn btn-info">تایید واریزی</a>                                                                    
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