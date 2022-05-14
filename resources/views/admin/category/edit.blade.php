@extends('admin.layouts.dashboard')
@section('main')
<form action="{{ route('admin.category.edit') }}" method="POST">
    @csrf
    @method('PUT')
    <div class="list-group">
        <label class="text-right mt-3" for="name">نام کتگوری</label>
        <input name="name" type="text" class="list-group-item text-right @error('name') is-invalid @enderror" value="{{ old('name') ? old('name') : $category->name }}">
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="list-group">
        <label class="text-right mt-3" for="text">توضیح کتگوری</label>
        <input name="text" type="text" class="list-group-item text-right @error('text') is-invalid @enderror" value="{{ old('text') ? old('text') : $category->text }}">
        @error('text')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="list-group">
        <label class="text-right mt-3" for="slug">slug</label>
        <input name="slug" type="text" class="list-group-item text-right @error('slug') is-invalid @enderror" value="{{ old('slug') ? old('slug') : $category->slug }}">
        @error('slug')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="list-group">
        <button class="btn btn-primary mt-3">ویرایش کتگوری</button>
    </div>
</form>

@endsection