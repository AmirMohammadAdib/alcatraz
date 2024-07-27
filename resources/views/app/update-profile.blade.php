@extends('app.layouts.master')

@section('head-tag')
    <title>آلکاتراز</title>
@endsection

@section('content')



<section class="container mt-50">
    <div class="row gap-5 d-flex justify-content-center align-items-start">
         <div class="glass-white-bg  radius-15 col-md-6 col-11">
            <div class="d-flex align-items-center">
                <!-- عکس پروفایل -->
                <svg width="121" height="121">
                    <image href="asset/src/svg/user-1.svg"></image>
                </svg>
                <div>
                    <h1 class="font-30 font-bold">ویرایش پروفایل</h1>
                    <span class="font-15">میتوانید اطلاعات خود را مشاهده و بروزرسانی کنید</span>
                </div>
            </div>
             <form action="" class="update-profile d-flex flex-column gap-5">
                <img src="asset/src/user/" alt="">
                <div class="input-feild">
                    <label for="" class="font-bold text-white">نام کاربری</label>
                    <input type="text" class="w-100 mt-10 font-bold" placeholder="نام کاربری خود را وارد کنید">
                </div>
                <div class="input-feild">
                    <label for="" class="font-bold text-white">شماره موبایل</label>
                    <input type="text" class="w-100 mt-10 font-bold" placeholder="شماره موبایل خود را وارد کنید">
                </div>
                <div class="input-feild">
                    <label for="" class="font-bold text-white">نام کاربری</label>
                    <input type="text" class="w-100 mt-10 font-bold" placeholder="شماره حساب">
                </div>

                <div class="text-left p-10">
                <button class="btn btn-primary font-bold w-100-p">بروزرسانی</button>

                </div>
             </form>
            
         </div>

    </div>
</section>

@endsection