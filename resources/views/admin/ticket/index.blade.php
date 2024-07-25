@extends('admin.layouts.master')

@section('head-tag')
    <title>فهرست تیکت ها سایت - آلکاتراز</title>
@endsection

@section('breadcrumb')
    <li><a href="{{ route('dashboard') }}">پیشخوان</a></li>
    <li><a href="">تیکت</a></li>
    <li><a href="">تیکت ها</a></li>
@endsection

@section('content')
<div class="col-lg-12">
    <div class="portlet box shadow">
        <div class="portlet-heading">
            <div class="portlet-title">
                <h3 class="title">                                        
                    <i class="icon-frane"></i>
                    لیست تیکت ها
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
                            <th>نویسنده تیکت</th>
                            <th>عنوان تیکت</th>
                            <th>اولویت تیکت</th>
                            <th>ارجاع شده به</th>
                            <th>تیکت مرجع</th>
                            <th>تاریخ</th>
                            <td>عملیات</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets as $key => $ticket)
                            <tr>
                                <td>{{ $key += 1 }}</td>
                                <td>{{ $ticket->user->username }}</td>
                                <td>{{ $ticket->subject }}</td>
                                <td>{{ $ticket->periority == '0' ? 'نرمال' : 'فوری' }}</td>
                                <td>{{ $ticket->admin_id != null ? $ticket->admin->username : ' - ' }}</td>
                                <td>{{ $ticket->ticket_id != null ? $ticket->ticket->subject : ' - ' }}</td>
                            
                                <td>{{ verta($ticket->created_at)->format('Y-m-d') }}</td>
                                <td>
                                    <a href="{{ route('admin.ticket.show', $ticket) }}" class="btn btn-info">مشاهده</a>
                                    <a href="{{ route('admin.ticket.change', $ticket) }}" class="btn btn-danger">بستن</a>
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