@extends('app.layouts.master')

@section('head-tag')
    <title>آلکاتراز</title>
@endsection

@section('content')


<section class="container mt-50">
   <div class="row justify-content-center gap-5">
       <div class="user-star glass-white-bg radius-15 col-11 col-lg-6">
           <div class="star d-flex justify-content-around mt-100 gap-5">
             <!-- نفر  دوم -->
              <div class="user text-center user-3 position-relative">
                 <div class="image ">
                     <img src="asset/src/test/آفر-دوبل-سی-پی-mobile.jpg 1.png" class="w-100 h-100 radius-100" alt="">
                 </div>
                 <h3 class="font-15">{{ $topPlayer->count() >= 2 ? \App\Models\User::find($topPlayer[1]->user_id)->username : '' }}</h3>

                 <span>{{  $topPlayer->count() >= 2 ? $topPlayer[1]->total : '' }} برد</span>

                 <div class="level position-absolute">
                     <img src="asset/src/logo/user-level/level-3.png" class="w-100" alt="">
                 </div>
              </div>
             <!--  -->


             <!-- نفر اول -->
              <div class="user text-center user-1 position-relative">
                 <div class="image ">
                     <img src="asset/src/test/آفر-دوبل-سی-پی-mobile.jpg 2.png" class="w-100 h-100 radius-100" alt="">
                 </div>
                 <h3 class="font-15">{{ $topPlayer->count() >= 1 ? \App\Models\User::find($topPlayer[0]->user_id)->username : '' }}</h3>
                 <span>{{ $topPlayer->count() >= 1 ? $topPlayer[0]->total : '' }} برد</span>

                 <div class="level position-absolute">
                     <img src="asset/src/logo/user-level/level-1.png" class="w-100" alt="">
                 </div>
              </div>
              <!--  -->

              <!-- نفر سوم -->
              <div class="user text-center user-2 position-relative">
                 <div class="image ">
                     <img src="asset/src/test/آفر-دوبل-سی-پی-mobile.jpg 3.png" class="w-100 h-100 radius-100" alt="">
                 </div>
                 <h3 class="font-15">{{ $topPlayer->count() >= 3 ? \App\Models\User::find($topPlayer[2]->user_id)->username : '' }}</h3>
                 <span>{{  $topPlayer->count() >= 3 ? $topPlayer[2]->total : '' }} برد</span>
                 <div class="level position-absolute">
                     <img src="asset/src/logo/user-level/level-2.png" class="w-100" alt="">
                 </div>
              </div>
              <!--  -->
           </div>
           <div class="star-rank d-flex justify-content-center align-items-end">
               <div class="rank">
                 <img src="asset/src/logo/star-2.png" class="" alt="">
               </div>
               <div class="rank">
                  <img src="asset/src/logo/star-1.png" class="" alt="">
               </div>
               <div class="rank">
                  <img src="asset/src/logo/star-3.png" class="" alt="">                    
               </div>
           </div>
       </div>
       <div class="more-user-star glass-white-bg radius-15 col-11 col-lg-5">
          <div class="users d-flex flex-column">
             @foreach ($topPlayer as $key => $player)
               @if($key != 0 AND $key != 1 AND $key != 2)
                  <div class="star p-20 border-bottom d-flex justify-content-between align-items-center">
                     <div class="">
                        <span>{{ $player->total }} برد</span>
                     </div>
                     <div class="d-flex align-items-center gap-3">
                        <h4 class="font-20">{{ \App\Models\User::find($player->user_id)->username }}</h4>
                        <img src="asset/src/test/آفر-دوبل-سی-پی-mobile.jpg 1.png" class="w-50-p h-50-p radius-100 border border-2" alt="">
                        <span>{{ $key += 1 }}</span>
                     </div>
                  </div>
               @endif
             @endforeach
          </div>
          <div class="my-account radius-15">
             <div class="star p-20  d-flex justify-content-between align-items-center">
                 <div class="">
                    <span>{{ \App\Models\Player::where('user_id', auth()->user()->id)->where('status', 1)->count() }} برد</span>
                 </div>
                 <div class="d-flex align-items-center gap-3">
                    <h4 class="font-20">{{ auth()->user()->username }}</h4>
                    <img src="asset/src/test/آفر-دوبل-سی-پی-mobile.jpg 1.png" class="w-50-p h-50-p radius-100 border border-2" alt="">
                    <span>{{ count($topPlayer) + 1 }}</span>
                 </div>
             </div>
          </div>
       </div>
   </div>
 </section>

@endsection