@extends('app.layouts.master')


@section('head-tag')
    <style>
      .guns {
         position: fixed;
         top: 7rem;
         width: 80%;
         background-color: #fff;
         padding: 2rem;
         border-radius: 1rem;
         right: 10%;
         box-shadow: 0 6px 20px #a09e9e;
         z-index: 999999;
         display: none;
      }

      .guns h2 {
         text-align: center
      }

      .guns .item {
         width: 24%;
         border: 1px solid;
         padding: 1rem;
         margin: .5rem 0;
         position: relative;
      }

      .guns .items form {
         display: flex;
         justify-content: space-between;
         align-items: center;
         flex-wrap: wrap
      }


      .guns img {
         width: 100%;
         height: 5rem;
      }

      .guns h4{
         text-align: center;
         font-size: 1.2rem;
         margin-top: .5rem;
      }

      .guns input[type=checkbox]{
         position: absolute;
         width: 100%;
         height: 100%;
         opacity: 0;
         top: 0;
         right: 0;
      }

      .active{
         border: 1px solid red !important;
         opacity: 0.7;
      }

      .guns input[type=submit]{
         font-family: "payda-Regular" !important;
         margin-top: 1rem;
         width: 100%;
      }

      @media only screen and (max-width:780px){
         .guns{
            width: 100%;
            top: 0;
            right: 0;
            height: 100%;
            z-index: 99999;
            overflow: scroll
         }
         .guns .item{
            width: 49%;
         }
      }

      @media only screen and (max-width:450px){
         .guns .item{
            width: 100%;
         }
      }

      #back{
         position: fixed;
         background-color: rgba(0,0,0,0.6);
         width: 100%;
         height: 100%;
         top: 0;
         display: none;
         right: 0;
      }
    </style>
@endsection

@section('content')

<section class="container mt-50 product">


   <div class="row account justify-content-center align-items-start mt-50 gap-5">
       <div class="col-10 text-center d-flex justify-content-between">
           <h2 class="font-bold font-20">خرید اکانت</h2>
           <div class="filter">
             <div class="filter d-flex gap-3" style="flex-direction: column">
               <button class="btn btn-primary font-bold dropbtn" onclick="openBox()">جستجو گان</button>
            
                 <div class="dropdown">
                     <button class="btn btn-primary font-bold dropbtn">مرتب‌سازی بر اساس</button>
                     <div class="dropdown-content" id="filterDropdown">
                         <a href="{{ request()->guns == null ? route('shop.accounts.view', ['sort' => 'expensive']) : route('shop.accounts.view', ['sort' => 'expensive', 'guns' => request()->guns]) }}" >گران‌ترین</a>
                         <a href="{{ request()->guns == null ? route('shop.accounts.view', ['sort' => 'cheapest']) : route('shop.accounts.view', ['sort' => 'cheapest', 'guns' => request()->guns]) }}" data-value="price-low-to-high">ارزان‌ترین</a>
                         <a href="{{ request()->guns == null ? route('shop.accounts.view', ['sort' => 'old']) : route('shop.accounts.view', ['sort' => 'old', 'guns' => request()->guns]) }}" data-value="newest">جدیدترین</a>
                         <a href="{{ request()->guns == null ? route('shop.accounts.view', ['sort' => 'new']) : route('shop.accounts.view', ['sort' => 'new', 'guns' => request()->guns]) }}" data-value="oldest">قدیمی‌ترین</a>
                     </div>
                 </div>
             </div>
             <div id="accountList" class="account-list">
                 <!-- لیست اکانت‌ها اینجا نمایش داده می‌شود -->
             </div>
         </div>
         </div>

         
         @foreach ($accounts as $account)
         <div data-tilt class="col-9 col-md-3 productItem radius-10 position-relative">
            <div class="product-head">
              <div class="product-img text-center">
                <img class="w-100" src="{{ asset('images/account/' . $account->img) }}" alt=""/>
              </div>
            </div>
            <div class="product-body">
              <h4 class="p-10 font-bold" style="    padding-right: 0;">{{ $account->title }}</h4>
              <h6>گان های اکانت‌: {{ join(',', $account->guns->pluck('name')->toArray()) }}</span>
            </div>
            <div class="product-footer d-flex justify-content-between align-items-center mt-20">
              <span>{{ number_format($account->price) }} تومان</span>
              <a href="{{ route('shop.account.view', $account) }}" class="btn btn-danger">مشاهده</a>
            </div>
          </div>
          
         @endforeach
     
   </div>

   <div class="guns">
      <h2>گان های مد نظر خود را انتخاب کنید</h2>
      <button onclick="closeBox()">خروج</button>

      <div class="items">
         <form action="">
            @foreach ($guns as $key => $gun)
               <div class="item @if(isset($_GET['guns']) AND in_array($gun->id, $_GET['guns'])) active @endif" id='item-{{ $gun->id }}'>
                  <input type="checkbox" name="guns[]" @if(isset($_GET['guns']) AND in_array($gun->id, $_GET['guns'])) checked @endif id="{{ $gun->id }}" value="{{ $gun->id }}">
                  <img src="{{ asset('images/guns/' . $gun->img) }}" alt="">
                  <h4>{{ $gun->name }}</h4>
               </div>
            @endforeach

            <input type="submit" value="اعمال فیلتر" class="btn btn-warning">
         </form>
      </div>
   </div>
 </section>
 <div id="back" onclick="closeBox()"></div>


 <script>


   document.querySelectorAll('.guns .item').forEach(item => {
      item.addEventListener('click', (e) => {
         let itemDOM = document.querySelector('#item-' + e.target.id)
         console.log(itemDOM.classList.contains('active'));
         if(itemDOM.classList.contains('active')){
            itemDOM.classList.remove('active')
         }else{
            itemDOM.classList.add('active')
         }
      })
   })

   function closeBox(){
      document.querySelector('.guns').style='display: none'
      document.querySelector('#back ').style='display: none'
   }
   function openBox(){
      document.querySelector('.guns').style='display: block'
      document.querySelector('#back ').style='display: block'
   }
</script>
@endsection
