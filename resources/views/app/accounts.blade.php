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
         box-shadow: 0 6px 20px #a09e9e;
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
    </style>
@endsection

@section('content')

<section class="container mt-50 product">


   <div class="row account justify-content-center align-items-start mt-50 gap-5">
       <div class="col-10 text-center d-flex justify-content-between">
           <h2 class="font-bold font-20">خرید اکانت</h2>
           <div class="filter">
             <div class="filter d-flex gap-3" style="flex-direction: column">
               <button class="btn btn-primary font-bold dropbtn">جستجو گان</button>

                 <div class="dropdown">
                     <button class="btn btn-primary font-bold dropbtn">مرتب‌سازی بر اساس</button>
                     <div class="dropdown-content" id="filterDropdown">
                         <a href="#" data-value="price-high-to-low">گران‌ترین</a>
                         <a href="#" data-value="price-low-to-high">ارزان‌ترین</a>
                         <a href="#" data-value="newest">جدیدترین</a>
                         <a href="#" data-value="oldest">قدیمی‌ترین</a>
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
              <h4 class="p-10 font-bold">{{ $account->title }}</h4>
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

      <div class="items">
         <form action="">
            @for ($i=0; $i <= 11; $i++)
               <div class="item" id='item-{{ $i }}'>
                  <input type="checkbox" name="guns[]" id="{{ $i }}">
                  <img src="https://www.gamespot.com/a/uploads/original/1536/15366587/2541093-sologunfull.jpg" alt="">
                  <h4>test name of gun</h4>
               </div>
            @endfor

            <input type="submit" value="اعمال فیلتر" class="btn btn-warning">
         </form>
      </div>
   </div>
 </section>


 <script>
   document.querySelectorAll('.dropdown-content a').forEach(item => {
      item.addEventListener('click', function(e) {
         e.preventDefault();
         const selectedValue = this.getAttribute('data-value');
         const selectedText = this.textContent;

         // تغییر متن دکمه به مقدار انتخاب شده
         document.querySelector('.dropbtn').textContent = selectedText;

         // اعمال فیلتر بر اساس مقدار انتخاب شده
         console.log('گزینه انتخاب شده:', selectedValue);

         // در اینجا می‌توانید منطق مرتب‌سازی واقعی را اضافه کنید
      });
   });


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

</script>
@endsection
