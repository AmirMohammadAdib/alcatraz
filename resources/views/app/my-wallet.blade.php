@extends('app.layouts.master')

@section('head-tag')
    <title>آلکاتراز</title>
    <style>
      .transport{
        background: rgb(255, 255, 255);
        background: linear-gradient(163deg, rgb(255, 255, 255) 0%, #c5b72b 57%);
        padding: 10px;
        display: flex;
        align-items: center;
        text-align: center;
        font-size: 20px;
        color: white;
        border-radius: 20px;
      }

      .transport span{
        display: block;
        width: 50px;
        height: 50px;
        border-radius: 15px;
        line-height: 60px;
        background: white;
        color: #c5b72b !important
      }

      .deposite-box{
        background-color: var(--bg-dark);
        width: 80%;
        right: 10%;
        border-radius: 1rem;
        position: fixed;
        top: 5rem;
        padding: 1rem;
        text-align: center;
        display: none
      }

      .deposite-box input[type=number]{
        border: none;
        border-radius: .5rem;
        outline: none;
        text-align: left;
        width: 100%;
      }

      .deposite-box .form-group{
        position: relative;
      }

      .deposite-box span{
        position: absolute;
        right: 0;
        color: #000 !important;
        padding: .41rem;
        border-radius: 0 .5rem .5rem 0;
      }

      .deposite-box input[type=submit]{
        margin-top: 1rem;
    background-color: #ffd600;
    border-radius: .5rem;
    border: none;
    font-family: "payda-Regular" !important;
      }

      #back{
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        position: fixed;
        top: 0;
        left: 0;
        display: none
      }
    </style>
@endsection

@section('content')

<section class="container mt-50">
  <div class="my-wallet row align-items-start justify-content-center">
    <div class="my-wallet-info col-11 col-md-6 position-relative" style="margin-top: 2rem;">
      <!-- بکگراند زرد کارت کیف پول -->
      <img src="asset/src/background/yellow-bg.png" class="w-100" alt="" />
      <!-- ----- -->

      <!-- اطاعات کیف پول -->
      <div class="info d-flex justify-content-between flex-column h-100 p-20 position-absolute">
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
        <div class="info-body d-flex justify-content-between align-items-end">
          <div class="d-flex gap-2">
            <h3 class="font-bold font-70 text-dark">{{ number_format($user->wallet) }}</h3>
            <span class="font-30 text-dark">تومان</span>
          </div>
          <div class="number d-flex flex-column gap-2 p-10">
            <span class="text-dark">{{ substr($user->cart_number, 0,4) }}</span>
            <span class="text-dark">{{ substr($user->cart_number, 4,4) }}</span>
            <span class="text-dark">{{ substr($user->cart_number, 8,4) }}</span>
            <span class="text-dark">{{ substr($user->cart_number, 12,16) }}</span>
          </div>
        </div>
        <!-- ---- -->
      </div>


    </div>

    <div class="my-wallet-info col-11 col-md-6 position-relative" style="margin-top: 2rem;">
      <!-- بکگراند زرد کارت کیف پول -->
      <img src="asset/src/background/yellow-bg.png" class="w-100" alt="" style="    filter: hue-rotate(168deg);" />
      <!-- ----- -->
      
      <div class="info d-flex justify-content-between flex-column h-100 p-20 position-absolute">
        <div class="info-head d-flex gap-3 align-items-center">
          <!-- ایکون دلار -->
          <svg width="60" height="60">
            <image href="asset/src/svg/circle-dolar.svg"></image>
          </svg>
          <!-- --- -->

          <!-- عنوان کیف پول -->
          <div>
            <h1 class="font-30 text-dark font-bold">کیف پول جایزه</h1>
            <h4 class="font-15 text-dark">اعتبار بدست آمده از جوایز</h4>
          </div>
          <!-- ---- -->
        </div>

        <!-- مشخصات پول به تومان -->
        <div class="info-body d-flex justify-content-between align-items-end">
          <div class="d-flex gap-2">
            <h3 class="font-bold font-70 text-dark">{{ number_format($user->award_wallet) }}</h3>
            <span class="font-30 text-dark">تومان</span>
          </div>
          <div class="number d-flex flex-column gap-2 p-10">
            <span class="text-dark">{{ substr($user->cart_number, 0,4) }}</span>
            <span class="text-dark">{{ substr($user->cart_number, 4,4) }}</span>
            <span class="text-dark">{{ substr($user->cart_number, 8,4) }}</span>
            <span class="text-dark">{{ substr($user->cart_number, 12,16) }}</span>
          </div>
        </div>
        <!-- ---- -->
      </div>
    </div>


    <div class="col-11 col-md-5" style="margin-top: 2rem">
      <!-- دکمه های برداشت و واریز -->
      <div class="withdrawal-deposit d-flex gap-3">
        <div class="withdrawal justify-content-between btn-item gap-3 w-50" id="btnWithdraw">
            برداشت 
            <span>
                <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18 1.93878C18 1.3865 17.5523 0.93878 17 0.93878L8.00003 0.938781C7.44775 0.93878 7.00003 1.3865 7.00003 1.93878C7.00003 2.49107 7.44775 2.93878 8.00003 2.93878L16 2.93878L16 10.9388C16 11.4911 16.4477 11.9388 17 11.9388C17.5523 11.9388 18 11.4911 18 10.9388L18 1.93878ZM1.78877 18.5643L17.7071 2.64589L16.2929 1.23167L0.374558 17.15L1.78877 18.5643Z" fill="#2C57C5"/>
                </svg>                        
            </span>
          </div>
        <div class="deposit justify-content-between btn-item gap-3 w-50" id="btnDeposite"> 
            واریز 
            <span>
                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.673498 18.3945C0.673498 18.9467 1.12121 19.3945 1.6735 19.3945L10.6735 19.3945C11.2258 19.3945 11.6735 18.9467 11.6735 18.3945C11.6735 17.8422 11.2258 17.3945 10.6735 17.3945L2.6735 17.3945L2.6735 9.39446C2.6735 8.84218 2.22578 8.39446 1.6735 8.39446C1.12121 8.39446 0.673499 8.84218 0.673499 9.39446L0.673498 18.3945ZM17.8235 0.830216L0.966392 17.6874L2.38061 19.1016L19.2377 2.24443L17.8235 0.830216Z" fill="#F03D3D"/>
                </svg>
            </span>
          </div>
      </div>

      <div class="col-12" style="margin-top: 1rem">


      <div class="transport justify-content-between btn-item gap-3 w-100" id="btnTransport">
          انتقال 
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left-right" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5m14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5"/>
            </svg>
          </span>
        </div>
    </div>

      <!-- ---- -->

      <!-- بخش تراکنش ها -->
       <div class="transactions glass-white-bg mt-50 radius-15">
           <div class="transaction-title">
              <h2 class="font-15 text-center text-dark font-bold">تراکنش ها</h2>
              <hr>
           </div>
           <div class="transaction-print mt-20">
             @foreach ($transactions as $transaction)
                <div class="print-item d-flex justify-content-between align-items-center">
                  <div class="item d-flex gap-2 align-items-center">
                    @if ($transaction->type == 'deposit')
                      <div class="item-icon deposit">
                          <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M-7.40504e-07 19C-4.87623e-07 19.5523 0.447715 20 0.999999 20L10 20C10.5523 20 11 19.5523 11 19C11 18.4477 10.5523 18 10 18L2 18L2 10C2 9.44772 1.55228 9 1 9C0.447715 9 -2.76888e-07 9.44772 6.02864e-08 10L-7.40504e-07 19ZM18.2929 0.292893L0.292893 18.2929L1.70711 19.7071L19.7071 1.70711L18.2929 0.292893Z" fill="white"/>
                          </svg>
                      </div>
                      @elseif($transaction->type == 'withdraw')
                        <div class="item-icon">
                          <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18 1.93878C18 1.3865 17.5523 0.93878 17 0.93878L8.00003 0.938781C7.44775 0.93878 7.00003 1.3865 7.00003 1.93878C7.00003 2.49107 7.44775 2.93878 8.00003 2.93878L16 2.93878L16 10.9388C16 11.4911 16.4477 11.9388 17 11.9388C17.5523 11.9388 18 11.4911 18 10.9388L18 1.93878ZM1.78877 18.5643L17.7071 2.64589L16.2929 1.23167L0.374558 17.15L1.78877 18.5643Z" fill="white"/>
                          </svg>   
                        </div>
                      @endif
                                                      
                      <div class="item-content d-flex gap-2">
                        <h4>{{ number_format($transaction->amount) }}</h4>
                        <span>تومان</span>
                      </div>
                  </div>
                  @if ($transaction->type == 'deposit')
                    @if($transaction->status == 0)
                      <span class="print-level deposit">واریز نشده</span>
                    @else
                      <span class="print-level deposit">واریز شده</span>
                    @endif
                  @elseif($transaction->type == 'withdraw')
                    @if($transaction->status == 0)
                      <span class="print-level ">درحال تسویه</span>
                    @elseif($transaction->status == 1)
                      <span class="print-level">تسویه شده</span>
                    @else
                      <span class="print-level ">لغو شده</span>
                    @endif
                  @endif
                </div>
             @endforeach
             <!-- پایان -->
           </div>
           <br>
       </div>
    </div>
  </div>


  <div id="back"></div>

  <div class="deposite-box" id="deposite">
    <h2>افزایش موجودی</h2>
    <p>مبلغ مدنظر واریزی را وارد کنید</p>

    <form action="{{ route('wallet.deposite') }}" method="POST">
      @csrf
      <div class="form-group">
        <input type="number" name="amount" class="form-control">
        <span>تومان</span>

      </div>
  
      <input type="submit" value="تایید و پرداخت">
    </form>
  </div>

  <div class="deposite-box" id="withdraw">
    <h2>برداشت از حساب</h2>
    <p>مبلغ مدنظر برداشتی را وارد کنید</p>

    <form action="{{ route('wallet.withdraw') }}" method="POST">
      @csrf
      <div class="form-group">
        <input type="number" name="amount" class="form-control">
        <span>تومان</span>

      </div>
  
      <input type="submit" value="تایید و برداشت">
    </form>
  </div>

  <div class="deposite-box" id="transport">
    <h2>انتقال از حساب</h2>
    <p>مبلغ مدنظر انتقال از حساب جوایز به اصلی</p>

    <form action="{{ route('wallet.transport') }}" method="POST">
      @csrf
      <div class="form-group">
        <input type="number" name="amount" class="form-control">
        <span>تومان</span>

      </div>
  
      <input type="submit" value="تایید و انتقال">
    </form>
  </div>
</section>

@endsection


@section('script')
    <script>
      let back = document.querySelector('#back')
      let withdrawBox = document.querySelector('#withdraw')
      let depositeBox = document.querySelector('#deposite')
      let transportBox = document.querySelector('#transport')


      document.querySelector('#btnWithdraw').addEventListener('click', () => {
        back.style='display:block'
        withdrawBox.style = 'display: block'
      });

      document.querySelector('#btnDeposite').addEventListener('click', () => {
        back.style='display:block'
        depositeBox.style = 'display: block'
      });

      document.querySelector('#btnTransport').addEventListener('click', () => {
        back.style='display:block'
        transportBox.style = 'display: block'
      });

      back.addEventListener('click', () => {
        back.style='display:none'
        document.querySelectorAll('.deposite-box').forEach(box => {
          box.style = 'display: none'
        })
      });



    </script>

    @error('amount')
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