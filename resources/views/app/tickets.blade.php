@extends('app.layouts.master')

@section('head-tag')
    
@endsection

@section('content')
<div class="container my-ticket mt-50">
    <a href="{{ route('ticket.create') }}" style="margin-bottom: 1rem" class="btn btn-warning">ثبت تیکت جدید</a>

    @foreach ($tickets as $ticket)
        <div class="ticket-card">
            <div class="ticket-header">
                <span class="ticket-title">{{ $ticket->subject }}</span>
                @if ($ticket->status == 0)
                    <span class="ticket-status status-open">باز</span>
                @else
                <span class="ticket-status status-closed">بسته</span>

                @endif
            </div>
            <div class="ticket-body mt-20">
                @php
                    $checkAnswareAdmin = \App\Models\Ticket::where('ticket_id', $ticket->id)->where('admin_id', null)->first();
                @endphp

                @if ($checkAnswareAdmin != null)
                    @if ($checkAnswareAdmin->user->role == 1)
                        پاسخ داده شده
                    @else
                    در انتظار پاسخ ادمین    

                    @endif
                @else
                در انتظار پاسخ ادمین    
                @endif
            </div>
            <div class="ticket-footer">
                <p class="ticket-date">تاریخ ارسال: {{ verta($ticket->created_at)->format('Y/m/d') }}</p>
                <div class="ticket-actions">
                    <a href="{{ route('ticket.view', $ticket) }}" class="btn btn-dark font-bold">مشاهده جزئیات</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection