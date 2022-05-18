@extends('admin.layouts.dashboard')
@section('main')
<a href="{{ route('admin.user.create') }}" class="btn btn-success float-right mb-2">ایجاد کاربر</a>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">username</th>
            <th scope="col">phone</th>
            <th scope="col">email</th>
            <th scope="col">privilege</th>
            <th scope="col">created_at</th>
            <th scope="col">updated_at</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <th scope="col">{{$user->id}}</th>
            <th scope="col">{{$user->name}}</th>
            <th scope="col">{{$user->phone}}</th>
            <th scope="col">{{$user->email}}</th>
            <th scope="col">{{$user->privilege}}</th>
            <th scope="col">{{ garegorian2jalali($user->created_at) }}</th>
            <th scope="col">{{ garegorian2jalali($user->updated_at) }}</th>
            <th scope="col">
                <button class="btn btn-primary"><a href="{{ route('admin.user.edit', ['user'=>$user->id]) }}">edit</a></button>
            </th>

            <th scope="col">
                <button class="btn btn-danger" onclick="deleteQuestion(this)">delete
                    <form method="POST" action="{{ route('admin.user.delete', ['user'=>$user->id]) }}">
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