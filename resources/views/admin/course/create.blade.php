@extends('admin.layouts.dashboard')
@section('main')
<form action="{{ route('admin.course.create') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="list-group">
        <label class="text-right mt-3" for="name">نام کلاس</label>
        <input name="name" type="text" class="list-group-item text-right @error('name') is-invalid @enderror" value="{{ old('name') }}">
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="list-group">
        <label class="text-right mt-3" for="text">توضیح کلاس</label>
        <input name="text" type="text" class="list-group-item text-right @error('text') is-invalid @enderror" value="{{ old('text') }}">
        @error('text')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="list-group">
        <label class="text-right mt-3" for="slug">slug</label>
        <input name="slug" type="text" class="list-group-item text-right @error('slug') is-invalid @enderror" value="{{ old('slug') }}"> 
        @error('slug')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="list-group">
        <label class="text-right mt-3" for="free">هزینه کلاس</label>
        <select name="free" id="free" class="list-group-item text-right @error('free') is-invalid @enderror">
            <option value="1" selected {{ old('free') and old('free') == 1 ? 'selected' : ""  }}>رایگان</option>
            <option value="0" {{ old('free') and old('free') == 0 ? 'selected' : ""  }}>با هزینه</option>
        </select>
        @error('free')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="list-group">
        <label class="text-right mt-3" for="price">قیمت(درصورت انتخاب رایگان قیمت وارد نکنید)</label>
        <input name="price" type="text" class="list-group-item text-right @error('price') is-invalid @enderror" value="{{ old('price') }}"> 
        @error('price')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="list-group">
        <label class="text-right mt-3" for="length_time">زمان دوره</label>
        <input name="length_time" type="time" class="list-group-item text-right @error('length_time') is-invalid @enderror" value="{{ old('length_time') }}"> 
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
    <div class="list-group">
        <label class="text-right mt-3" for="description">توضیح تکمیلی</label>
        <textarea name="description" id="description" class="list-group-item text-right @error('description') is-invalid @enderror" >{{ old('description') }}</textarea>
        @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    
    <div class="list-group">
        <button class="btn btn-success mt-3">ثبت کلاس</button>
    </div>
</form>

@endsection