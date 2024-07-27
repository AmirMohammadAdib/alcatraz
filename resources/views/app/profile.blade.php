@extends('app.layouts.master')

@section('head-tag')
    <title>آلکاتراز</title>
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
                             <li>گزینه ۱</li>
                             <li>گزینه ۲</li>
                             <li>گزینه ۳</li>
                           </ul>
                         </div>
                         
                         
                   </div>

                   <div class="head-prof d-flex align-items-center">

                       <!-- اطلاعات کاربر -->
                       <div class="prof-info d-flex align-items-center flex-column ">
                           <h3>Amir Adib</h3>
                           <div class="info-nickname d-flex align-items-center gap-2">
                               <svg width="21" height="21">
                                   <image href="asset/src/svg/shield.svg"></image>
                               </svg>
                               <h4>تازه وارد</h4>
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
                           <div data-width="50" class="box radius-100 position-absolute left-0" >

                           </div>
                           <div class="box-count radius-100 text-center position-relative">
                               <span>3</span>
                           </div>
                       </div>
                       <div class="d-flex justify-content-between mt-20">
                           <ul class="d-flex gap-2">
                              <span>رنک بندی : </span>
                              <p>پلیر</p>
                           </ul>
                           <ul class="d-flex gap-2">
                             <p>0/2</p>
                             <span>برد </span>
                           </ul>
                       </div>
                   </div>

                   <div class="progress-2 d-flex justify-content-center gap-4">
                       <div class="a col-5 col-md-5">
                           <img src="asset/src/background/rec-red.png" alt="">
                           <h3>برد من</h3>
                           <span>0</span>
                       </div>
                       <div class="b col-5 col-md-5">
                           <img src="asset/src/background/rec-yellow.png" alt="">
                           <h3>کاستوم</h3>
                           <span>0</span>
                       </div>

                       
                   </div>

                </div>

                <br><br>
            </div><br><br><br>


            <div class="mt-100 glass-white-bg p-10 radius-15">
               <h3 class="font-bold text-center mt-20">لیست اکانت های من</h3>
               <div class="row gap-3 mt-20 p-20">
                  <div class="col-lg-12  radius-15 border p-10">
                        <h4 class="font-bold text-light-1">اکانت شماره یک</h4>
                            
                        <ul class="d-flex gap-3" style="flex-direction: column;">
                            <span class="font-bold ">قیمت : ۳۵۰ تومان</span>            
                            <span class="font-bold ">وضعیت : در انتظار تایید شما</span>            

                                <label style="color: #fff">ایمیل اکانت بازی</label>
                                <input type="text" placeholder="لطفا ایمیل خود را وارد کنید" class="form-control" style="width: 100%;font-family: 'payda-Regular';
                                color: #fff;">
                                <label style="color: #fff">رمز عبور اکانت بازی</label>
                                <input type="text" placeholder="لطفا رمز عبور خود را وارد کنید" class="form-control" style="width: 100%;font-family: 'payda-Regular';
                                color: #fff;">
                                <input type="submit" value="تایید" class="btn btn-warning">
                            </form>
                        </ul>
                  </div>
                 

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