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
              <div><a id="resend" href="{{ route('login.otp.resend', $token) }}" class="d-none" style="color: var(--hading-color);">ارسال مجدد کد</a></div>
              <div style="color: var(--hading-color);" id="timer" ></div>
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
    
    
  
    // زمان‌های شروع و پایان را مشخص کنید (مثلاً زمان پایان 1 دقیقه بعد از زمان شروع)
    let startTime = new Date('{{ $otp->created_at }}');
    let targetTime = new Date('{{ date("Y-m-d H:i:s",strtotime($otp->created_at . "+ 3 minutes")) }}'); // 60,000 میلی‌ثانیه برابر 1 دقیقه
    console.log(targetTime);
    // عنصر span که زمان باقی‌مانده را نمایش می‌دهد را انتخاب کنید
    let timerSpan = document.getElementById('timer');

    function updateTimer() {
        // زمان فعلی را بدست آورید
        let now = new Date();

        // تفاوت بین زمان هدف و زمان فعلی را حساب کنید
        let timeDifference = targetTime - now;

        if (timeDifference <= 0) {
            // اگر زمان به پایان رسید
            timerSpan.textContent = "پایان یافت";
            document.querySelector('#resend').classList.remove('d-none')
            clearInterval(timerInterval);
        } else {
            // تبدیل میلی‌ثانیه به ثانیه
            let seconds = Math.floor((timeDifference / 1000) % 60);
            let minutes = Math.floor((timeDifference / (1000 * 60)) % 60);
            let hours = Math.floor((timeDifference / (1000 * 60 * 60)) % 24);

            if(hours == 0){
                timerSpan.textContent = `${minutes}:${seconds}`;
            }else{
                timerSpan.textContent = `${hours}:${minutes}:${seconds}`;
            }
        }
    }

    // به‌روزرسانی تایمر هر ثانیه
    let timerInterval = setInterval(updateTimer, 1000);

    // اولین به‌روزرسانی تایمر بلافاصله بعد از بارگذاری صفحه
    updateTimer(timerSpan);

        </script>
    
@endsection