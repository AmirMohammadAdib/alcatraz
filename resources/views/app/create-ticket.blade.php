@extends('app.layouts.master')

@section('head-tag')
<style>
    .inputForm{
        font-family: "payda-Regular" !important;
        width: 100%;
        background-color: transparent;
border: 1px solid #7f878e;
color: #7f878e !important

    }
    button{
        font-family: "payda-Regular" !important;
        margin-bottom: 1rem;

    }

    label{
        color: #7f878e !important;
        margin-top: 2rem
    }

    select{
        width: 100%;
padding: .5rem;
font-family: "payda-Regular" !important;
background-color: transparent;
color: #7f878e;

    }

    .err{
        font-size: .8rem;
        padding: .2rem .5rem;
        background-color: #b31515;
        border-radius: 0 00 .5rem .5rem;
    }
    button[type="submit"]{
        padding: 10px;
        width: 100% !important;
    }

</style>
@endsection

@section('content')

<section class="container mt-50">

    <form action="{{ route('ticket.store') }}" method="POST" class="" enctype="multipart/form-data">
        @csrf
        <h1 class="font-30 font-bold ">ثبت تیکت جدید</h1>
        <br>

        <div class="form-group">
            <label for="">موضوع</label>
            <input type="text" name="subject" placeholder="لطفا موضوع خود را وارد کنید" class="inputForm" value="{{ old('subject') }}">
            @error('subject')
                <span class="err">{{ $message }}</span><br>
            @enderror
        </div><br>


        <div class="form-group">
            <label for="">اهمیت</label>
            <select name="periority" id="" class="form-control">
                <option value="0"  {{ old('periority') == '0' ? 'selected' : '' }}>کم اهمیت</option>
                <option value="1"  {{ old('periority') == '1' ? 'selected' : '' }}>متوسط</option>
                <option value="2"  {{ old('periority') == '2' ? 'selected' : '' }}>فوری</option>
            </select>
            @error('periority')
                <span class="err">{{ $message }}</span><br>
            @enderror
        </div><br>
        
        <div class="form-group">
            <label for="">توضیحات تکمیلی</label>

            <textarea class="w-100" name="description">{{ old('description') }}</textarea>
            @error('description')
                <span class="err">{{ $message }}</span><br>
            @enderror
        </div><br>

        <div class="form-group">
            <label for="">فایل ضمیمه (اختیاری)</label>
            <input type="file" name="file" class="inputForm">
            @error('file')
                <span class="err">{{ $message }}</span><br>
            @enderror
        </div><br>

        <button type="submit" class="btn btn-success" type="submit">ارسال</button>
    </form>

  </section>

@endsection