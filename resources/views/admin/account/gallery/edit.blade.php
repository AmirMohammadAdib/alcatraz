@extends('admin.layouts.master')

@section('head-tag')
    <title>فهرست عکس سایت - آلکاتراز</title>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
    <li><a href="">اکانت</a></li>
    <li><a href="{{ route('gallery.index') }}">عکس</a></li>
    <li><a href="{{ route('gallery.create') }}">ویرایش</a></li>
@endsection

@section('content')

<div class="col-12">
    <div class="portlet box shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">                                        
                    <i class="icon-settings"></i>
                    فرم ویرایش عکس جدید
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
            <form role="form" method="POST" action="{{ route('gallery.update', $gallery) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-body">

                    <div class="form-group relative">
                        <input type="file" class="form-control" name="img">  
                        <label>تصویر نمایه عکس</label>
                        <div class="input-group round @error('img') has-error @enderror"> 
                            <input type="text" class="form-control file-input" placeholder="برای آپلود کلیک کنید"> 
                            <span class="input-group-btn"> 
                                <button type="button" class="btn btn-success"> 
                                    <i class="icon-picture"></i>
                                    آپلود عکس
                                <div class="paper-ripple"><div class="paper-ripple__background"></div><div class="paper-ripple__waves"></div></div></button>
                            </span> 

                            @error('img')
                            <span class="alert-danger">{{ $message }}</span>
                        @enderror
                        </div><!-- /.input-group -->
                        <div class="help-block"></div>
                        
                    </div>

                    <img src="{{ asset('images/gallerys/' . $gallery->img) }}" width="200">
                </div><!-- /.form-body -->
<br>
                <div class="form-actions">
                    <button type="submit" class="btn btn-success btn-round">
                        <i class="icon-check"></i>
                        ذخیره
                    </button>
                    <a href="{{ route('gallery.index') }}" class="btn btn-warning btn-round">
                        بازگشت
                        <i class="icon-close"></i>
                    </a>
                </div><!-- /.form-actions -->
            </form>
        </div><!-- /.portlet-body -->
    </div><!-- /.portlet -->

</div><!-- /.col-12 -->

@endsection