@extends('app.layouts.master')


@section('head-tag')
    
@endsection


@section('content')
    <section class="container mt-50">
        <div class="row justify-content-center">
            <form action="{{ route('login.pass.store') }}" class="login-form col-11 col-md-5" method="POST">
                @csrf 
                <div class="text-center">
                    <h1 class="font-30 font-bold">ورود با رمز عبور</h1>
                    <h2 class="font-20 text-gray">شماره موبایل خود را وارد کنید</h2>
                </div>
                <div class="input_field mt-50 d-flex align-items-center gap-3">
                    <input type="number" class="w-100 text-left font-bold " name="phone" placeholder="Enter Number" value="{{ old('phone') }}">
                    09+
                    <img src="{{ asset('asset/src/background/iran-flag.jpg') }}" class="w-50-p radius-100" style="height: 50px;" alt="">
                </div>
                <br>
                <div class="input_field d-flex align-items-center gap-3">
                    <input type="text" class="w-100 text-left font-bold " name="password" placeholder="Enter Password">
                </div>

                <div class="mt-20 d-flex justify-content-between">
                    <a href="{{ route('login.otp.view') }}" class="text-white">ورود با کد یکبار مصرف</a>
                </div>

                <div class="mt-100 text-center d-flex align-items-center flex-column">
                    <span class="text-center"><a href="" class="text-gray">قوانین</a> و مقرارت آلکاتراز را میپذیرم</span>
                    <button type="submit" class="btn btn-primary w-100 mt-20 font-bold">تایید و ادامه</button>
                </div>
            </form>
        </div>
    </section>

    @error('phone')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Swal.fire({
            title: "پیام موفقیت آمیز!",
            text: "{{ $message }}",
            icon: "error"
        }); 
    </script>
    @enderror

    @error('password')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Swal.fire({
            title: "پیام موفقیت آمیز!",
            text: "{{ $message }}",
            icon: "error"
        }); 
    </script>
    @enderror
@endsection