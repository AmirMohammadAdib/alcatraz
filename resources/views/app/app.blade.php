@extends('app.layouts.master')

@section('head-tag')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <title>آلکاتراز</title>
@endsection

@section('content')  
      <div class="container ">
        <div class="gap-3 story">
  
          
          <a href="{{ route('app.question') }}" class="story-item text-center" >
           <img src="asset/src/icon/question-bg.png" class="w-100" alt="">
           <span>سوالات متداول</span>
          </a>
          
          <a href="{{ route('app.contact-us') }}" class="story-item text-center" >
           <img src="asset/src/icon/services-bg.png" class="w-100" alt="">
           <span>تماس با ما</span>
          </a>
          
          <a href="{{ route('shop.shop.view') }}" class="story-item text-center" >
           <img src="asset/src/icon/cp-shop.png" class="w-100" alt="">
           <span>خرید سی پی</span>
          </a>
  
          <a href="{{ route('profile.view') }}" class="story-item text-center" >
           <img src="asset/src/icon/user-account-bg.png" class="w-100" alt="">
           <span>حساب من</span>
          </a>
  
        </div>
      </div>
  
      <div class="container mt-50">
        <div class="row home-head justify-content-center align-items-center">
          <div data-tilt class="col-11 col-md-8 col-lg-6">
            <img class="w-100"  src="asset/src/background/head-bg.png"alt=""
            />
          </div>
          <div class="col-11 col-md-8 col-lg-6 col-xxl-5" data-tilt>
            <h1 class="font-bold border-r-4p">
              آلکاتراز مرجع خرید سی پی کالاف دیوتی موبایل
            </h1>
            <p class="text-justify text-white mt-20">
              لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
              استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در
              ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
              کاربردهای متنوع با هدف بهبود ابزارهای کاربردی ای متنوع با هدف بهبود
              ابزارهای کای متنوع با هدف بهبود ابزارهای کای متنوع با هدف بهبود
              ابزارهای کای متنوع با هدف بهبود ابزارهای کمی باشد.
            </p>
  
            <a href="" class="btn btn-danger font-bold mt-20">شروع کردن</a>
          </div>
  
        </div>
      </div>
  
  
  
  
      <section class="container mt-50 product">
        <div class="text-center">
          <h2 class="font-bold font-20">روم های جاری</h2>
        </div>
        <div class="d-flex mt-50 gap-4 productList" onmousedown="mouseIsDown(event,this)" onmouseup="mouseUp(event,this)" onmouseleave="mouseLeave(event,this)"onmousemove="mouseMove(event,this)">
          @foreach ($currentRooms as $key => $room)
            <div data-tilt class="productItem radius-10 position-relative">
              <div class="product-head">
                <div class="product-img text-center">
                  <img class="w-100" src="{{ asset('images/rooms/' . $room->img) }}" alt=""/>
                </div>
              </div>
              <div class="product-body">
                <h4 class="p-10 font-bold">{{ $room->title }}</h4>
                <span><span id="count-{{ $key }}">{{ intval($room->capacity) - intval($room->players) }}</span> نفر باقی مانده</span>
              </div>
              <div class="product-footer d-flex justify-content-between align-items-center mt-20">
                <span>{{ $room->fee != null ? number_format($room->fee) . ' تومان ' : 'رایگان' }}</span>
                <a href="{{ route('room.view', [$room]) }}" class="btn btn-danger">مشاهده</a>
              </div>
            </div>
            <script>
              setInterval(() => {
                  $.ajax({
                      url: '/api/room/players-count/{{ $room->id }}',
                      success: function(res){
                          let count = res.result.count
                          document.querySelector('#count-{{ $key }}').innerHTML = parseInt('{{ $room->capacity }}') - count
                      }
                  })
              }, 5000);
          </script>
          @endforeach
        </div>
      </section>
  
      <div class="container mt-100">
        <div class="row justify-content-center gap-5 align-items-center">
          <div data-tilt class="col-10 col-md-6">
            <img class="w-100"  src="asset/src/background/head-bg-2.png"alt=""
            />
          </div>
  
          <div class="col-10 col-md-5" data-tilt>
            <h1 class="font-bold border-r-4p">
              آلکاتراز مرجع خرید سی پی کالاف دیوتی موبایل
            </h1>
            <p class="text-justify text-white mt-50">
              لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
              استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در
              ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و
              کاربردهای متنوع با هدف بهبود ابزارهای کاربردی ای متنوع با هدف بهبود
              ابزارهای کای متنوع با هدف بهبود ابزارهای کای متنوع با هدف بهبود
              ابزارهای کای متنوع با هدف بهبود ابزارهای کمی باشد.
            </p>
          </div>
  
        </div>
  
        <!-- مکان قرار گیری بنر های تبلیغاتی -->
         <div class="row justify-content-center ">
            <div class="col-10 col-md-4" data-tilt>
               <img  class="w-100" src="asset/src/background/bg-lg-banner (1).png" alt="">
            </div>
            <div class="col-10 col-md-4" data-tilt>
              <img  class="w-100" src="asset/src/background/bg-lg-banner (3).png" alt="">
           </div>
            <div class="col-10 col-md-4" data-tilt>
             <img  class="w-100" src="asset/src/background/bg-lg-banner (2).png" alt="">
            </div>
         </div>
  
         <!-- اسلایدر -->
         <section class="mt-100 product">
          <div class="text-center">
            <h2 class="font-bold font-20">محصولاتی برای فروش</h2>
          </div>
          <div class="d-flex mt-50 gap-4 productList" onmousedown="mouseIsDown(event,this)" onmouseup="mouseUp(event,this)" onmouseleave="mouseLeave(event,this)"onmousemove="mouseMove(event,this)">
            @foreach ($products as $cp)
              <div data-tilt class="productItem radius-10 position-relative">
                <div class="product-head">
                  <div class="product-img text-center">
                    <img class="w-100" src="{{ asset('images/cp/img/' . $cp->img) }}" alt=""/>
                  </div>
                </div>
                <div class="product-body">
                  <h4 class="p-10 font-bold">{{ $cp->title }}</h4>
                  <span>فوری: {{ number_format($cp->price) . ' تومان ' }}</span><br>
                  <span>سوپر فوری: {{ number_format($cp->super_price) . ' تومان ' }}</span>
                </div>
                <div class="product-footer d-flex justify-content-between align-items-center mt-20">
                  <a href="{{ route('shop.cp.view', $cp) }}" class="btn btn-danger" style="width: 100%" >مشاهده</a>
                </div>
              </div>
            @endforeach
          </div>
         </section>

         <!-- مکان قرار گیری بنر های تبلیغاتی -->
         {{-- <br><br><br>
         <div class="row justify-content-center">
          <div class="col-12" data-tilt>
             <img  class="w-100" src="https://dicardo.com/Uploads/baner3d/1/r-1170-234-255617c1-3f4d-485f-b2cc-ed14608ca62a.png" alt="">
          </div>

          <div class="row" style="margin-top: 1rem;">
            <div class="col-6" data-tilt>
              <img  class="w-100" src="asset/src/background/bg-lg-banner (3).png" alt="">
            </div>
              <div class="col-6" data-tilt>
              <img  class="w-100" src="asset/src/background/bg-lg-banner (2).png" alt="">
              </div>
          </div>
       </div> --}}
         
  
         <!-- باکس پیشنهاد فروش اکانت -->
          <div class="background_text mt-100 " data-tilt>
                <div class="text_box"  data-tilt>
                    <h2 class="font-bold text-center p-20">با آلکاتراز همین الان اکانت 
                      خودت رو بفروش</h2>

                      <a href="{{ route('account.request.view') }}" class="btn btn-danger font-bold">فروش اکانت</a>
                </div>
          </div>
  
      </div>

      
@endsection