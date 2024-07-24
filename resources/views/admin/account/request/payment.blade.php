@extends('admin.layouts.master')

@section('head-tag')
    <title>فهرست درخواست سایت - آلکاتراز</title>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
    <li><a href="">اکانت</a></li>
    <li><a href="{{ route('request.index') }}">درخواست</a></li>
    <li><a href="">پرداخت</a></li>
@endsection

@section('content')

<div class="col-12">
    <div class="portlet box shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">                                        
                    <i class="icon-settings"></i>
                    پرداخت درخواست
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
            <form role="form" method="POST" action="{{ route('request.update', [$request, 'payment']) }}">
                @csrf
                @method('PUT')

                <div class="form-body">
                    <div class="form-group">
                        <label>شماره کارت کاربر</label>
                        <div class="input-group @error('cart_number') has-error @enderror">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <input type="text" class="form-control" style="pointer-events:none;" placeholder="شماره کارت کاربر" value="{{ $request->user->cart_number }}">

                            @error('cart_number')
                                <span class="alert-danger">{{ $message }}</span>
                            @enderror

                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->

                    <div class="form-body">
                        <div class="form-group">
                            <label>مبلغ</label>
                            <div class="input-group @error('price') has-error @enderror">
                                <span class="input-group-addon">
                                    <i class="icon-user"></i>
                                </span>
                                <input type="text" class="form-control" style="pointer-events:none;" placeholder="مبلغ" value="{{ number_format($request->site_price) }} تومان">
    
                                @error('price')
                                    <span class="alert-danger">{{ $message }}</span>
                                @enderror
    
                            </div><!-- /.input-group -->
                        </div><!-- /.form-group -->

                    <div class="form-group">
                        <label>کد رهگیری</label>
                        <div class="input-group @error('transaction_id') has-error @enderror">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="کد رهگیری" value="{{ old('transaction_id') }}" name="transaction_id">

                            @error('transaction_id')
                                <span class="alert-danger">{{ $message }}</span>
                            @enderror

                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->

                    
                </div><!-- /.form-body -->

                <div class="form-actions">
                    <button type="submit" class="btn btn-success btn-round">
                        <i class="icon-check"></i>
                        پایان معامله
                    </button>
                    <a href="{{ route('request.index') }}" class="btn btn-warning btn-round">
                        بازگشت
                        <i class="icon-close"></i>
                    </a>
                </div><!-- /.form-actions -->
            </form>
        </div><!-- /.portlet-body -->
    </div><!-- /.portlet -->

</div><!-- /.col-12 -->

@endsection