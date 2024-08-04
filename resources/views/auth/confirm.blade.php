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
              <p>کد تایید را وارد نمایید</p>
           </div>
          <div class="field mt-50 d-flex align-items-center justify-content-center gap-3">
              <input type="text" class="text-center font-bold " id="input1" autofocus maxlength="6"  placeholder="0" name="otp[]">
              <input type="text" class="text-center font-bold " id="input2" placeholder="0" name="otp[]">
              <input type="text" class="text-center font-bold " id="input3" placeholder="0" name="otp[]">
              <input type="text" class="text-center font-bold " id="input4" placeholder="0" name="otp[]">
          </div>
          <div class="mt-50 d-flex justify-content-between">
              <div><a href="{{ route('login.otp.resend', $token) }}" style="color: var(--hading-color);">ارسال مجدد کد</a></div>
              <div style="color: var(--hading-color);" id="timer" data-duration="180"></div>
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

  
  <script>
 
    const inputs = document.querySelectorAll('input[type="text"]');
    
    inputs.forEach(input => {
      input.addEventListener('keyup', function(event) {
        const inputLength = this.value.length;
        const nextInput = this.nextElementSibling;
        const prevInput = this.previousElementSibling;
    
        if (inputLength > 0 && nextInput) {
          nextInput.focus();
        } else if (event.key === 'Backspace' && inputLength === 0 && prevInput) {
          prevInput.focus();
        }
    
        event.preventDefault();
      });
    });
    
    function startCountdown() {
        const timerElement = document.getElementById('timer');
        const duration = parseInt(timerElement.getAttribute('data-duration'), 10);
        let timeLeft = duration;
    
        function updateTimer() {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
    
            // نمایش تایمر
            timerElement.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
    
            if (timeLeft <= 0) {
                clearInterval(timerInterval);
                timerElement.textContent = 'پایان زمان!';
            } else {
                timeLeft--;
            }
        }
    
        // به‌روزرسانی تایمر هر ثانیه
        updateTimer(); // به‌روزرسانی اولیه
        const timerInterval = setInterval(updateTimer, 1000);
    }
    
    // شروع تایمر بعد از بارگذاری صفحه
    document.addEventListener('DOMContentLoaded', startCountdown);
        </script>
    
@endsection