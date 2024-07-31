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

    @php
        $keyPlayer = 0;
    @endphp

    @for($i=0; $i < (count($players) / 4); $i ++)

    <div team-id="bg_{{ $i + 1 }}" class="team-item col-md-4">
      <div class="item-head">
        <h3>بازیکنان</h3>
      </div>
      <div class="item-users d-flex">
        @for ($j=0; $j<4; $j++)


          <div class="user">
            <img src="{{ asset('asset/src/test/آفر-دوبل-سی-پی-mobile.jpg') }} 1.png" alt=""/>
            @if ($keyPlayer < count($players))
              <p>{{ $players[$keyPlayer]->user->username }}</p>
            @else
              <p> - </p>  
            @endif

          </div>
          
          @php
            $keyPlayer += 1;
          @endphp
        @endfor
      </div>
    </div>
    @endfor


  </div>
</div>


@endsection