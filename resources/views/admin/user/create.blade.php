@extends('admin.layouts.dashboard')
@section('main')
<form action="{{ route('admin.user.create') }}" method="POST">
    @csrf
    <div class="list-group">
        <label class="text-right mt-3" for="name">یوزر نیم</label>
        <input name="name" type="text" class="list-group-item text-right @error('name') is-invalid @enderror" value="{{ old('name') }}">
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="list-group">
        <label class="text-right mt-3" for="phone">موبایل</label>
        <input name="phone" type="text" class="list-group-item text-right @error('phone') is-invalid @enderror" value="{{ old('phone') }}">
        @error('phone')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="list-group">
        <label class="text-right mt-3" for="email">ایمیل</label>
        <input name="email" type="email" class="list-group-item text-right @error('email') is-invalid @enderror" value="{{ old('email') }}">
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="list-group">
        <label class="text-right mt-3" for="password">رمز عبور</label>
        <input name="password" type="password" class="list-group-item text-right @error('password') is-invalid @enderror" autocomplete="new-password">
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="list-group">
        <label for="password-confirm" class="text-right mt-3">تکرار رمز عبور</label>
        <input id="password-confirm" type="password" class="list-group-item text-right" name="password_confirmation" autocomplete="new-password">
    </div>

    <div class="list-group">
        <label class="text-right mt-3" for="privilege">نوع کاربر</label>
        <select name="privilege" id="privilege" class="list-group-item text-right @error('privilege') is-invalid @enderror">
            <option value="1" selected {{ old('privilege') and old('privilege') == 1 ? 'selected' : ""  }}>ادمین</option>
            <option value="0" {{ old('privilege') and old('privilege') == 0 ? 'selected' : ""  }}>کاربر معمولی</option>
        </select>
        @error('privilege')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        <button class="btn btn-success mt-3">ثبت کاربر</button>
    </div>
</form>

@endsection