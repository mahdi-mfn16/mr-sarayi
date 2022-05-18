@extends('admin.layouts.dashboard')
@section('main')
<form action="{{ route('admin.video.edit', ['course'=>$course->id, 'video'=>$video->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="list-group">
        <h3 class="text-right mt-3">{{ $course->name }}</h3>  
    </div>
    <div class="list-group">
        <input name="course_id" type="hidden" value="{{ $course->id }}">
        <input type="hidden" name="video_id" value="{{ $video->id }}">
        <label class="text-right mt-3" for="show_name">نام ویدیو</label>
        <input name="show_name" type="text" class="list-group-item text-right @error('show_name') is-invalid @enderror" value="{{ old('show_name') ? old('show_name') : $video->show_name }}">
        @error('show_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="list-group">
        <label class="text-right mt-3" for="episode">قسمت چندم</label>
        <input name="episode" type="number" class="list-group-item text-right @error('episode') is-invalid @enderror" value="{{ old('episode') ? old('episode') : $video->episode }}">
        @error('episode')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="list-group">
        <label class="text-right mt-3" for="length_time">زمان ویدیو</label>
        <input name="length_time" type="time" class="list-group-item text-right @error('length_time') is-invalid @enderror" value="{{ old('length_time') ? old('length_time') : $video->length_time }}"> 
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
    @if ($video->path != '')
    <div class="list-group video-show">
        <input type="hidden" name="old_video" value="{{ $video->id }}">
        <span data-videoId="{{ $video->id }}" data-route="{{ route('admin.video.delete', ['course'=>$course->id, 'video'=>$video->id]) }}" onclick="deleteVideo(this)" style="cursor:pointer;position: relative; top: 10px; right: 50px; display: block; width: 20px; height: 20px; color: #fff; background: red; border-radius: 50%; text-align: center; line-height: 18px;">x</span>
        <i class="fa fa-file-video-o fa-5x" aria-hidden="true"></i>
    </div>
    @endif
    <div class="list-group">
        <button class="btn btn-primary mt-3">ویرایش کتگوری</button>
    </div>
</form>

@endsection