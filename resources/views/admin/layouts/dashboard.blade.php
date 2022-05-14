@extends('admin.layouts.app')

@section('content')
<style>
        .list-group {text-align: right; direction: rtl;}
        button.btn a {color: #fff; text-decoration: none;}
    </style>
<div class=" float-right col-md-3 h-100 d-inline-block">
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action list-group-item-dark active">مدیریت کتگوری</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-dark">مدیریت کلاس ها</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-dark">مدیریت ویدیو ها</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-dark">مدیریت کاربران</a>
        <a href="#" class="list-group-item list-group-item-action list-group-item-dark">مدیریت تصاویر</a>
    </div>
</div>
<div class="card-body col-md-9 h-100" style="background: #fff;">
@yield('main')
</div>

@endsection