@extends('admin.layouts.master')

@section('head-tag')
    <title>فهرست اکانت سایت - آلکاتراز</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
    <li><a href="">اکانت</a></li>
    <li><a href="{{ route('account.index') }}">اکانت</a></li>
    <li><a href="{{ route('account.create') }}">ویرایش</a></li>
@endsection

@section('content')

<div class="col-12">
    <div class="portlet box shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">                                        
                    <i class="icon-settings"></i>
                    فرم ویرایش اکانت
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
            <form role="form" method="POST" action="{{ route('account.update', [$account]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-body">
                    <div class="form-group">
                        <label>عنوان اکانت</label>
                        <div class="input-group @error('title') has-error @enderror">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <input type="text" class="form-control" placeholder="عنوان اکانت" value="{{ old('title', $account->title) }}" name="title">

                            @error('title')
                                <span class="alert-danger">{{ $message }}</span>
                            @enderror

                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->

                    <div class="form-group relative">
                        <input type="file" class="form-control" name="img">  
                        <label>تصویر نمایه اکانت</label>
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

                        <br>
                        <img src="{{ asset('images/account/' . $account->img) }}" width="200">
                        
                    </div>


                    <div class="form-group">
                        <label>قیمت اکانت</label>
                        <div class="input-group @error('price') has-error @enderror">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <input type="number" class="form-control" placeholder="قیمت اکانت" value="{{ old('price', $account->price) }}" name="price">

                            @error('price')
                                <span class="alert-danger">{{ $message }}</span>
                            @enderror

                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->


                    <div class="form-group">
                        <label>uid اکانت</label>
                        <div class="input-group @error('uid') has-error @enderror">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <input type="number" class="form-control" placeholder="uid اکانت" value="{{ old('uid', $account->uid) }}" name="uid">

                            @error('uid')
                                <span class="alert-danger">{{ $message }}</span>
                            @enderror

                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label>توضیحات تکمیلی اکانت</label>
                        <div class="input-group @error('description') has-error @enderror">
                            <span class="input-group-addon">
                                <i class="icon-user"></i>
                            </span>
                            <textarea class="form-control" placeholder="" name="description">{{ old('description', $account->description) }}</textarea>

                            @error('description')
                                <span class="alert-danger">{{ $message }}</span>
                            @enderror

                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->
                    
                    <div class="form-group">
                        <label>انتخاب گان برای این اکانت</label>
                        <div class="input-group @error('guns') has-error @enderror">
                            
                            <select name="guns[]" id="guns" class="form-control guns" multiple="multiple">
                                @foreach ($guns as $gun)
                                    <option  @if(in_array($gun->id, $selectedGun)) selected @endif value="{{ $gun->id }}">{{ $gun->name }}</option>
                                @endforeach
                            </select>

                            @error('guns')
                                <span class="alert-danger">{{ $message }}</span>
                            @enderror

                        </div><!-- /.input-group -->
                    </div><!-- /.form-group -->
                    

                    <div class="form-group">
                        <label>انتخاب کاراکتر برای این اکانت</label>
                        <div class="input-group @error('characters') has-error @enderror">

                            <select name="characters[]" id="characters" class="form-control characters" multiple="multiple">
                                @foreach ($characters as $character)
                                    <option @if(in_array($character->id, $selectedCharacter)) selected @endif value="{{ $character->id }}">{{ $character->name }}</option>
                                @endforeach
                            </select>

                            @error('characters')
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
                    <a href="{{ route('account.index') }}" class="btn btn-warning btn-round">
                        بازگشت
                        <i class="icon-close"></i>
                    </a>
                </div><!-- /.form-actions -->
            </form>
        </div><!-- /.portlet-body -->
    </div><!-- /.portlet -->

</div><!-- /.col-12 -->



<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>


<script>
    var select_roles = $('#guns');
    select_roles.select2({
        placeholder: 'لطفا نقش ها را وارد نمایید',
        multiple: true,
        tags : true
    })

    var select_role2 = $('#characters');
    select_role2.select2({
        placeholder: 'لطفا نقش ها را وارد نمایید',
        multiple: true,
        tags : true
    })
</script>
@endsection