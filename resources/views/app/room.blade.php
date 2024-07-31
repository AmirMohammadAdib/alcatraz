@extends('app.layouts.master')

@section('head-tag')
    <title>آلکاتراز</title>

    <style>
      .user p {
        text-align: center;
        margin: 0
      }

      @media only screen and (max-width: 800px) {
        .user p {
          font-size: .5rem
        }
      }
    </style>
@endsection

@section('content')


<section class="navbar container">
  <div class="navbar-box d-flex justify-content-between align-items-center">
    <div class="d-flex align-items-center gap-3">
      <a href="" class="btn btn-light d-flex gap-2 align-items-center">
        <svg width="18" height="18">
          <image href="asset/src/svg/angle-right-circle.svg"></image>
        </svg>
        بازگشت
      </a>
    </div>
    <!-- سه نقطه -->
    <button class="btn btn-primary font-bold ">ورود به بازی</button>

  </div>
</section>
<!-- پایان  -->

<div class="container-xxl">
  <div class="team d-flex flex-wrap gap-2 justify-content-center mt-20">
    <div team-id="bg_1" class="team-item col-md-4">
      <div class="item-head">
        <h3>بازیکنان</h3>
      </div>
      <div class="item-users d-flex">
        <div class="user">
          <img
            src="{{ asset('asset/src/test/آفر-دوبل-سی-پی-mobile.jpg') }} 1.png"
            alt=""
          />
          <p>amiradib</p>
        </div>
        <div class="user">
          <img
            src="{{ asset('asset/src/test/آفر-دوبل-سی-پی-mobile.jpg') }} 1.png"
            alt=""
          />
          <p>amiradib</p>

        </div>
        <div class="user">
          <img
            src="{{ asset('asset/src/test/آفر-دوبل-سی-پی-mobile.jpg') }} 1.png"
            alt=""
          />
          <p>amiradib</p>

        </div>
        <div class="user">
          <img
            src="{{ asset('asset/src/test/آفر-دوبل-سی-پی-mobile.jpg') }} 1.png"
            alt=""
          />
          <p>amiradib</p>

        </div>
      </div>
    </div>




  </div>
</div>


@endsection