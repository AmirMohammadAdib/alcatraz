@extends('admin.layouts.master')

@section('head-tag')
    <title>فهرست بازیکنان سایت - آلکاتراز</title>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
    <li><a href="">احراز هویت</a></li>
    <li><a href="{{ route('player.index') }}">بازیکنان</a></li>
    <li><a href="{{ route('player.create') }}">ایجاد</a></li>
@endsection

@section('content')

<div class="col-12">
    <div class="portlet box shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">                                        
                    <i class="icon-settings"></i>
                    فرم ایجاد بازیکن جدید
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
            <form role="form" method="POST" action="{{ route('player.store') }}">
                @csrf

                <div class="form-body">
                    <div class="form-group">
                        <label>نام کاربری</label>
                        <div class="input-group @error('username') has-error @enderror">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="نام کاربری" value="{{ old('username') }}" name="username">

                            @error('username')
                                <span class="alert-danger">{{ $message }}</span>
                            @enderror

                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->


                    <div class="form-group">
                        <label>شماره تماس</label>
                        <div class="input-group @error('phone') has-error @enderror">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="شماره تماس" value="{{ old('phone') }}" name="phone">

                            @error('phone')
                                <span class="alert-danger">{{ $message }}</span>
                            @enderror

                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->


                    <div class="form-group">
                        <label>سطح</label>
                        <div class="input-group @error('level') has-error @enderror">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <select name="level" class="form-select">
                                <option value="0" {{ old('level') == '0' ? 'selected' : '' }}>نوب</option>
                                <option value="1" {{ old('level') == '1' ? 'selected' : '' }}>پلیر</option>
                                <option value="2" {{ old('level') == '2' ? 'selected' : '' }}>پرو پلیر</option>
                                <option value="3" {{ old('level') == '3' ? 'selected' : '' }}>اولترا پلیر</option>
                            </select>

                            @error('level')
                                <span class="alert-danger">{{ $message }}</span>
                            @enderror

                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->


                    <div class="form-group">
                        <label>وضعیت</label>
                        <div class="input-group @error('status') has-error @enderror">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <select name="status" class="form-select">
                                <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>غیر فعال</option>
                                <option value="1" {{ old('status') == '1' ? 'selected' : '' }} selected>فعال</option>
                            </select>

                            @error('status')
                                <span class="alert-danger">{{ $message }}</span>
                            @enderror

                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->


                    <div class="form-group">
                        <label>شماره کارت</label>
                        <div class="input-group @error('cart_number') has-error @enderror">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="شماره کارت" value="{{ old('cart_number') }}" name="cart_number">

                            @error('cart_number')
                                <span class="alert-danger">{{ $message }}</span>
                            @enderror

                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label>شماره شبا</label>
                        <div class="input-group @error('shabba_number') has-error @enderror">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="شماره شبا" value="{{ old('shabba_number') }}" name="shabba_number">

                            @error('shabba_number')
                                <span class="alert-danger">{{ $message }}</span>
                            @enderror

                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->

                    
                </div><!-- /.form-body -->

                <div class="form-actions">
                    <button type="submit" class="btn btn-success btn-round">
                        <i class="icon-check"></i>
                        ذخیره
                    </button>
                    <a href="{{ route('player.index') }}" class="btn btn-warning btn-round">
                        بازگشت
                        <i class="icon-close"></i>
                    </a>
                </div><!-- /.form-actions -->
            </form>
        </div><!-- /.portlet-body -->
    </div><!-- /.portlet -->

</div><!-- /.col-12 -->

@endsection