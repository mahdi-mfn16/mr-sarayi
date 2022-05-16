@extends('admin.layouts.dashboard')
@section('main')
<form action="{{ route('admin.category.edit', ['category'=>$category->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="list-group">
        <input type="hidden" name="category_id" value="{{ $category->id }}">
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
        <label class="text-right mt-3" for="image">تصویر کتگوری</label>
        <input name="image" type="file" class="list-group-item text-right @error('image') is-invalid @enderror">
        @error('image')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    @if (isset($category->image))
    <div class="list-group image-show">
        <input type="hidden" name="old_image" value="{{ $category->id }}">
        <span data-imageId="{{ $category->image->id }}" data-route="{{ route('admin.image.delete') }}" onclick="deleteImage(this)" style="cursor:pointer;position: relative; top: 10px; right: 90px; display: block; width: 20px; height: 20px; color: #fff; background: red; border-radius: 50%; text-align: center; line-height: 18px;">x</span>
        <span style="display:block;width:100px;height:100px;background-position: center;background-size: cover;background-image: url({{ asset($category->image->path) }});"></span>
    </div>
    @endif
    <div class="list-group">
        <button class="btn btn-primary mt-3">ویرایش کتگوری</button>
    </div>
</form>

@endsection