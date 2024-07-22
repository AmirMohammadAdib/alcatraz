@extends('admin.layouts.master')

@section('head-tag')
    <title>فهرست برداشتی های سایت - آلکاتراز</title>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
    <li><a href="">احراز هویت</a></li>
    <li><a href="{{ route('admin.index') }}">برداشتی ها</a></li>
    <li><a href="">تکمیل فرآیند پرداخت</a></li>
@endsection

@section('content')

<div class="col-12">
    <div class="portlet box shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">                                        
                    <i class="icon-settings"></i>
                    فرم تایید برداشتی جدید
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
            <form role="form" method="POST" action="{{ route('withdraw.update', [$withdraw]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                

                <div class="form-body">
                    <div class="form-group">
                        <label>شماره کارت کاربر</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <input type="text" class="form-control disabled" value="{{ $withdraw->user->cart_number }}" disabled>
                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label>شماره شبا کاربر</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <input type="text" class="form-control disabled" value="{{ $withdraw->user->shabba_number }}" disabled>
                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->


                    <div class="form-group">
                        <label>شماره تماس کاربر</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <input type="text" class="form-control disabled" value="{{ $withdraw->user->phone }}" disabled>
                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->


                    <div class="form-group">
                        <label>کد رهگیری</label>
                        <div class="input-group @error('transaction_code') has-error @enderror">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="کد رهگیری" name="transaction_code" value="{{ old('transaction_code', $withdraw->transaction_code) }}" name="transaction_id">

                            @error('transaction_code')
                                <span class="alert-danger">{{ $message }}</span>
                            @enderror

                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->



                    <div class="form-group relative">
                        <input type="file" class="form-control" name="receipt">  
                        <label>فیش واریزی</label>
                        <div class="input-group round @error('receipt') has-error @enderror"> 
                            <input type="text" class="form-control file-input" placeholder="برای آپلود کلیک کنید"> 
                            <span class="input-group-btn"> 
                                <button type="button" class="btn btn-success"> 
                                    <i class="icon-picture"></i>
                                    آپلود عکس
                                <div class="paper-ripple"><div class="paper-ripple__background"></div><div class="paper-ripple__waves"></div></div></button>
                            </span> 

                            @error('receipt')
                            <span class="alert-danger">{{ $message }}</span>
                        @enderror
                        </div><!-- /.input-group -->
                        <div class="help-block"></div>
                        
                    </div>

                </div><!-- /.form-body -->

                <div class="form-actions">
                    <button type="submit" class="btn btn-success btn-round">
                        <i class="icon-check"></i>
                        ذخیره
                    </button>
                    <a href="{{ route('withdraw.index') }}" class="btn btn-warning btn-round">
                        بازگشت
                        <i class="icon-close"></i>
                    </a>
                </div><!-- /.form-actions -->
            </form>
        </div><!-- /.portlet-body -->
    </div><!-- /.portlet -->

</div><!-- /.col-12 -->

@endsection