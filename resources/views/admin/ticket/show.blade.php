@extends('admin.layouts.master')

@section('head-tag')
    <title>فهرست تیکت ها سایت - آلکاتراز</title>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
    <li><a href="">تیکت</a></li>
    <li><a href="">تیکت ها</a></li>
    <li><a href="">مشاهده تیکت تست</a></li>
@endsection

@section('content')
<div class="col-lg-12">
    <div class="portlet box shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">                                        
                    <i class="icon-frane"></i>
                    لیست تیکت ها
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

            


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                نمایش تیکت ها
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.ticket.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section class="card mb-3">
                <section class="card-header bg-custom-pink">amiradib - 3</section>
                <section class="card-header bg-custom-pink">
                    <h5>موضوع : تست</h5>
                    <p>تست</p>
                </section>
            </section>

            <div class="border my-2">
                <section class="card m-4">
                    <section class="card-header d-flex justify-content-between">
                        <div> adib - پاسخ دهنده :
                            amir adib</div>
                        <small>۱۱۱۱/۱۱/۱۱</small>
                    </section>
                    <section class="card-header bg-custom-pink">
                        <p>تست</p>
                    </section>

                </section>
                        </div>

            <section>
                <form action="{{ route('admin.ticket.answer', 1) }}" method="post">
                    @csrf
                    <section class="row">
                        <section class="col-12">
                            <div class="form-group">
                                <label for="">پاسخ تیکت </label>
                               ‍<textarea class="form-control form-control-sm" rows="4" name="description">{{ old('description') }}</textarea>
                            </div>
                            @error('description')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                        </section>
                        <section class="col-12">
                            <button class="btn btn-primary btn-sm">ثبت</button>
                        </section>
                    </section>
                </form>
            </section>

        </section>
    </section>
</section>


        </div><!-- /.portlet-body -->
    </div><!-- /.portlet -->
</div><!-- /.col-lg-12 -->                  
@endsection