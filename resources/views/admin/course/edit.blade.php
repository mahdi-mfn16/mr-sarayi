@extends('admin.layouts.dashboard')
@section('main')
<form action="{{ route('admin.course.edit', ['course'=>$course->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="list-group">
        <input type="hidden" name="course_id" value="{{ $course->id }}">
        <label class="text-right mt-3" for="name">نام کلاس</label>
        <input name="name" type="text" class="list-group-item text-right @error('name') is-invalid @enderror" value="{{ old('name') ? old('name') : $course->name }}">
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="list-group">
        <label class="text-right mt-3" for="text">توضیح کلاس</label>
        <input name="text" type="text" class="list-group-item text-right @error('text') is-invalid @enderror" value="{{ old('text') ? old('text') : $course->text }}">
        @error('text')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="list-group">
        <label class="text-right mt-3" for="slug">slug</label>
        <input name="slug" type="text" class="list-group-item text-right @error('slug') is-invalid @enderror" value="{{ old('slug') ? old('slug') : $course->slug }}">
        @error('slug')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="list-group">
        <label class="text-right mt-3" for="free">هزینه کلاس</label>
        <select name="free" id="free" class="list-group-item text-right @error('free') is-invalid @enderror">
            <option value="1" {{ $course->free == 1  ? 'selected' : ""  }}>رایگان</option>
            <option value="0" {{ $course->free == 0  ? 'selected' : ""  }}>با هزینه</option>
        </select>
        @error('free')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="list-group">
        <label class="text-right mt-3" for="price">قیمت(درصورت انتخاب رایگان قیمت وارد نکنید)</label>
        <input name="price" type="text" class="list-group-item text-right @error('price') is-invalid @enderror" value="{{ old('price') ? old('price') : $course->price }}">
        @error('price')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="list-group">
        <label class="text-right mt-3" for="length_time">زمان دوره</label>
        <input name="length_time" type="time" class="list-group-item text-right @error('length_time') is-invalid @enderror" value="{{ old('length_time') ? old('length_time') : $course->length_time }}">
        @error('length_time')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="list-group">
        <label class="text-right mt-3" for="image">تصویر دوره</label>
        <input name="image" type="file" class="list-group-item text-right @error('image') is-invalid @enderror">
        @error('image')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    @if (isset($course->image))
    <div class="list-group image-show">
        <input type="hidden" name="old_image" value="{{ $course->id }}">
        <span data-imageId="{{ $course->image->id }}" data-route="{{ route('admin.image.delete') }}" onclick="deleteImage(this)" style="cursor:pointer;position: relative; top: 10px; right: 90px; display: block; width: 20px; height: 20px; color: #fff; background: red; border-radius: 50%; text-align: center; line-height: 18px;">x</span>
        <span style="display:block;width:100px;height:100px;background-position: center;background-size: cover;background-image: url({{ asset($course->image->path) }});"></span>
    </div>
    @endif

    <div class="list-group">
        <label class="text-right mt-3" for="description">توضیح تکمیلی</label>
        <textarea name="description" id="description" class="list-group-item text-right @error('description') is-invalid @enderror">{{ old('description') ? old('description') : $course->description }}</textarea>
        @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="list-group">
        <button class="btn btn-primary mt-3">ویرایش کلاس</button>
    </div>
</form>

@endsection