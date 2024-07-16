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
                    فرم  Horizontal
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
            <form role="form">
                <div class="form-body">
                    <div class="form-group">
                        <label>نام</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="نام">
                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label>رمز عبور</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="icon-key"></i>
                            </span>
                            <input type="password" class="form-control">
                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label>رایانامه(ایمیل) به صورت چپ چین</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="icon-envelope"></i>
                            </span>
                            <input type="email" class="form-control ltr text-left">
                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label>گیرنده</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="icon-options"></i>
                            </span>
                            <select class="form-select">
                                <option value="0">بخش فنی</option>
                                <option value="1">بخش مالی</option>
                                <option value="2">بخش اداری</option>
                                <option value="3">بخش فروش</option>
                                <option value="4">اپراتور</option>
                            </select>
                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label>نشانی</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="icon-location-pin"></i>
                            </span>
                            <textarea class="form-control" rows="5" placeholder="نشانی"></textarea>
                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label>غیر فعال disable</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="icon-ban"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="غیر فعال" disabled> 
                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->


                    <div class="form-group">
                        <label>با کادر منحنی و کلاس curve </label>
                        <div class="input-group curve">
                            <span class="input-group-addon">
                                <i class="icon-screen-desktop"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="با کادر منحنی">
                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label>با کادر گرد  و کلاس round</label>
                        <div class="input-group round">
                            <span class="input-group-addon">
                                <i class="icon-speedometer"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="با کادر گرد">
                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->
                    <div class="form-group round">
                        <label>بدون آیکن با کادر گرد</label>
                        <input type="text" class="form-control" placeholder="با کادر گرد">
                    </div><!-- /.form-group -->
                    <div class="form-group curve">
                        <label>بدون آیکن با کادر منحنی</label>
                        <input type="text" class="form-control" placeholder="با کادر منحنی">
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label>با آیکن Font Awesome</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="far fa-user"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="نام خانوادگی">
                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label>با آیکن قرمز</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="far fa-user text-danger"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="نام خانوادگی">
                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label>با آیکن سبز</label>
                        <div class="input-group">
                            <span class="input-group-addon">
                                <i class="far fa-user text-success"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="نام خانوادگی">
                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->
                    <div class="form-group">
                        <label>کاملا چپ چین</label>
                        <div class="input-group">
                            <input type="text" class="form-control ltr text-left" placeholder="چپ چین">
                            <span class="input-group-addon ltr">
                                <i class="icon-list"></i>
                            </span>
                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->
                    <div class="form-group relative">
                        <input type="file" class="form-control"> 
                        <label>آپلود فایل</label>
                        <div class="input-group round"> 
                            <input type="text" class="form-control file-input" placeholder="برای آپلود کلیک کنید"> 
                            <span class="input-group-btn"> 
                                <button type="button" class="btn btn-success"> 
                                    <i class="icon-picture"></i>
                                    آپلود عکس
                                </button>
                            </span> 
                        </div><!-- /.input-group -->
                        <div class="help-block"></div>
                    </div><!-- /.form-group -->
                </div><!-- /.form-body -->

                <div class="form-actions">
                    <button type="submit" class="btn btn-success btn-round">
                        <i class="icon-check"></i>
                        ذخیره
                    </button>
                    <button type="button" class="btn btn-warning btn-round">
                        بازگشت
                        <i class="icon-close"></i>
                    </button>
                </div><!-- /.form-actions -->
            </form>
        </div><!-- /.portlet-body -->
    </div><!-- /.portlet -->

</div><!-- /.col-12 -->

@endsection