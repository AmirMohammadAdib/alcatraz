@extends('app.layouts.master')

@section('head-tag')
    <title>آلکاتراز</title>
@endsection

@section('content')

<section class="container mt-50">
  <div class="my-wallet row align-items-start justify-content-center">
    <div class="my-wallet-info col-11 col-md-6 position-relative">
      <!-- بکگراند زرد کارت کیف پول -->
      <img src="asset/src/background/yellow-bg.png" class="w-100" alt="" />
      <!-- ----- -->

      <!-- اطاعات کیف پول -->
      <div
        class="info d-flex justify-content-between flex-column h-100 p-20 position-absolute"
      >
        <div class="info-head d-flex gap-3 align-items-center">
          <!-- ایکون دلار -->
          <svg width="60" height="60">
            <image href="asset/src/svg/circle-dolar.svg"></image>
          </svg>
          <!-- --- -->

          <!-- عنوان کیف پول -->
          <div>
            <h1 class="font-30 text-dark font-bold">کیف پول من</h1>
            <h4 class="font-15 text-dark">موجودی اعتبار شما</h4>
          </div>
          <!-- ---- -->
        </div>

        <!-- مشخصات پول به تومان -->
        <div class="info-body d-flex justify-content-between align-items-end"
        >
          <div class="d-flex gap-2">
            <h3 class="font-bold font-70 text-dark">1,000</h3>
            <span class="font-30 text-dark">تومان</span>
          </div>
          <div class="number d-flex flex-column gap-2 p-10">
            <span class="text-dark">6572</span>
            <span class="text-dark">6572</span>
            <span class="text-dark">6572</span>
            <span class="text-dark">6572</span>
          </div>
        </div>
        <!-- ---- -->
      </div>
    </div>

    <div class="col-11 col-md-5">
      <!-- دکمه های برداشت و واریز -->
      <div class="withdrawal-deposit d-flex gap-3">
        <a href="" class="withdrawal justify-content-between btn-item gap-3 w-50"> 
            برداشت 
            <span>
                <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 1.93878C18 1.3865 17.5523 0.93878 17 0.93878L8.00003 0.938781C7.44775 0.93878 7.00003 1.3865 7.00003 1.93878C7.00003 2.49107 7.44775 2.93878 8.00003 2.93878L16 2.93878L16 10.9388C16 11.4911 16.4477 11.9388 17 11.9388C17.5523 11.9388 18 11.4911 18 10.9388L18 1.93878ZM1.78877 18.5643L17.7071 2.64589L16.2929 1.23167L0.374558 17.15L1.78877 18.5643Z" fill="#2C57C5"/>
                </svg>                        
            </span>
        </a>
        <a href="" class="deposit justify-content-between btn-item gap-3 w-50"> 
            واریز 
            <span>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.673498 18.3945C0.673498 18.9467 1.12121 19.3945 1.6735 19.3945L10.6735 19.3945C11.2258 19.3945 11.6735 18.9467 11.6735 18.3945C11.6735 17.8422 11.2258 17.3945 10.6735 17.3945L2.6735 17.3945L2.6735 9.39446C2.6735 8.84218 2.22578 8.39446 1.6735 8.39446C1.12121 8.39446 0.673499 8.84218 0.673499 9.39446L0.673498 18.3945ZM17.8235 0.830216L0.966392 17.6874L2.38061 19.1016L19.2377 2.24443L17.8235 0.830216Z" fill="#F03D3D"/>
                </svg>
            </span>
        </a>
      </div>
      <!-- ---- -->

      <!-- بخش تراکنش ها -->
       <div class="transactions glass-white-bg mt-50 radius-15">
           <div class="transaction-title">
              <h2 class="font-15 text-center text-dark font-bold">تراکنش ها</h2>
              <hr>
           </div>
           <div class="transaction-print mt-20">
               <!-- تک تراکنش -->
              <div class="print-item d-flex justify-content-between align-items-center">
                 <div class="item d-flex gap-2 align-items-center">
                     <div class="item-icon ">
                        <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 1.93878C18 1.3865 17.5523 0.93878 17 0.93878L8.00003 0.938781C7.44775 0.93878 7.00003 1.3865 7.00003 1.93878C7.00003 2.49107 7.44775 2.93878 8.00003 2.93878L16 2.93878L16 10.9388C16 11.4911 16.4477 11.9388 17 11.9388C17.5523 11.9388 18 11.4911 18 10.9388L18 1.93878ZM1.78877 18.5643L17.7071 2.64589L16.2929 1.23167L0.374558 17.15L1.78877 18.5643Z" fill="white"/>
                        </svg>                                
                     </div>
                     <div class="item-content d-flex gap-2">
                        <h4>۵,۰۰۰</h4>
                        <span>تومان</span>
                     </div>
                 </div>
                 <span class="print-level">در حال تسویه</span>
              </div>
              <!-- پایان -->

              <!-- تک تراکنش -->
              <div class="print-item d-flex justify-content-between align-items-center">
                <div class="item d-flex gap-2 align-items-center">
                    <div class="item-icon deposit">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M-7.40504e-07 19C-4.87623e-07 19.5523 0.447715 20 0.999999 20L10 20C10.5523 20 11 19.5523 11 19C11 18.4477 10.5523 18 10 18L2 18L2 10C2 9.44772 1.55228 9 1 9C0.447715 9 -2.76888e-07 9.44772 6.02864e-08 10L-7.40504e-07 19ZM18.2929 0.292893L0.292893 18.2929L1.70711 19.7071L19.7071 1.70711L18.2929 0.292893Z" fill="white"/>
                        </svg>
                                                    
                    </div>
                    <div class="item-content d-flex gap-2">
                       <h4>۵,۰۰۰</h4>
                       <span>تومان</span>
                    </div>
                </div>
                <span class="print-level deposit">واریز شده</span>
             </div>
             <!-- پایان -->

             <!-- تک تراکنش -->
             <div class="print-item d-flex justify-content-between align-items-center">
                <div class="item d-flex gap-2 align-items-center">
                    <div class="item-icon">
                       <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M18 1.93878C18 1.3865 17.5523 0.93878 17 0.93878L8.00003 0.938781C7.44775 0.93878 7.00003 1.3865 7.00003 1.93878C7.00003 2.49107 7.44775 2.93878 8.00003 2.93878L16 2.93878L16 10.9388C16 11.4911 16.4477 11.9388 17 11.9388C17.5523 11.9388 18 11.4911 18 10.9388L18 1.93878ZM1.78877 18.5643L17.7071 2.64589L16.2929 1.23167L0.374558 17.15L1.78877 18.5643Z" fill="white"/>
                       </svg>                                
                    </div>
                    <div class="item-content d-flex gap-2">
                       <h4>۵,۰۰۰</h4>
                       <span>تومان</span>
                    </div>
                </div>
                <span class="print-level">در حال تسویه</span>
             </div>
             <!-- پایان -->

             <!-- تک تراکنش -->
             <div class="print-item d-flex justify-content-between align-items-center">
                <div class="item d-flex gap-2 align-items-center">
                    <div class="item-icon">
                       <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                           <path d="M18 1.93878C18 1.3865 17.5523 0.93878 17 0.93878L8.00003 0.938781C7.44775 0.93878 7.00003 1.3865 7.00003 1.93878C7.00003 2.49107 7.44775 2.93878 8.00003 2.93878L16 2.93878L16 10.9388C16 11.4911 16.4477 11.9388 17 11.9388C17.5523 11.9388 18 11.4911 18 10.9388L18 1.93878ZM1.78877 18.5643L17.7071 2.64589L16.2929 1.23167L0.374558 17.15L1.78877 18.5643Z" fill="white"/>
                       </svg>                                
                    </div>
                    <div class="item-content d-flex gap-2">
                       <h4>۵,۰۰۰</h4>
                       <span>تومان</span>
                    </div>
                </div>
                <span class="print-level">در حال تسویه</span>
             </div>
             <!-- پایان -->
           </div>
           <br>
       </div>
    </div>
  </div>
</section>

@endsection