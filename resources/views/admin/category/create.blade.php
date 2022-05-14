@extends('admin.layouts.dashboard')
@section('main')
<form action="{{ route('admin.category.create') }}" method="POST">
    @csrf
    <div class="list-group">
        <label class="text-right mt-3" for="name">نام کتگوری</label>
        <input name="name" type="text" class="list-group-item text-right @error('name') is-invalid @enderror">
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="list-group">
        <label class="text-right mt-3" for="text">توضیح کتگوری</label>
        <input name="text" type="text" class="list-group-item text-right @error('text') is-invalid @enderror">
        @error('text')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="list-group">
        <label class="text-right mt-3" for="slug">slug</label>
        <input name="slug" type="text" class="list-group-item text-right @error('slug') is-invalid @enderror">
        @error('slug')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="list-group">
        <button class="btn btn-success mt-3">ثبت کتگوری</button>
    </div>
</form>

@endsection