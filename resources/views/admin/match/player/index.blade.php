@extends('admin.layouts.master')

@section('head-tag')
    <title>فهرست برندگان سایت - آلکاتراز</title>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
    <li><a href="">مسابقات</a></li>
    <li><a href="{{ route('room-player.index') }}">برندگان</a></li>
@endsection

@section('content')
<div class="col-lg-12">
    <div class="portlet box shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">                                        
                    <i class="icon-frane"></i>
                    لیست برندگان
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
                            <th>نام کاربری</th>
                            <th>شماره تماس</th>
                            <th>وضعیت</th>
                            <th>سطح</th>
                            <th>تاریخ جوبن شدن</th>
                            <td>عملیات</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($players as $key => $player)
                            <tr>
                                <td>{{ $key += 1 }}</td>
                                <td>{{ $player->user->username }}</td>
                                <td>{{ $player->user->phone }}</td>
                                <td>
                                    @if ($player->status == 0)
                                        <span class="alert-danger">بازنده</span>                                
                                    @else
                                        <span class="alert-success">برنده</span>
                                    @endif
                                </td>
                                <td>{{ $player->user->level() }}</td>
                                <td>{{ verta($player->created_at)->format('Y-m-d') }}</td>
                                <td>
                                    <a href="{{ route('player.show', $player->user->id) }}" class="btn btn-warning">تاریخچه معاملات</a>

                                    <a href="{{ route('room-player.edit', [$player->id]) }}" class="btn btn-info">تعیین به عنوان {{ $player->status == 0 ? 'برنده' : 'بازنده' }}</a>
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