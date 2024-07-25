@extends('admin.layouts.master')

@section('head-tag')
    <title>فهرست تاریخچه روم های سایت - آلکاتراز</title>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
    <li><a href="">مسابقات</a></li>
    <li><a href="{{ route('room.index') }}">تاریخچه روم ها</a></li>
@endsection

@section('content')
<div class="col-lg-12">
    <div class="portlet box shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">                                        
                    <i class="icon-frane"></i>
                    لیست تاریخچه روم ها
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
                            <th>لینک اتاق</th>
                            <th>فی</th>
                            <th>جایزه</th>
                            <th>نوع تخصیص جایزه</th>
                            <th>ظرفیت</th>
                            <th>برندگان</th>
                            <th>تاریخ</th>
                            <td>عملیات</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rooms as $key => $room)
                            <tr>
                                <td>{{ $key += 1 }}</td>
                                <td>
                                    <a href="{{ $room->link }}">click to redirect</a>
                                </td>
                                <td>
                                    {{ $room->fee == 0 ? 'رایگان' : number_format($room->fee) . ' تومان '  }}
                                </td>
                                <td>
                                    {{ number_format($room->award) . ' تومان '  }}
                                </td>
                                <td>
                                    @if($room->award_type == 0)
                                        نفر اول
                                    @elseif ($room->award_type == 2)
                                        دو نفر اول
                                    @elseif ($room->award_type == 3)
                                        سه نفر اول
                                    @elseif ($room->award_type == 4)
                                        بیشترین کیل
                                    @endif
                                </td>
                                <td>{{ $room->capacity }}</td>
                                <td>
                                    @php
                                        $winners = \App\Models\Player::where('room_id', $room->id)->where('status', '1')->get()->pluck('user_id')->toArray();
                                        if(!empty($winners)){
                                            $winners = \App\Models\User::whereIn('id', $winners)->get()->pluck('username')->toArray();
                                        }
                                    @endphp    
                                    {{ join(',', $winners) }}
                                </td>
                                <td>{{ verta($room->created_at)->format('Y-m-d H:i') }}</td>
                                <td>
                                    <a href="{{ route('room-player.index', ['room_id' => $room->id]) }}" class="btn btn-warning">بازیکنان</a>
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