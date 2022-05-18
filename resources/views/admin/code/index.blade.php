@extends('admin.layouts.dashboard')
@section('main')
<a href="{{ route('admin.code.create') }}" class="btn btn-success float-right mb-2">ایجاد کد</a>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">user_name</th>
            <th scope="col">video_name</th>
            <th scope="col">actived</th>
            <th scope="col">created_at</th>
            <th scope="col">updated_at</th>
            <th scope="col">activate/deactivate</th>
            <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($codes as $code)
        <tr>
            <th scope="col">{{$code->id}}</th>
            <th scope="col">{{$code->user->name}}</th>
            <th scope="col">{{$code->video->show_name}}</th>
            <th scope="col">{{$code->actived}}</th>
            <th scope="col">{{ garegorian2jalali($code->created_at) }}</th>
            <th scope="col">{{ garegorian2jalali($code->updated_at) }}</th>
            <th scope="col">
                <form method="POST" action="{{ route( $code->actived ? 'admin.code.deactivate' : 'admin.code.activate' , ['code'=>$code->id])  }}">
                    @csrf
                    <button class="btn {{ $code->actived ? 'btn-primary' : 'btn-success' }}">{{ $code->actived ? 'deactivate' : 'activate' }}</button>
                </form>
            </th>

            <th scope="col">
                <button class="btn btn-danger" onclick="deleteQuestion(this)">delete
                    <form method="POST" action="{{ route('admin.code.delete', ['code'=>$code->id]) }}">
                        @csrf
                        @method('DELETE')

                    </form>
                </button>

            </th>
        </tr>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection