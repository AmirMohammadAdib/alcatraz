@extends('admin.layouts.master')

@section('head-tag')
    <title>فهرست سفارشات سایت - آلکاتراز</title>
    <style>
        @keyframes blinker {
            50% {
                opacity: 0;
            }
        }

        .super{
            animation: blinker .8s linear infinite;
            font-weight: 900;
            color: rgb(215, 39, 39);
            text-shadow: 0 5px 20px rgba(208, 30, 30, 0.8)
        }
    </style>


@endsection

@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
    <li><a href="">فروشگاه</a></li>
    <li><a href="{{ route('order.index') }}">سفارشات</a></li>
@endsection

@section('content')
<div class="col-lg-12">
    <div class="portlet box shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">                                        
                    <i class="icon-frane"></i>
                    لیست سفارشات
                </h3>
            </div><!-- /.portlet-title -->
            <div class="buttons-box">
                <a class="btn btn-sm btn-default btn-round btn-fullscreen" rel="tooltip" title="تمام صفحه" href="#">
                    <i class="icon-size-fullscreen"></i>
                </a>
                <a class="btn btn-sm btn-default btn-round btn-collapse" rel="tooltip" title="کوچک کردن" href="#">
                    <i class="icon-arrow-up"></i>
                </a>
            </div><!-- /.buttons-box -->
        </div><!-- /.portlet-heading -->
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="data-table">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>خریدار</th>
                            <th>محصول</th>
                            <th>نوع</th>
                            <th>کد رهگیری</th>
                            <th>ایمیل</th>
                            <th>رمز عبور</th>
                            <th>تاریخ</th>
                            <td>عملیات</td>
                        </tr>
                    </thead>
                    <tbody class="dataOrder">
                        
                        @foreach ($orders as $key => $order)
                            <tr>
                                <td>{{ $key += 1 }}</td>
                                <td>{{ $order->user->phone }}</td>
                                <td>{{ $order->cp->title }}</td>
                                <td>
                                    @if ($order->type == '0')
                                        فوری
                                    @else
                                        <p class="super">سوپر فوری <span id="timer-{{ $key }}"></span></p>
                                    @endif
                                </td>
                                <td>{{ $order->payment_id == null ? ' - ' : $order->payment->transaction_id  }}</td>
                                <td onclick="copyText(this)">{{ $order->email }}</td>
                                <td onclick="copyText(this)">{{ $order->password }}</td>
                                <td>{{ verta($order->created_at)->format('Y-m-d') }}</td>
                                <td>
                                    <form action="{{ route('order.destroy', [$order]) }}" method="POST" style="display: inline-block">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-danger" value="کنسل کردن">                                
                                    </form>
                                    <a href="{{ route('order.edit', [$order]) }}" class="btn btn-success">اعلام پایان کار</a>
                                </td>
                            </tr>

                            @if ($order->type == '1')
                                {{-- <script>
                                    // زمان‌های شروع و پایان را مشخص کنید (مثلاً زمان پایان 1 دقیقه بعد از زمان شروع)
                                    let startTime = new Date();
                                    let targetTime = new Date('{{ $order->expire_time }}'); // 60,000 میلی‌ثانیه برابر 1 دقیقه

                                    // عنصر span که زمان باقی‌مانده را نمایش می‌دهد را انتخاب کنید
                                    let timerSpan = document.getElementById('timer-{{ $key }}');

                                    function updateTimer() {
                                        // زمان فعلی را بدست آورید
                                        let now = new Date();

                                        // تفاوت بین زمان هدف و زمان فعلی را حساب کنید
                                        let timeDifference = targetTime - now;

                                        if (timeDifference <= 0) {
                                            // اگر زمان به پایان رسید
                                            timerSpan.textContent = "پایان یافته";
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

                                </script> --}}
                            @endif

                           
                        @endforeach
                        
                    </tbody>
                </table>
            </div><!-- /.table-responsive -->
        </div><!-- /.portlet-body -->
    </div><!-- /.portlet -->
</div><!-- /.col-lg-12 -->               
<script>
    function copyText(e) {

        
          // Copy the text inside the text field
          navigator.clipboard.writeText(e.innerHTML)
              .then(() => {
                  // Optionally, provide feedback to the user
                  alert("کپی شد: " + e.innerHTML);
              })
              .catch(err => {
                  console.error('خطا در کپی کردن متن:', err);
              });
      }

</script>   
@endsection

@section('script')

<script>
    setInterval(function(){
        $.ajax({
            url: '/api/new-orders',
            success: function(res){
                let dom = ``;
                let n = 1;
                res.result.forEach(order => {
                    
                    dom += `
                                <tr>
                                <td>${n}</td>
                                <td>${order.user.username}</td>
                                <td>${order.cp.title}</td>
                                <td><p  ${order.superClass}>${order.type}</p></td>
                                <td>-</td>
                                <td onclick="copyText(this)">${order.email}</td>
                                <td onclick="copyText(this)">${order.password}</td>
                                <td>${order.created_atk}</td>
                                <td>
                                    <form action="${order.deleteRoute}" method="POST" style="display: inline-block">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-danger" value="کنسل کردن">                                
                                    </form>
                                    <a href="${order.editRoute}" class="btn btn-success">اعلام پایان کار</a>
                                </td>
                            </tr>

                            
                    `


                })
                document.querySelector('.dataOrder').innerHTML = dom

            }
        })
    }, 5000)

</script>

@endsection