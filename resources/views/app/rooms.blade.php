@extends('app.layouts.master')

@section('head-tag')
    <title>آلکاتراز</title>
@endsection

@section('content')


<section class="container-xxl mt-50">
  <div class="archive-room row justify-content-center gap-5 radius-15">
    @foreach ($rooms as $key => $room)
      <div class="room-item glass-white-bg p-10 radius-15 col-10 col-md-7 col-lg-4 col-xl-3" style="text-align: center">
        <div class="item-head d-flex justify-content-between align-items-start">
          <span class="font-12 font-bold radius-5"><span id="count-{{ $key }}">{{ $room->capacity - $room->players }}</span> نفر باقی مانده</span>
          
          <span class="font-12 font-bold bg-red radius-5" style="background-color: red">{{ $room->status == 0 ? 'در انتظار اجرا' : 'درحال اجرا' }}</span>
        </div>

        <div class="d-flex flex-column gap-2 align-items-center" style="margin-top: 2rem">
          <div class="room-image border border-2">
            <img src="{{ asset('images/rooms/' . $room->img) }}" class="w-100-p"alt=""/>
          </div>
          <h3 class="font-20">{{ $room->title }}</h3>
          <h4 class="font-15">{{ number_format($room->award) }} تومان جایزه نقدی</h4>

        </div>
        
        <div class="item-footer mt-50 d-flex align-items-center justify-content-between">
          <div>
            <span>{{ $room->fee == null ? 'رایگان' : number_format($room->fee) . ' تومان ' }}</span>
          </div>
          <div>
            <a href="{{ route('room.view', $room) }}" class="btn btn-primary font-bold">مشاهده</a>
          </div>
        </div>
      </div>
    @endforeach
    
  </div>
</section>

@endsection