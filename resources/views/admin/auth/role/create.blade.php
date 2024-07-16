@extends('admin.layouts.master')

@section('head-tag')
    <title>فهرست نقش های سایت - آلکاتراز</title>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
    <li><a href="">احراز هویت</a></li>
    <li><a href="{{ route('role.index') }}">نقش ها</a></li>
    <li><a href="{{ route('role.create') }}">ایجاد</a></li>
@endsection

@section('content')

<div class="col-12">
    <div class="portlet box shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">                                        
                    <i class="icon-settings"></i>
                    فرم ایجاد نقش جدید
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
            <form role="form" method="POST" accept="{{ route('role.store') }}">
                @csrf

                <div class="form-body">
                    <div class="form-group">
                        <label>عنوان نقش</label>
                        <div class="input-group @error('name') has-error @enderror">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="عنوان نقش" value="{{ old('name') }}" name="name">

                            @error('name')
                                <span class="alert-danger">{{ $message }}</span>
                            @enderror

                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->


                    <div class="form-group">
                        <label>مجوز ها</label>
                        <div class="input-group">
                            
                            <div class="col-12 d-flex">
                                <div class="col-3">
                                    <input type="checkbox" name="" id="1">
                                    <label for="1">نمایش</label>
                                </div>
                                <div class="col-3">
                                    <input type="checkbox" name="" id="2">
                                    <label for="2">ساخت</label>
                                </div>
                                <div class="col-3">
                                    <input type="checkbox" name="" id="3">
                                    <label for="3">ویرایش</label>
                                </div>
                                <div class="col-3">
                                    <input type="checkbox" name="" id="4">
                                    <label for="4">حذف</label>
                                </div>
                            </div>

                            @error('name')
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
                    <a href="{{ route('role.index') }}" class="btn btn-warning btn-round">
                        بازگشت
                        <i class="icon-close"></i>
                    </a>
                </div><!-- /.form-actions -->
            </form>
        </div><!-- /.portlet-body -->
    </div><!-- /.portlet -->

</div><!-- /.col-12 -->

@endsection