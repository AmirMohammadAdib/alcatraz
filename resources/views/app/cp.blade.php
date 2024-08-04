@extends('app.layouts.master')


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
                      <button id="instantSaleButton" class="btn w-100 btn-danger font-bold">فروش فوری</button>
                      <button id="superInstantSaleButton" class="btn w-100 btn-success font-bold" data-timer="180">فروش سوپر فوری</button>
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





