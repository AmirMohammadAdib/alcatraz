@extends('admin.layouts.master')

@section('head-tag')
    <title>فهرست روم های سایت - آلکاتراز</title>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
    <li><a href="">مسابقات</a></li>
    <li><a href="{{ route('room.index') }}">روم ها</a></li>
    <li><a href="{{ route('room.create') }}">ویرایش</a></li>
@endsection

@section('content')

<div class="col-12">
    <div class="portlet box shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">                                        
                    <i class="icon-settings"></i>
                    فرم ویرایش روم
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
            <form role="form" method="POST" action="{{ route('room.update', $room) }}">
                @csrf
                @method('PUT')

                <div class="form-body">
                    <div class="form-group">
                        <label>لینک روم</label>
                        <div class="input-group @error('link') has-error @enderror">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="لینک روم" value="{{ old('link', $room->link) }}" name="link">

                            @error('link')
                                <span class="alert-danger">{{ $message }}</span>
                            @enderror

                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->


                    <div class="form-group">
                        <label>فی (در صورت رایگان بودن خالی بگذارید)</label>
                        <div class="input-group @error('fee') has-error @enderror">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <input type="number" class="form-control" placeholder="فی" value="{{ old('fee', $room->fee) }}" name="fee">

                            @error('fee')
                                <span class="alert-danger">{{ $message }}</span>
                            @enderror

                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->



                    <div class="form-group">
                        <label>جایزه</label>
                        <div class="input-group @error('award') has-error @enderror">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <input type="number" class="form-control" placeholder="جایزه" value="{{ old('award', $room->award) }}" name="award">

                            @error('award')
                                <span class="alert-danger">{{ $message }}</span>
                            @enderror

                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label>نوع جایزه</label>
                        <div class="input-group @error('award_type') has-error @enderror">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <select name="award_type" class="form-select">
                                <option value="0" value="{{ old('award_type', $room->award_type) == 0 ? 'selected' : '' }}">نفر اول</option>
                                <option value="1" value="{{ old('award_type', $room->award_type) == 1 ? 'selected' : '' }}">دو نفر اول</option>
                                <option value="2" value="{{ old('award_type', $room->award_type) == 2 ? 'selected' : '' }}">سه نفر اول</option>
                                <option value="3" value="{{ old('award_type', $room->award_type) == 3 ? 'selected' : '' }}">بیشترین کیل</option>
                            </select>

                            @error('award_type')
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
                                <option value="0" {{ old('status', $room->status) == 0 ? 'selected' : '' }}>در انتظار شروع</option>
                                <option value="1" {{ old('status', $room->status) == 1 ? 'selected' : '' }}>درحال اجرا</option>
                                <option value="1" {{ old('status', $room->status) == 2 ? 'selected' : '' }}>پایان یافته</option>
                            </select>

                            @error('status')
                                <span class="alert-danger">{{ $message }}</span>
                            @enderror

                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->


                    <div class="form-group">
                        <label>ظرفیت</label>
                        <div class="input-group @error('capacity') has-error @enderror">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <input type="number" class="form-control" placeholder="ظرفیت" value="{{ old('capacity', $room->capacity) }}" name="capacity">

                            @error('capacity')
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
                    <a href="{{ route('room.index') }}" class="btn btn-warning btn-round">
                        بازگشت
                        <i class="icon-close"></i>
                    </a>
                </div><!-- /.form-actions -->
            </form>
        </div><!-- /.portlet-body -->
    </div><!-- /.portlet -->

</div><!-- /.col-12 -->

@endsection     