@extends('app.layouts.master')


@section('content')


<section class="container mt-50">
   <div class="row shop gap-3 justify-content-center">
       <h1 class="font-bold text-center">فروشگاه سی پی</h1>
              

       @foreach ($cps as $cp)
         <a href='{{ route('shop.cp.view', $cp) }}' class="shop-item col-10 col-md-4 col-lg-3 radius-10">
            <div class="item-img" data-tilt>
               <img   src="{{ asset('images/cp/cover/' . $cp->cover) }} " class="w-100 radius-10" alt="">
            </div>
         </a>
       @endforeach

   </div>
</section>
@endsection