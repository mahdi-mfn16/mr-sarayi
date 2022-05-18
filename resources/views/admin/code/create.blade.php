@extends('admin.layouts.dashboard')
@section('main')
<form action="{{ route('admin.code.create') }}" method="POST">
    @csrf
    <div class="list-group">
        <label class="text-right mt-3" for="user_id">نوع کاربر</label>
        <select name="user_id" id="user_id" class="list-group-item text-right @error('user_id') is-invalid @enderror">
           @foreach ($users as $user)
           <option value="{{ $user->id }}" {{ old('user_id') and old('user_id') == $user->id ? 'selected' : ""  }} >{{ $user->name }}</option>
           @endforeach
        </select>
        @error('user_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="list-group">
        <label class="text-right mt-3" for="video_id">نام ویدیو</label>
        <select name="video_id" id="video_id" class="list-group-item text-right @error('video_id') is-invalid @enderror">
           @foreach ($videos as $video)
           <option value="{{ $video->id }}" {{ old('video_id') and old('video_id') == $video->id ? 'selected' : ""  }} >{{ $video->show_name }}</option>
           @endforeach
        </select>
        @error('video_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="list-group">
        <button class="btn btn-success mt-3">ثبت و ارسال کد</button>
    </div>
</form>

@endsection