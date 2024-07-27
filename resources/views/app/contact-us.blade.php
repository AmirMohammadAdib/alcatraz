@extends('app.layouts.master')


@section('content')

<div class="container mt-100">
    <div class="row gap-4 justify-content-center">
        <div class="col-11 col-md-6">
            <h1 class="font-30 font-bold p-20">ارسال پیام متنی</h1>
            <textarea class="w-100" required></textarea>
            <a href="" class="btn btn-success" type="submit">ارسال</a>
        </div>
        <aside class="col-11 col-md-7 col-lg-5 d-flex flex-column gap-4">
            <!-- دسترسی سریع به صفحات -->
             <a href="" class="aside-item d-flex justify-content-between align-items-center radius-15 glass-white-bg p-10 d-block">
                 <div class="item-text d-flex align-items-center gap-2">
                     <svg width="50" height="50">
                        <image href="asset/src/svg/services.svg"></image>
                     </svg>
                     <div>
                        <h3 class="font-15 font-bold">پشتیبانی</h3>
                        <span class="font-15 text-gray">پیشنهاد انتقاد گزارش سوال مشکل</span>
                     </div>
                 </div>
                 <svg width="25" height="16">
                    <image href="asset/src/svg/angle-left.svg"></image>
                 </svg>
             </a>
             <a href="" class="aside-item d-flex justify-content-between align-items-center radius-15 glass-white-bg p-10 d-block">
                <div class="item-text d-flex align-items-center gap-2">
                    <svg width="50" height="50">
                       <image href="asset/src/svg/question.svg"></image>
                    </svg>
                    <div>
                       <h3 class="font-15 font-bold">سوالات متداول</h3>
                       <span class="font-15 text-gray">پیشنهاد انتقاد گزارش سوال مشکل</span>
                    </div>
                </div>
                <svg width="25" height="16">
                   <image href="asset/src/svg/angle-left.svg"></image>
                </svg>
            </a>
            <a href="" class="aside-item d-flex justify-content-between align-items-center radius-15 glass-white-bg p-10 d-block">
                <div class="item-text d-flex align-items-center gap-2">
                    <svg width="50" height="50">
                       <image href="asset/src/svg/about-us.svg"></image>
                    </svg>
                    <div>
                       <h3 class="font-15 font-bold">درباره ما</h3>
                       <span class="font-15 text-gray">پیشنهاد انتقاد گزارش سوال مشکل</span>
                    </div>
                </div>
                <svg width="25" height="16">
                   <image href="asset/src/svg/angle-left.svg"></image>
                </svg>
            </a>

            <!-- بخش فضای مجازی -->
            <div class="social-media row gap-4 justify-content-center">
                <a href="" class="col-3 radius-15 glass-white-bg p-10 d-block">
                    <div class="item-text d-flex flex-column align-items-center gap-2">
                        <img src="asset/src/background/instagram.png"  alt="اینستاگرام ما را دنبال کنید">
                        <div class="text-center">
                           <h3 class="font-15 font-bold">اینستاگرام</h3>
                        </div>
                    </div>
                </a>
                <a href="" class="col-4 radius-15 glass-white-bg p-10 d-block">
                    <div class="item-text d-flex flex-column align-items-center gap-2">
                        <img src="asset/src/background/telegram.png"  alt="تلگرام ما را دنبال کنید">
                        <div class="text-center">
                           <h3 class="font-15 font-bold">تلگرام</h3>
                        </div>
                    </div>
                </a>
                <a href="" class="col-3 radius-15 glass-white-bg p-10 d-block">
                    <div class="item-text d-flex flex-column align-items-center gap-2">
                        <img src="asset/src/background/discord.png"  alt="دیسکورد ما را دنبال کنید">
                        <div class="text-center">
                           <h3 class="font-15 font-bold">دیسکورد</h3>
                        </div>
                    </div>
                </a>
            </div>

         </aside>
    </div>
</div>
@endsection