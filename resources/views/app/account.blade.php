@extends('app.layouts.master')

@section('head-tag')
    <title>آلکاتراز</title>

@endsection

@section('content')


<section class="container mt-50">
    <div class="row justify-content-center gap-3 align-items-start">
      <div class="box-img col-12 col-lg-5">
        <img
          src="{{ asset('asset/src/background/bg-lg-banner (1).png') }}"
          class="w-100 radius-10 border"
          alt=""
        />

        <img src="{{ asset('asset/src/background/product-panner.webpش') }}" class="w-100" alt="">
      </div>
      <div class="single-product col-12 col-md-11 col-lg-6">


        <div class="product-content glass-white-bg p-10 radius-10">
          <h1 class="font-30 font-bold  p-10 radius-15">
            خرید سی پی کالاف دیوتی وارزون موبایل
          </h1>
          <div class="d-flex align-items-center gap-2 p-10">
              <svg width="30" height="30">
                <image href="asset/src/svg/warning.svg"></image>
              </svg>
              <span class="font-15" style="text-wrap: nowrap"
                >لطفا اطلاعات اکانت اکتیویشن خود را به دقت وارد نمائید .
              </span>
            </div>
          <div id="dropdown-wrapper" class="dropdown-wrapper" tabindex="1">
            <span class="dropdown-title">بتل پس باندل وارزون موبایل</span>

            <ul class="dropdown-list">
              <li><a href="#">100 سی پی وارزون موبایل</a></li>
              <li><a href="#">استارترپک وارزون موبایل</a></li>
              <li><a href="#">بتل پس وارزون موبایل</a></li>
              <li><a href="#">بتل پس باندل وارزون موبایل</a></li>
            </ul>
          </div>
            
          <div class="mt-50 d-flex align-items-center justify-content-between">
              <ul class=" ">
                  <h3>قیمت</h3>
                  <h4>۹۰,۰۰۰ تومان</h4>
                </ul>
                <a class="btn w-50 btn-danger mt-10 font-bold" href="">خرید</a>
          </div>
          <hr>

          <div class="text-justify mt-20">
            <p>
              لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
              استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله
              در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی
            </p>
            <p>
              لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
              استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله
              در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection


@section('script')
    
<script>
    const dd = document.querySelector("#dropdown-wrapper");
    const links = document.querySelectorAll(".dropdown-list a");
    const span = document.querySelector(".dropdown-title");

    dd.addEventListener("click", function () {
      this.classList.toggle("is-active");
    });

    links.forEach((element) => {
      element.addEventListener("click", function (evt) {
        span.innerHTML = evt.currentTarget.textContent;
      });
    });
  </script>
@endsection