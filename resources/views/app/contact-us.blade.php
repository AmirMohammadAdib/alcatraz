@extends('app.layouts.master')

@section('head-tag')
    <style>
        .inputForm{
            font-family: "payda-Regular" !important;
            width: 100%;
            background-color: transparent;
    border: 1px solid #7f878e;
    color: #7f878e !important

        }
        button{
            font-family: "payda-Regular" !important;
            margin-bottom: 1rem;

        }

        label{
            color: #7f878e !important;
            margin-top: 2rem
        }

        select{
            width: 100%;
    padding: .5rem;
    font-family: "payda-Regular" !important;
    background-color: transparent;
    color: #7f878e;

        }

        .err{
            font-size: .8rem;
            padding: .2rem .5rem;
            background-color: #b31515;
            border-radius: 0 00 .5rem .5rem;
        }
    </style>
@endsection

@section('content')

<div class="container mt-100">
    <div class="row gap-4 justify-content-center">
        <form action="{{ route('app.contact-us.store') }}" method="POST" class="col-11 col-md-6" enctype="multipart/form-data">
            @csrf
            <h1 class="font-30 font-bold p-20">ارسال پیام متنی</h1>

            <div class="form-group">
                <label for="">موضوع</label>
                <input type="text" name="subject" placeholder="لطفا موضوع خود را وارد کنید" class="inputForm" value="{{ old('subject') }}">
                @error('subject')
                    <span class="err">{{ $message }}</span><br>
                @enderror
            </div><br>


            <div class="form-group">
                <label for="">اهمیت</label>
                <select name="periority" id="" class="form-control">
                    <option value="0"  {{ old('periority') == '0' ? 'selected' : '' }}>کم اهمیت</option>
                    <option value="1"  {{ old('periority') == '1' ? 'selected' : '' }}>متوسط</option>
                    <option value="2"  {{ old('periority') == '2' ? 'selected' : '' }}>فوری</option>
                </select>
                @error('periority')
                    <span class="err">{{ $message }}</span><br>
                @enderror
            </div><br>
            
            <div class="form-group">
                <label for="">توضیحات تکمیلی</label>

                <textarea class="w-100" name="description">{{ old('description') }}</textarea>
                @error('description')
                    <span class="err">{{ $message }}</span><br>
                @enderror
            </div><br>

            <div class="form-group">
                <label for="">فایل ضمیمه (اختیاری)</label>
                <input type="file" name="file" class="inputForm">
                @error('file')
                    <span class="err">{{ $message }}</span><br>
                @enderror
            </div><br>
    
            <button type="submit" class="btn btn-success" type="submit">ارسال</button>
        </div>
        <aside class="col-11 col-md-7 col-lg-5 d-flex flex-column gap-4">
            <!-- دسترسی سریع به صفحات -->
             <a href="{{ route('app.contact-us') }}" class="aside-item d-flex justify-content-between align-items-center radius-15 glass-white-bg p-10 d-block">
                 <div class="item-text d-flex align-items-center gap-2">
                     <svg width="50" height="50">
                        <image href="asset/src/svg/services.svg"></image>
                     </svg>
                     <div>
                        <h3 class="font-15 font-bold">پشتیبانی</h3>
                        <span class="font-15 text-gray">پیشنهاد انتقاد گزارش سوال مشکل</span>
                     </div>
                 </div>
                 <svg width="25" height="16">
                    <image href="asset/src/svg/angle-left.svg"></image>
                 </svg>
             </a>
             <a href="{{ route('app.question') }}" class="aside-item d-flex justify-content-between align-items-center radius-15 glass-white-bg p-10 d-block">
                <div class="item-text d-flex align-items-center gap-2">
                    <svg width="50" height="50">
                       <image href="asset/src/svg/question.svg"></image>
                    </svg>
                    <div>
                       <h3 class="font-15 font-bold">سوالات متداول</h3>
                       <span class="font-15 text-gray">پیشنهاد انتقاد گزارش سوال مشکل</span>
                    </div>
                </div>
                <svg width="25" height="16">
                   <image href="asset/src/svg/angle-left.svg"></image>
                </svg>
            </a>
            <a href="{{ route('app.index') }}" class="aside-item d-flex justify-content-between align-items-center radius-15 glass-white-bg p-10 d-block">
                <div class="item-text d-flex align-items-center gap-2">
                    <svg width="50" height="50">
                       <image href="asset/src/svg/about-us.svg"></image>
                    </svg>
                    <div>
                       <h3 class="font-15 font-bold">درباره ما</h3>
                       <span class="font-15 text-gray">پیشنهاد انتقاد گزارش سوال مشکل</span>
                    </div>
                </div>
                <svg width="25" height="16">
                   <image href="asset/src/svg/angle-left.svg"></image>
                </svg>
            </a>

            <!-- بخش فضای مجازی -->
            <div class="social-media row gap-4 justify-content-center">
                <a href="" class="col-3 radius-15 glass-white-bg p-10 d-block">
                    <div class="item-text d-flex flex-column align-items-center gap-2">
                        <img src="asset/src/background/instagram.png"  alt="اینستاگرام ما را دنبال کنید">
                        <div class="text-center">
                           <h3 class="font-15 font-bold">اینستاگرام</h3>
                        </div>
                    </div>
                </a>
                <a href="" class="col-4 radius-15 glass-white-bg p-10 d-block">
                    <div class="item-text d-flex flex-column align-items-center gap-2">
                        <img src="asset/src/background/telegram.png"  alt="تلگرام ما را دنبال کنید">
                        <div class="text-center">
                           <h3 class="font-15 font-bold">تلگرام</h3>
                        </div>
                    </div>
                </a>
                <a href="" class="col-3 radius-15 glass-white-bg p-10 d-block">
                    <div class="item-text d-flex flex-column align-items-center gap-2">
                        <img src="asset/src/background/discord.png"  alt="دیسکورد ما را دنبال کنید">
                        <div class="text-center">
                           <h3 class="font-15 font-bold">دیسکورد</h3>
                        </div>
                    </div>
                </a>
            </div>

         </aside>
    </div>
</div>
@endsection