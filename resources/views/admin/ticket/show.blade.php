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
                <section class="card-header bg-custom-pink">{{ $ticket->user->username }} - {{ $ticket->user->id }}</section>
                <section class="card-header bg-custom-pink">
                    <h5>موضوع : {{ $ticket->subject }}</h5>
                    <p>{{ $ticket->description }}</p>
                </section>
            </section>

            <div class="border my-2">
                @foreach ($ticket->children as $child)
                    <section class="card m-4">
                        <section class="card-header d-flex justify-content-between">
                            <div> {{ $child->user->username }} - پاسخ دهنده :
                                {{ $child->admin ? $child->admin->username : 'نامشخص' }}</div>
                            <small>>{{ verta($child->created_at)->format('H:i:s Y/m/d') }}<</small>
                        </section>
                        <section class="card-header bg-custom-pink">
                            <p>{{ $child->description }}</p>
                        </section>

                    </section>
                @endforeach
            </div>

            <section>
                @if ($ticket->status == 0)
                <form action="{{ route('admin.ticket.answer', $ticket) }}" method="post">
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
                @endif
            </section>

        </section>
    </section>
</section>


        </div><!-- /.portlet-body -->
    </div><!-- /.portlet -->
</div><!-- /.col-lg-12 -->                  
@endsection