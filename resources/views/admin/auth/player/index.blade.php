@extends('admin.layouts.master')

@section('head-tag')
    <title>فهرست بازیکنان سایت - آلکاتراز</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection

@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
    <li><a href="">احراز هویت</a></li>
    <li><a href="{{ route('player.index') }}">بازیکنان</a></li>
@endsection

@section('content')
<div class="col-lg-12">
    <div class="portlet box shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">                                        
                    <i class="icon-frane"></i>
                    لیست بازیکنان
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
                <a class="btn btn-success" href="{{ route('player.create') }}">
                    <i class="icon-plus"></i>
                    افزودن
                </a>
            </div><!-- /.top-buttons-box -->

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped" id="data-table">
                    <thead>
                        <tr>
                            <th>ردیف</th>
                            <th>نام کاربری</th>
                            <th>شماره تماس</th>
                            <th>سطح</th>
                            <th>وضعیت</th>
                            <th>کیف پول</th>
                            <th>کیف پول جوایز</th>
                            <th>مسابقات</th>
                            <th>برنده شده</th>
                            <th>تاریخ ساخت</th>
                            <td>عملیات</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($players as $key => $player)
                            <tr>
                                <td>{{ $key += 1 }}</td>
                                <td>{{ $player->username }}</td>
                                <td>{{ $player->phone }}</td>
                                <td>
                                    @if($player->level == '0')
                                        نوب
                                    @elseif($player->level == '1')
                                        پلیر
                                    @elseif($player->level == '2')
                                        پرو پلیر
                                    @else
                                        اولترا پلیر
                                    @endif
                                </td>
                                <td>
                                    @if($player->status == '1')
                                        <span class="alert-success">فعال</span>
                                    @else
                                        <span class="alert-danger">غیرفعال</span>
                                    @endif
                                </td>
                                <td>{{ number_format($player->wallet) . ' تومان ' }}</td>
                                <td>{{ number_format($player->award_wallet) . ' تومان ' }}</td>
                                <td>{{ $player->players()->count() }}</td>
                                <td>{{ $player->players()->where('status', '1')->get()->count() }}</td>
                                <td>{{ verta($player->created_at)->format('Y-m-d') }}</td>
                                <td>
                                    <a href="{{ route('player.show', [$player]) }}" class="btn btn-warning">تاریخچه معاملات</a>
                                    <a href="{{ route('player.edit', [$player]) }}" class="btn btn-info">ویرایش</a>
                                    <a href="#" class="btn btn-danger">حذف</a>
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

@section('script')
    @if(session()->has('alert-success'))
        <script>
            Swal.fire({
                title: "پیام موفقیت آمیز!",
                text: "{{ session('alert-success') }}",
                icon: "success"
            }); 
        </script>
    @endif
@endsection