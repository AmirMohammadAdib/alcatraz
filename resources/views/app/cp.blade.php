@extends('app.layouts.master')


@section('content')

<section class="container mt-50">
    <div class="row justify-content-center gap-5">
        <div class="single-product col-10 col-md-11 col-lg-6 ">
            <div class="product-box glass-white-bg position-relative border radius-15">
                <div class="box-img position-absolute">
                    <img src="{{ asset('asset/src/test/آفر-دوبل-سی-پی-mobile.jpg 1.png') }}" class="w-100 radius-10 border" alt="">
                </div>
            </div>
            <div class="product-content mt-100 text-justify">
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی</p>
                <p>
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی
                </p>
            </div>
            <div class="product-price">
                <ul class="d-flex justify-content-between p-20">
                    <h3>قیمت</h3>
                    <h4>۹۰,۰۰۰ تومان</h4>
                </ul>
                <a class="btn btn-success w-100"  href="">خرید</a>
            </div>
        </div>
        <aside class="col-11 col-md-11 col-lg-5 d-flex flex-column gap-4">
            <!-- دسترسی سریع به صفحات -->
             <a href="" class="aside-item d-flex justify-content-between align-items-center radius-15 glass-white-bg p-10 d-block">
                 <div class="item-text d-flex align-items-center gap-2">
                     <svg width="50" height="50">
                        <image href="{{ asset('asset/src/svg/services.svg') }}"></image>
                     </svg>
                     <div>
                        <h3 class="font-15 font-bold">پشتیبانی</h3>
                        <span class="font-15 text-gray">پیشنهاد انتقاد گزارش سوال مشکل</span>
                     </div>
                 </div>
                 <svg width="25" height="16">
                    <image href="{{ asset('asset/src/svg/angle-left.svg') }}"></image>
                 </svg>
             </a>
             <a href="" class="aside-item d-flex justify-content-between align-items-center radius-15 glass-white-bg p-10 d-block">
                <div class="item-text d-flex align-items-center gap-2">
                    <svg width="50" height="50">
                       <image href="{{ asset('asset/src/svg/question.svg') }}"></image>
                    </svg>
                    <div>
                       <h3 class="font-15 font-bold">سوالات متداول</h3>
                       <span class="font-15 text-gray">پیشنهاد انتقاد گزارش سوال مشکل</span>
                    </div>
                </div>
                <svg width="25" height="16">
                   <image href="{{ asset('asset/src/svg/angle-left.svg') }}"></image>
                </svg>
            </a>
            <a href="" class="aside-item d-flex justify-content-between align-items-center radius-15 glass-white-bg p-10 d-block">
                <div class="item-text d-flex align-items-center gap-2">
                    <svg width="50" height="50">
                       <image href="{{ asset('asset/src/svg/about-us.svg') }}"></image>
                    </svg>
                    <div>
                       <h3 class="font-15 font-bold">درباره ما</h3>
                       <span class="font-15 text-gray">پیشنهاد انتقاد گزارش سوال مشکل</span>
                    </div>
                </div>
                <svg width="25" height="16">
                   <image href="{{ asset('asset/src/svg/angle-left.svg') }}"></image>
                </svg>
            </a>

            <!-- بخش فضای مجازی -->
            <div class="social-media row gap-4 justify-content-center">
                <a href="" class="col-3 radius-15 glass-white-bg p-10 d-block">
                    <div class="item-text d-flex flex-column align-items-center gap-2">
                        <img src="{{ asset('asset/src/background/instagram.png') }}"  alt="اینستاگرام ما را دنبال کنید">
                        <div class="text-center">
                           <h3 class="font-15 font-bold">اینستاگرام</h3>
                        </div>
                    </div>
                </a>
                <a href="" class="col-4 radius-15 glass-white-bg p-10 d-block">
                    <div class="item-text d-flex flex-column align-items-center gap-2">
                        <img src="{{ asset('asset/src/background/telegram.png') }}"  alt="تلگرام ما را دنبال کنید">
                        <div class="text-center">
                           <h3 class="font-15 font-bold">تلگرام</h3>
                        </div>
                    </div>
                </a>
                <a href="" class="col-3 radius-15 glass-white-bg p-10 d-block">
                    <div class="item-text d-flex flex-column align-items-center gap-2">
                        <img src="{{ asset('asset/src/background/discord.png') }}"  alt="دیسکورد ما را دنبال کنید">
                        <div class="text-center">
                           <h3 class="font-15 font-bold">دیسکورد</h3>
                        </div>
                    </div>
                </a>
            </div>

         </aside>
    </div>
</section>
@endsection





