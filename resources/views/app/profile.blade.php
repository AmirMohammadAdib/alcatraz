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
    <div class="user-profile row gap-5 d-flex justify-content-center align-items-start">
        <div class="col-md-6 col-11">
            <div class="profile-content glass-white-bg radius-15 ">

                <div class="content-head d-flex justify-content-between">

                   <!-- سه نقطه -->
                   <div class="tip p-10">

                       <div class="dropdown">
                           <svg width="16" height="4" class="dots">
                               <image href="asset/src/svg/tip.svg"></image>
                           </svg>
                           <input type="checkbox" id="dropdown-toggle" class="dropdown-toggle">
                           <ul class="dropdown-menu">
                             <li>ویرایش پروفایل</li>
                             <li>خروج</li>
                           </ul>
                         </div>
                         
                         
                   </div>

                   <div class="head-prof d-flex align-items-center">

                       <!-- اطلاعات کاربر -->
                       <div class="prof-info d-flex align-items-center flex-column ">
                           <h3>{{ auth()->user()->username }}</h3>
                           <div class="info-nickname d-flex align-items-center gap-2">
                               <svg width="21" height="21">
                                   <image href="asset/src/svg/shield.svg"></image>
                               </svg>
                               @if(auth()->user()->level == 0)
                                   <h4>تازه کار</h4>
                               @elseif(auth()->user()->level == 1)
                                    <h4>نوب</h4>
                               @elseif(auth()->user()->level == 2)
                                   <h4>پلیر</h4>
                                @elseif(auth()->user()->level == 3)
                                   <h4>پرو پلیر</h4>
                               @elseif(auth()->user()->level == 4)
                                   <h4>اولترا پلیر</h4>
                               @endif
                           </div>
                       </div>

                       <!-- عکس پروفایل -->
                       <svg width="121" height="121">
                           <image href="asset/src/svg/user-1.svg"></image>
                       </svg>

                   </div>
                </div>

                <!-- نمودار پیشرفت -->
                <div class="content-body position-relative mt-20">
                   <div class="progress p-10">
                       <div class="progress-box radius-100 position-relative">
                        @if ($totalGames == 0)
                            <div data-width="0" class="box radius-100 position-absolute left-0" >
                        @else
                            <div data-width="{{ intval($winGames) / intval($totalGames) * 100 }}" class="box radius-100 position-absolute left-0" >
                        @endif

                           </div>
                           <div class="box-count radius-100 text-center position-relative">
                               <span>{{ $totalGames }}</span>
                           </div>
                       </div>
                       <div class="d-flex justify-content-between mt-20">
                           <ul class="d-flex gap-2">
                              <span>رنک بندی : </span>
                              <p>پلیر</p>
                           </ul>
                           <ul class="d-flex gap-2">
                             <p>{{ $winGames }}/{{ $totalGames }}</p>
                             <span>برد </span>
                           </ul>
                       </div>
                   </div>

                   <div class="progress-2 d-flex justify-content-center gap-4">
                       <div class="a col-5 col-md-5">
                           <img src="asset/src/background/rec-red.png" alt="">
                           <h3>برد من</h3>
                           <span>{{ $winGames }}</span>
                       </div>
                       <div class="b col-5 col-md-5">
                           <img src="asset/src/background/rec-yellow.png" alt="">
                           <h3>باخت من</h3>
                           <span>{{ $loseGames }}</span>
                       </div>

                       
                   </div>

                </div>

                <br><br>
            </div><br><br><br>


            <div class="mt-100 glass-white-bg p-10 radius-15">
                <h3 class="font-bold text-center mt-20">لیست اکانت های من</h3>
                <div class="row gap-3 mt-20 p-20">
                   @foreach ($myAccounts as $account)
                         <div class="col-lg-12  radius-15 border p-10">
                             <h4 class="font-bold text-light-1">{{ substr($account->description, 0, 20) }}</h4>
                                 
                             <ul class="d-flex gap-3" style="flex-direction: column;">
                                 <form action="{{ route('set-email-pass', $account) }}" method="POST">
                                     @csrf
                                 @if($account->status <= 2)
                                     <span class="font-bold ">قیمت : در انتظار برسی</span>
                                 @else
                                     <span class="font-bold ">قیمت : {{ number_format($account->site_price) }} تومان</span>
                                 @endif
                                 <br>
                                 <span class="font-bold ">وضعیت : 
                                     @if($account->status == 0)
                                         برسی نشده
                                     @elseif($account->status == 1)
                                         در انتظار تایید شما
                                     @elseif($account->status == 2)
                                     در انتظار تایید ادمین
                                     @elseif($account->status == 3)
                                         درانتظار پرداخت
                                     @elseif($account->status == 4)
                                         پایان یافته
                                     @endif
                                 </span>            
 
                                 @if ($account->status == 4)
                                     <br>
                                     <span class="font-bold ">کد رهگیری‌: {{ $account->transaction_id }}</span>
                                     
                                 @endif
 
                                 @if($account->status == 1)
                                     <div class="form-group" style="margin-top: 1rem">
                                         <label style="color: #a4a6b6">ایمیل اکانت بازی</label>
                                         <input type="text" placeholder="لطفا ایمیل خود را وارد کنید" name="email" class="form-control" style="width: 100%;font-family: 'payda-Regular';
                                         color: #808291;">
                                         @error('email')
                                             <span class="err">{{ $message }}</span>
                                         @enderror
                                     </div><br>
                                     
                                     <div class="form-group">
                                         <label style="color: #a4a6b6">رمز عبور اکانت بازی</label>
                                         <input type="text" placeholder="لطفا رمز عبور خود را وارد کنید" class="form-control" style="width: 100%;font-family: 'payda-Regular';
                                         color: #6d6f7e;" name="password">
                                         @error('password')
                                             <span class="err">{{ $message }}</span>
                                         @enderror
                                     </div>
                                     <br>
                                     <input type="submit" value="تایید" class="btn btn-warning" style="font-family: payda-Regular">
                                 @endif 
                                 </form>
                             </ul>
                         </div>
                   @endforeach
                  
 
                </div>
 
             </div>


             <div class="mt-50 glass-white-bg p-10 radius-15">
                <h3 class="font-bold text-center mt-20">معاملات انجام شده</h3>
                <div class="row gap-3 mt-20 p-20">
                   @foreach ($cpOrders as $key => $order)
                         <div class="col-lg-12  radius-15 border p-10">
                            <div class="cover" style="    display: flex;
                            align-items: center;
                            margin-bottom: 1rem;
                            align-items: center">
                                <img src="{{ asset('images/cp/img/' . $order->cp->img) }}" alt="" style="width: 20%;border-radius: .5rem;
                                margin-left: 1rem; ">
                             <h4 class="font-bold text-light-1 " style="margin: 0">{{ $order->cp->title }}</h4>
                            </div>
                                 
                             <ul class="d-flex gap-3" style="flex-direction: column;">
                                @if ($order->status == 0)                                         
                                    <span class="font-bold ">قیمت : {{ number_format($order->cp->price) }} تومان</span>
                                @else
                                    <span class="font-bold ">قیمت : {{ number_format($order->cp->super_price) }} تومان</span>
                                @endif
                                <span class="font-bold ">نوع : {{ $order->type == 0 ? 'فوری'  : 'سوپر فوری' }}</span>

                                <span class="font-bold ">وضعیت : 
                                     @if($order->status == 0)
                                         پرداخت نشده
                                     @elseif($order->status == 1)
                                        @if($order->email == null)
                                            در انتظار تکمیل اطلاعات
                                        @else
                                            @if ($order->type == 0)
                                                در انتظار واریز                                            
                                            @else
                                                در انتظار واریز (<span id="timer-{{ $key }}"></span>)
                                            @endif
                                        @endif
                                     @elseif($order->status == 2)
                                        پایان یافته
                                     @endif
                                 </span>            
 
                                 @if($order->email == null)
                                    <a href="{{ route('shop.cp.view', $order->cp) }}" class="btn btn-warning">تکمیل اطلاعات</a>
                                 @endif

                                 @if ($order->status == 1)
                                     @if ($order->type == 1)
                                        <script>
                                            // زمان‌های شروع و پایان را مشخص کنید (مثلاً زمان پایان 1 دقیقه بعد از زمان شروع)
                                            let startTime = new Date();
                                            let targetTime = new Date('{{ $order->expire_time }}'); // 60,000 میلی‌ثانیه برابر 1 دقیقه
        
                                            // عنصر span که زمان باقی‌مانده را نمایش می‌دهد را انتخاب کنید
                                            let timerSpan = document.getElementById('timer-{{ $key }}');
        
                                            function updateTimer() {
                                                // زمان فعلی را بدست آورید
                                                let now = new Date();
        
                                                // تفاوت بین زمان هدف و زمان فعلی را حساب کنید
                                                let timeDifference = targetTime - now;
        
                                                if (timeDifference <= 0) {
                                                    // اگر زمان به پایان رسید
                                                    timerSpan.textContent = "واریز شد";
                                                    clearInterval(timerInterval);
                                                } else {
                                                    // تبدیل میلی‌ثانیه به ثانیه
                                                    let seconds = Math.floor((timeDifference / 1000) % 60);
                                                    let minutes = Math.floor((timeDifference / (1000 * 60)) % 60);
                                                    let hours = Math.floor((timeDifference / (1000 * 60 * 60)) % 24);
        
                                                    if(hours == 0){
                                                        timerSpan.textContent = `${minutes}:${seconds}`;
                                                    }else{
                                                        timerSpan.textContent = `${hours}:${minutes}:${seconds}`;
                                                    }
                                                }
                                            }
        
                                            // به‌روزرسانی تایمر هر ثانیه
                                            let timerInterval = setInterval(updateTimer, 1000);
        
                                            // اولین به‌روزرسانی تایمر بلافاصله بعد از بارگذاری صفحه
                                            updateTimer(timerSpan);
        
                                        </script>
                                     @endif
                                 @endif

                             </ul>
                         </div>
                   @endforeach
                  
 
                </div>
 
             </div>
            
        </div>
         
         <aside class="col-11 col-md-5 d-flex flex-column gap-4">
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
</section>


@endsection