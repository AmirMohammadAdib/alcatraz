<aside class="col-11 col-md-11 col-lg-5 d-flex flex-column gap-4">
    <!-- دسترسی سریع به صفحات -->
     <a href="{{ route('tickets.view') }}" class="aside-item d-flex justify-content-between align-items-center radius-15 glass-white-bg p-10 d-block">
         <div class="item-text d-flex align-items-center gap-2">
             <svg width="50" height="50">
                <image href="{{ asset('asset/src/svg/services.svg') }}"></image>
             </svg>
             <div>
                <h3 class="font-15 font-bold">تیکت</h3>
                <span class="font-15 text-gray">پیشنهاد انتقاد گزارش سوال مشکل</span>
             </div>
         </div>
         <svg width="25" height="16">
            <image href="{{ asset('asset/src/svg/angle-left.svg') }}"></image>
         </svg>
     </a>
     <a href="{{ route('app.question') }}" class="aside-item d-flex justify-content-between align-items-center radius-15 glass-white-bg p-10 d-block">
        <div class="item-text d-flex align-items-center gap-2">
            <svg width="50" height="50">
               <image href="{{ asset('asset/src/svg/question.svg') }}"></image>
            </svg>
            <div>
               <h3 class="font-15 font-bold">سوالات متداول</h3>
               <span class="font-15 text-gray">سوالات از پیش آماده شده</span>
            </div>
        </div>
        <svg width="25" height="16">
           <image href="{{ asset('asset/src/svg/angle-left.svg') }}"></image>
        </svg>
    </a>
    <a href="{{ route('app.stars') }}" class="aside-item d-flex justify-content-between align-items-center radius-15 glass-white-bg p-10 d-block">
        <div class="item-text d-flex align-items-center gap-2">
            <svg width="50" height="50">
               <image href="{{ asset('asset/src/svg/about-us.svg') }}"></image>
            </svg>
            <div>
               <h3 class="font-15 font-bold">بازیکنان برتر</h3>
               <span class="font-15 text-gray">بازیکنان برتر سایت</span>
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