@extends('admin.layouts.master')

@section('head-tag')
    <title>فهرست عکس های سایت - آلکاتراز</title>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
    <li><a href="">اکانت</a></li>
    <li><a href="{{ route('account.index') }}">عکس ها</a></li>
@endsection

@section('content')
<div class="col-lg-12">
    <div class="portlet box shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">                                        
                    <i class="icon-frane"></i>
                    لیست عکس ها
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
                <a class="btn btn-success" href="{{ route('gallery.create', ['account' => $_GET['account']]) }}">
                    <i class="icon-plus"></i>
                    افزودن
                </a>
            </div><!-- /.top-buttons-box -->

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="data-table">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>تصویر</th>
                            <td>عملیات</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($account->galleries as $key => $gallery)
                            <tr>
                                <td>{{ $key += 1 }}</td>
                                <td>
                                    <img src="{{ asset('images/gallery/' . $gallery->img) }}" width="200">
                                </td>
                                <td>
                                    <form action="{{ route('gallery.destroy', [$gallery, 'account' => $account->id]) }}" method="POST" style="display: inline-block">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-danger" value="حدف">                                
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div><!-- /.table-responsive -->
        </div><!-- /.portlet-body -->
    </div><!-- /.portlet -->
</div><!-- /.col-lg-12 -->                  
@endsection