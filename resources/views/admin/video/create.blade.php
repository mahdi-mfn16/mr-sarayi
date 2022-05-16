@extends('admin.layouts.dashboard')
@section('main')
<form action="{{ route('admin.video.create', ['course'=>$course->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="list-group">
        <h3 class="text-right mt-3">{{ $course->name }}</h3>  
    </div>
    <div class="list-group">
        <input name="course_id" type="hidden" value="{{ $course->id }}">
        <label class="text-right mt-3" for="show_name">نام ویدیو</label>
        <input name="show_name" type="text" class="list-group-item text-right @error('show_name') is-invalid @enderror" value="{{ old('show_name') }}">
        @error('show_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="list-group">
        <label class="text-right mt-3" for="episode">قسمت چندم</label>
        <input name="episode" type="number" class="list-group-item text-right @error('episode') is-invalid @enderror" value="{{ old('episode') }}">
        @error('episode')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="list-group">
        <label class="text-right mt-3" for="length_time">زمان ویدیو</label>
        <input name="length_time" type="time" class="list-group-item text-right @error('length_time') is-invalid @enderror" value="{{ old('length_time') }}"> 
        @error('length_time')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="list-group">
        <label class="text-right mt-3" for="video">فایل ویدیو</label>
        <input name="video" type="file" class="list-group-item text-right @error('video') is-invalid @enderror"> 
        @error('video')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="list-group">
        <button class="btn btn-success mt-3">ثبت ویدیو</button>
    </div>
</form>

@endsection