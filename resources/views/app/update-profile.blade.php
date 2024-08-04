@extends('app.layouts.master')

@section('head-tag')
    <title>آلکاتراز</title>
    <style>

        .err{
                    font-size: .8rem;
                    padding: .2rem .5rem;
                    background-color: #b31515;
                    border-radius: 0 00 .5rem .5rem;
                }
            </style>
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
             <form action="{{ route('profile.update.update') }}" class="update-profile d-flex flex-column gap-5" method="POST">
            @csrf
            @method('PUT')
                <img src="asset/src/user/" alt="">
                <div class="input-feild">
                    <label for="" class="font-bold text-white">نام کاربری</label>
                    <input type="text" class="w-100 mt-10 font-bold" placeholder="نام کاربری خود را وارد کنید" value="{{ old('username', $user->username) }}" name='username'>
                    @error('username')
                        <span class="err">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-feild">
                    <label for="" class="font-bold text-white">شماره موبایل</label>
                    <input type="text" class="w-100 mt-10 font-bold" placeholder="شماره موبایل خود را وارد کنید" value="{{ old('phone','0' .  $user->phone) }}" name='phone'>
                    @error('phone')
                    <span class="err">{{ $message }}</span>
                @enderror
                </div>
                <div class="input-feild">
                    <label for="" class="font-bold text-white">شماره حساب</label>
                    <input type="text" class="w-100 mt-10 font-bold" placeholder="شماره حساب" value="{{ old('cart_number', $user->cart_number) }}" name='cart_number'>
                    @error('cart_number')
                    <span class="err">{{ $message }}</span>
                @enderror
                </div>

                <div class="input-feild">
                    <label for="" class="font-bold text-white">شماره شبا</label>
                    <input type="text" class="w-100 mt-10 font-bold" placeholder="شماره شبا" value="{{ old('shabba_number', $user->shabba_number) }}" name='shabba_number'>
                    @error('shabba_number')
                    <span class="err">{{ $message }}</span>
                @enderror
                </div>

                <div class="text-left p-10">
                <button class="btn btn-primary font-bold w-100-p">بروزرسانی</button>

                </div>
             </form>
            
         </div>

    </div>
</section>

@endsection