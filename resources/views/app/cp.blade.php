@extends('app.layouts.master')

@section('head-tag')
    <style>

      input[type=email]{
        width: 100%;
    border: none;
    border-radius: .3rem;
    text-align: left;
    font-family: 'payda-Regular';
      }

      .err{
        background-color: red;
    border-radius: 0 0 .5rem .5rem;
    padding: 0 .5rem;
      }
      
      input[type=password]{
        width: 100%;
    border: none;
    border-radius: .3rem;
    text-align: left;

    font-family: 'payda-Regular';
      }
    </style>
@endsection

@section('content')

<section class="container mt-50">
    <div class="row justify-content-center gap-5">
        <div class="single-product col-10 col-md-11 col-lg-6 ">
            <div class="product-box glass-white-bg position-relative border radius-15">
                <div class="box-img position-absolute">
                    <img src="{{ asset('images/cp/img/' . $cp->img) }}" class="w-100 radius-10 border" alt="">
                </div>
            </div>
            <div class="product-content mt-100 text-justify">
                <h1 style="text-align: center">{{ $cp->title }}</h1>

           
            </div>
            <div class="product-price">
                <ul class="d-flex justify-content-between p-10">
                    <h3>قیمت فوری</h3>
                    <h4>{{ number_format($cp->price) }} تومان</h4>
                </ul>
                <ul class="d-flex justify-content-between p-10">
                    <h3>قیمت سوپر فوری</h3>
                    <h4>{{ number_format($cp->super_price) }} تومان</h4>
                </ul>
              
                <div class="mt-50 d-flex flex-column align-items-center justify-content-between">
                    <div class="d-flex gap-3 w-100">

                        @if ($buy)
                            @php
                                $checkSuper = \App\Models\CPOrder::where('user_id', auth()->user()->id)->where('cp_id', $cp->id)->where('status', 1)->where('expire_time', '!=', null)->first();
                            
                            @endphp

                            @if($checkSuper != null)
                                <span style="    font-size: 3rem;" id="timer"></span>
                            <p>تا سه دقیقه آینده برای شما واریز خواهد شد، درغیر این صورت دوبرابر آن را برایتان واریز میکنیم</p>
                                <script>
                                    // زمان‌های شروع و پایان را مشخص کنید (مثلاً زمان پایان 1 دقیقه بعد از زمان شروع)
                                    let startTime = new Date();
                                    let targetTime = new Date('{{ $checkSuper->expire_time }}'); // 60,000 میلی‌ثانیه برابر 1 دقیقه

                                    // عنصر span که زمان باقی‌مانده را نمایش می‌دهد را انتخاب کنید
                                    let timerSpan = document.getElementById('timer');

                                    function updateTimer() {
                                        // زمان فعلی را بدست آورید
                                        let now = new Date();

                                        // تفاوت بین زمان هدف و زمان فعلی را حساب کنید
                                        let timeDifference = targetTime - now;

                                        if (timeDifference <= 0) {
                                            // اگر زمان به پایان رسید
                                            timerSpan.textContent = "واریز شد";
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
                            @else
                                <form action="{{ route('shop.cp.store', [$cp, 'update']) }}" class=" gap-3 w-100" method="POST">
                                    @csrf
                                    <div class="form-group">
                                    <label for="">ایمیل</label>
                                    <input type="email" name="email" placeholder="ایمیل حساب کاربری خود را وارد کنید" id="" class="form-control">
                                    @error('email')
                                        <span class="err">{{ $message }}</span>
                                    @enderror
                                    </div><br>
                                    <div class="form-group">
                                    <label for="">رمز عبور</label>
                                    <input type="password" name="password" placeholder="رمز عبور حساب کاربری خود را وارد کنید" id="" class="form-control">
                                    @error('password')
                                        <span class="err">{{ $message }}</span>
                                    @enderror
                                    </div><br>
                                    <button id="instantSaleButton" class="btn w-100 btn-success font-bold">ثبت اطلاعات</button>
                                    {{-- <button id="superInstantSaleButton" class="btn w-100 btn-success font-bold" data-timer="180">فروش سوپر فوری</button> --}}
                                </form>
                            @endif
                        @else
                            @if ($cp->status ==1)
                                <form action="{{ route('shop.cp.store', [$cp, 'type' => 'normal']) }}" method="POST" style="width: 50%;">
                                    @csrf
                                    <input type="submit" value="فروش فوری" id="instantSaleButton" class="btn w-100 btn-danger font-bold">
                                </form>

                                <form action="{{ route('shop.cp.store', [$cp, 'type' => 'super']) }}" method="POST" style="width: 50%;">
                                    @csrf
                                    <input type="submit" value="فروش سوپر فوری" id="superInstantSaleButton" class="btn w-100 btn-success font-bold" data-timer="180">
                                </form>
                            @else
                                <a id="superInstantSaleButton" class="btn w-100 btn-success font-bold">ناموجود</a>
                            @endif
                        @endif

                    </div>
                    <div id="timerContainer" class="mt-20"></div>
                  </div>
                  <hr>
            </div>
        </div>

        @include('app.layouts.nav-bar')
    </div>
</section>

<script>
    // Get the modal
    const modal = document.getElementById("modal");
    const modalImg = document.getElementById("modal-image");
    const captionText = document.getElementById("caption");
    
    // Get all images with data-modal attribute
    const images = document.querySelectorAll('img[data-modal="true"]');
    
    // Add click event to each image
    images.forEach((img) => {
        img.addEventListener('click', function () {
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        });
    });

    
    // When the user clicks anywhere outside of the modal, close it
    window.addEventListener('click', function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });
    

    
    
    
    document.getElementById('superInstantSaleButton').addEventListener('click', function() {
        // Get the timer duration from the data attribute
        const timerDuration = parseInt(this.getAttribute('data-timer'), 10);
    
        // Display the countdown timer
        startCountdown(timerDuration);
    });
    
    function startCountdown(duration) {
        const timerContainer = document.getElementById('timerContainer');
    
        // Calculate end time
        const endTime = Date.now() + duration * 1000;
        
        function updateTimer() {
            // Calculate remaining time
            const now = Date.now();
            const timeLeft = Math.max(0, endTime - now);
    
            if (timeLeft === 0) {
                timerContainer.textContent = 'پایان زمان!';
                return;
            }
    
            // Convert time left to minutes and seconds
            const minutes = Math.floor(timeLeft / 60000);
            const seconds = Math.floor((timeLeft % 60000) / 1000);
    
            timerContainer.textContent = `${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
        }
    
        // Update the timer every second
        updateTimer();
        const timerInterval = setInterval(updateTimer, 1000);
    }
    
    
        </script>
@endsection





