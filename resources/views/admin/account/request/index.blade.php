@extends('admin.layouts.master')

@section('head-tag')
    <title>فهرست درخواست های سایت - آلکاتراز</title>
    <style>
        /* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
  margin: 0;
}

/* Firefox */
input[type=number] {
  -moz-appearance: textfield;
}
    </style>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
    <li><a href="">اکانت</a></li>
    <li><a href="{{ route('request.index') }}">درخواست ها</a></li>
@endsection

@section('content')
<div class="col-lg-12">
    <div class="portlet box shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">                                        
                    <i class="icon-frane"></i>
                    لیست درخواست ها
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
            <div class="top-buttons-box mb-2">
                <a class="btn {{ !isset($_GET['sort']) ? 'btn-warning' : 'btn-secondary' }}" href="{{ route('request.index') }}">
                    کل درخواست ها
                </a>

                <a class="btn {{ (isset($_GET['sort']) AND $_GET['sort'] == 'waiting')? 'btn-warning' : 'btn-secondary' }}" href="{{ route('request.index', ['sort' => 'waiting']) }}">
                    در انتظار تایید کاربر
                </a>

                <a class="btn {{ (isset($_GET['sort']) AND $_GET['sort'] == 'not-check')? 'btn-warning' : 'btn-secondary' }}" href="{{ route('request.index', ['sort' => 'not-check']) }}">
                    برسی نشده
                </a>


                <a class="btn {{ (isset($_GET['sort']) AND $_GET['sort'] == 'transfer')? 'btn-warning' : 'btn-secondary' }}" href="{{ route('request.index', ['sort' => 'transfer']) }}">
                    آماده انتقال
                </a>



                <a class="btn {{ (isset($_GET['sort']) AND $_GET['sort'] == 'paying')? 'btn-warning' : 'btn-secondary' }}" href="{{ route('request.index', ['sort' => 'paying']) }}">
                    درانتظار پرداخت
                </a>


                <a class="btn {{ (isset($_GET['sort']) AND $_GET['sort'] == 'finished')? 'btn-warning' : 'btn-secondary' }}" href="{{ route('request.index', ['sort' => 'finished']) }}">
                    پایان یافته
                </a>
            </div><!-- /.top-buttons-box -->

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="data-table">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>فروشنده حساب</th>
                            <th>uID</th>
                            <th>قیمت فروشنده</th> 
                            <th>توضیحات</th>
                            <th>وضعیت</th>
                            <th>قیمت اعلامی سایت</th> 
                            <th>تاریخ</th>
                            <td>عملیات</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>09338744117</td>
                            <td>amiradib</td>
                            <td>
                                {{ number_format(210000) . ' تومان ' }}
                            </td>      
                            <td>سلام و درود این اکانت رو من ...</td>
                            <td>
                                <span class="alert-warning">برسی نشده</span>
                            </td>
                            <td>
                                <input type="number" inputmode="numeric" class="form-control" id="priceInput" placeholder="قیمت مدنظر خود را وارد کنید">
                            </td>
                            <td>{{ verta(time())->format('Y-m-d') }}</td>
                            <td>
                                <form action="" class="d-inline">
                                    <button type="submit" class="btn btn-info">ادامه معامله</button>
                                    <input type="hidden" name="price" id="price" >
                                </form>
                                <a href="#" class="btn btn-danger">کنسل کردن</a>
                                
                            </td>
                        </tr>

                        <tr>
                            <td>2</td>
                            <td>09338744117</td>
                            <td>amiradib</td>
                            <td>
                                {{ number_format(210000) . ' تومان ' }}
                            </td>      
                            <td>سلام و درود این اکانت رو من ...</td>
                            <td>
                                <span class="alert-info">در انتظار تایید کاربر</span>
                            </td>
                            <td>
                                {{ number_format(200000) . ' تومان ' }}
                            </td>
                            <td>{{ verta(time())->format('Y-m-d') }}</td>
                            <td>
                                <a href="#" class="btn btn-danger">کنسل کردن</a>
                                
                            </td>
                        </tr>

                        <tr>
                            <td>3</td>
                            <td>09338744117</td>
                            <td>amiradib</td>
                            <td>
                                {{ number_format(210000) . ' تومان ' }}
                            </td>      
                            <td>سلام و درود این اکانت رو من ...</td>
                            <td>
                                <span class="alert-success">آماده انتقال</span>
                            </td>
                            <td>
                                {{ number_format(200000) . ' تومان ' }}
                            </td>
                            <td>{{ verta(time())->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('request.edit', 1) }}" class="btn btn-info">مشاهده</a>
                                <a href="#" class="btn btn-danger">کنسل کردن</a>
                                
                            </td>
                        </tr>
                        

                        <tr>
                            <td>4</td>
                            <td>09338744117</td>
                            <td>amiradib</td>
                            <td>
                                {{ number_format(210000) . ' تومان ' }}
                            </td>      
                            <td>سلام و درود این اکانت رو من ...</td>
                            <td>
                                <span class="alert-danger">در انتظار پرداخت</span>
                            </td>
                            <td>
                                {{ number_format(200000) . ' تومان ' }}
                            </td>
                            <td>{{ verta(time())->format('Y-m-d') }}</td>
                            <td>
                                <a href="{{ route('request.show', 1) }}" class="btn btn-info">پرداخت</a>
                                <a href="#" class="btn btn-danger">کنسل کردن</a>
                                
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div><!-- /.table-responsive -->
        </div><!-- /.portlet-body -->
    </div><!-- /.portlet -->
</div><!-- /.col-lg-12 -->                  
@endsection