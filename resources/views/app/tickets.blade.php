@extends('app.layouts.master')

@section('head-tag')
    
@endsection

@section('content')
<div class="container my-ticket mt-50">
    <div class="ticket-card">
        <div class="ticket-header">
            <span class="ticket-title">مشکل در ثبت سفارش</span>
            <span class="ticket-status status-open">متن تستی</span>
        </div>
        <div class="ticket-body mt-20">
            تیکت شما به واحد پشتیبانی ارجاع داده شده است و در حال بررسی است.
        </div>
        <div class="ticket-footer">
            <p class="ticket-date">تاریخ ارسال: 2024-08-04</p>
            <div class="ticket-actions">
                <button class="btn btn-dark font-bold">مشاهده جزئیات</button>
            </div>
        </div>
    </div>
    <div class="ticket-card">
        <div class="ticket-header">
            <span class="ticket-title">مشکل در ثبت سفارش</span>
            <span class="ticket-status status-pending">متن تستی</span>
        </div>
        <div class="ticket-body mt-20">
            تیکت شما به واحد پشتیبانی ارجاع داده شده است و در حال بررسی است.
        </div>
        <div class="ticket-footer">
            <p class="ticket-date">تاریخ ارسال: 2024-08-04</p>
            <div class="ticket-actions">
                <button class="btn btn-dark font-bold">مشاهده جزئیات</button>
            </div>
        </div>
    </div>
    <div class="ticket-card">
        <div class="ticket-header">
            <span class="ticket-title">مشکل در ثبت سفارش</span>
            <span class="ticket-status status-closed">متن تستی</span>
        </div>
        <div class="ticket-body mt-20">
            تیکت شما به واحد پشتیبانی ارجاع داده شده است و در حال بررسی است.
        </div>
        <div class="ticket-footer">
            <p class="ticket-date">تاریخ ارسال: 2024-08-04</p>
            <div class="ticket-actions">
                <button class="btn btn-dark font-bold">مشاهده جزئیات</button>
            </div>
        </div>
    </div>
</div>
@endsection