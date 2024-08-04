@extends('app.layouts.master')

@section('head-tag')
    <title>آلکاتراز</title>

    <style>
      .item-gun{
        width: 30%;
        border-radius: .5rem;
        background-color: #fff;
        box-shadow: 0 4px 5px #c6c1c179;
        transition: .2s;
        padding: .5rem;

      }
      .item-gun:hover {
        box-shadow: 0 4px 5px #b4b0b0;
      }

      .item-gun img{
        width: 100%;
    border-radius: .5rem;
      }

      .guns span{
        margin-bottom: 1rem;
        margin-right: .5rem
      }

      .guns .items{
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap

      }

      .item-gun p{
        text-align: center;
    margin: 0;
    margin-top: .5rem;
      }

      @media only screen and (max-width:666px){
         .item-gun{
          width: 49%;
         }
      }


      @media only screen and (max-width:420px){
         .item-gun{
          width: 100%;
          margin-bottom: 1rem
         }
      }

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
  <div class="row single-product justify-content-center gap-3 align-items-start">
    <div class="box-img  col-11 col-lg-5" >
      <div class="box-single border-animation" data-tilt>
        <img src="{{ asset('images/account/' . $account->img) }}" data-modal="true" class="w-100 radius-10 border"alt=""/>
      </div>

      <div class="product-gallery w-100 d-flex justify-content-between mt-10" >


          @foreach ($account->galleries as $gallery)
            <div class="gallery-item">
              <img src="{{ asset('images/gallery/' . $gallery->img) }}" class="radius-10 w-100 h-100 border" alt="" data-modal="true">
            </div>
          @endforeach
      </div>

      <div class="box-info mt-20 border p-10 radius-15">
        <h3 class="font-bold">{{ $account->title }}</h3>
        <div class="d-flex gap-2 justify-content-end mt-20">
          <h3 class="font-20">{{ number_format($account->price) }}</h3>
          <span>تومان</span>
        </div>
      </div>
      <div class="uid d-flex gap-2 mt-20 justify-content-between align-items-center">
        <input type="text" id="uidText" class="w-100" value="{{ $account->uid }}" readonly>
        <button class="btn btn-success w-100-p font-bold" id="copyButton" onclick="copyText()">کپی UID</button>
       </div>
    </div>
       <div class=" col-11 col-md-11 col-lg-6">
        <div class="product-content glass-white-bg p-10 radius-10">
        <h1 class="font-30 font-bold  p-10 radius-15">
          خرید سی پی کالاف دیوتی وارزون موبایل
        </h1>
        <div class="d-flex align-items-center gap-2 p-10">
          <svg width="30" height="30">
            <image href="{{ asset('asset/src/svg/warning.svg') }}"></image>
          </svg>
          <span class="font-15" style="">لطفا اطلاعات اکانت اکتیویشن خود را به دقت وارد نمائید .</span>
        </div>
        
        <div class="row guns">
          <span class="font-20" style="text-wrap: nowrap">
            لیست گان های اکانت
          </span>
          <div class="items">
            @foreach ($account->guns as $gun)
              <div class="item-gun">
                <img src="{{ asset('images/guns/' . $gun->img) }}" alt="">
                <p>{{ $gun->name }}</p>
              </div>
          @endforeach
          </div>
        </div>
          
        <div class="mt-50 d-flex flex-column align-items-center justify-content-between">
          @if ($account->status == 1)
              
          <form action="{{ route('shop.account.store', $account) }}" class=" gap-3 w-100" method="POST">
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

          @else

          <form action="{{ route('shop.account.store', [$account]) }}" class="d-flex gap-3 w-100" method="POST">
            @csrf
            <button id="instantSaleButton" class="btn w-100 btn-success font-bold">خرید اکانت</button>
            {{-- <button id="superInstantSaleButton" class="btn w-100 btn-success font-bold" data-timer="180">فروش سوپر فوری</button> --}}
          </form>

          @endif

          <div id="timerContainer" class="mt-20"></div>
        </div>
        <hr>

        <div class="text-justify mt-20">
        {{ $account->description }}
        </div>
      </div>
    </div>
  </div>
</section>

  <!-- Modal Structure -->
  <div id="modal" class="modal ">
    <span class="close">&times;</span>
    <img class="modal-content " id="modal-image">
    <div id="caption"></div>
</div>

@endsection


@section('script')
    

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
  
  // Get the close button
  const closeBtn = document.querySelector(".close");
  
  // When the user clicks on the close button, close the modal
  closeBtn.addEventListener('click', function () {
      modal.style.display = "none";
  });
  
  // When the user clicks anywhere outside of the modal, close it
  window.addEventListener('click', function (event) {
      if (event.target === modal) {
          modal.style.display = "none";
      }
  });
  
  
  
        const dd = document.querySelector("#dropdown-wrapper");
        const links = document.querySelectorAll(".dropdown-list a");
        const span = document.querySelector(".dropdown-title");
  
        dd.addEventListener("click", function () {
          this.classList.toggle("is-active");
        });
  
        links.forEach((element) => {
          element.addEventListener("click", function (evt) {
            span.innerHTML = evt.currentTarget.textContent;
          });
        });
  
  
  
  function copyText() {
      // Get the text input element
      var copyText = document.getElementById("uidText");
  
      // Select the text field
      copyText.select();
      copyText.setSelectionRange(0, 99999); // For mobile devices
  
      // Copy the text inside the text field
      navigator.clipboard.writeText(copyText.value)
          .then(() => {
              // Optionally, provide feedback to the user
              alert("UID کپی شد: " + copyText.value);
          })
          .catch(err => {
              console.error('خطا در کپی کردن متن:', err);
          });
  }
  
  
  
  
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