@extends('admin.layouts.app')

@section('content')
<style>
        .list-group {text-align: right; direction: rtl;}
        button.btn a {color: #fff; text-decoration: none;}
        table {text-align: right; direction: rtl;}
    </style>
    
<div class=" float-right col-md-3 h-100 d-inline-block">
    <div class="list-group">
        <a href="{{ route('admin.category.index') }}" class="list-group-item list-group-item-action list-group-item-dark active">مدیریت کتگوری</a>
        <a href="{{ route('admin.course.index') }}" class="list-group-item list-group-item-action list-group-item-dark">مدیریت کلاس ها</a>
        <a href="{{ route('admin.user.index') }}" class="list-group-item list-group-item-action list-group-item-dark">مدیریت کاربران</a>
        <a href="{{ route('admin.code.index') }}" class="list-group-item list-group-item-action list-group-item-dark">مدیریت کدهای فعال سازی</a>

    </div>
</div>
<div class="card-body col-md-9 h-100" style="background: #fff;">
@yield('main')
</div>
<script src="{{ asset('packages/ckeditor/ckeditor.js') }}"></script>

<script type="text/javascript">
        CKEDITOR.replace( 'description' );
</script>
<script src="{{ asset('js/ajax.js') }}"></script>
@endsection