@extends('app.layouts.master')


@section('head-tag')
    
@endsection


@section('content')
    
<section class="container mt-50">
    <div class="row justify-content-center">
        <form action="{{ route('confirm.store', [$token]) }}" method="POST" id="verifiForm" class="regester  p-20 radius-15 col-11 col-md-4">
            @csrf
           <div class="text-center">
              <h1 class="font-30 font-bold">کد تایید</h1>
              <span>کد تایید را وارد نمایید</span>
           </div>
          <div class="input_field mt-50 d-flex align-items-center justify-content-center gap-3">
              <input type="text" class="text-center font-bold " id="input1" autofocus maxlength="6"  placeholder="1" name="otp[]">
              <input type="text" class="text-center font-bold " id="input2" placeholder="2" name="otp[]">
              <input type="text" class="text-center font-bold " id="input3" placeholder="3" name="otp[]">
              <input type="text" class="text-center font-bold " id="input4" placeholder="4" name="otp[]">
          </div>
          <div class="mt-50 d-flex justify-content-between">
            <a href="{{ route('login.otp.resend', $token) }}"><span>ارسال مجدد کد</span></a>
              <a href="" class="text-white">00:00</a>
          </div>

          <div class="mt-100 text-center">
              <button type="submit" class="btn btn-primary mt-20 font-bold">ادامه دادن</button>
          </div>
        </form>
    </div>
  </section>
  @error('otp')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
      Swal.fire({
          title: "پیام موفقیت آمیز!",
          text: "{{ $message }}",
          icon: "error"
      }); 
  </script>
  @enderror
@endsection