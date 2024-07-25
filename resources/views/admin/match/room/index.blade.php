@extends('admin.layouts.master')

@section('head-tag')
    <title>فهرست روم های سایت - آلکاتراز</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

@endsection

@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
    <li><a href="">مسابقات</a></li>
    <li><a href="{{ route('room.index') }}">روم ها</a></li>
@endsection

@section('content')
<div class="col-lg-12">
    <div class="portlet box shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">                                        
                    <i class="icon-frane"></i>
                    لیست روم ها
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
                <a class="btn btn-success" href="{{ route('room.create') }}">
                    <i class="icon-plus"></i>
                    افزودن
                </a>
            </div><!-- /.top-buttons-box -->

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
                            <th>بازیکنان فعلی</th>
                            <th>وضعیت</th>
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
                                    {{ number_format($room->fee) . ' تومان '  }}
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
                                <td id="count-{{ $key }}">{{ $room->players }}</td>
                                <td>{{ $room->status == 0 ? 'در انتظار تکمیل ظرفیت' : 'درحال بازی' }}</td>
                                <td>{{ verta($room->created_at)->format('Y-m-d H:i') }}</td>
                                <td>
                                    <a href="{{ route('room-player.index', ['room_id' => $room->id]) }}" class="btn btn-warning">بازیکنان</a>
                                    <a href="{{ route('room.edit', [$room]) }}" class="btn btn-info">ویرایش</a>
                                    <form action="{{ route('room.destroy', [$room]) }}" method="POST" style="display: inline-block">
                                        @method('DELETE')
                                        @csrf
                                        <input type="submit" class="btn btn-danger" value="حدف">                                
                                    </form>
                                </td>
                            </tr>

                            @if ($room->status == 0)
                                <script>
                                    setInterval(() => {
                                        $.ajax({
                                            url: '/api/room/players-count/{{ $room->id }}',
                                            success: function(res){
                                                let count = res.result.count
                                                document.querySelector('#count-{{ $key }}').innerHTML = count
                                            }
                                        })
                                    }, 5000);
                                </script>
                            @endif
                        @endforeach

                        
                    </tbody>
                </table>
            </div><!-- /.table-responsive -->
        </div><!-- /.portlet-body -->
    </div><!-- /.portlet -->
</div><!-- /.col-lg-12 -->                  
@endsection