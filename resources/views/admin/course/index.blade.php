@extends('admin.layouts.dashboard')
@section('main')
<a href="{{ route('admin.course.create') }}" class="btn btn-success float-right mb-2">ایجاد کلاس</a>
<table class="table table-striped">
   
    <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">slug</th>
            <th scope="col">price</th>
            <th scope="col">length_time</th>
            <th scope="col">created_at</th>
            <th scope="col">updated_at</th>
            <th scope="col">videos</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($courses as $course)
        <tr>
            <th scope="col">{{ $course->id }}</th>
            <th scope="col">{{ $course->name }}</th>
            <th scope="col">{{ $course->slug }}</th>
            <th scope="col">@if ($course->free == 1)
                0
            @else
                {{ $course->price }}
            @endif</th>
            <th scope="col">{{ $course->length_time }}</th>
            <th scope="col">{{ garegorian2jalali($course->created_at) }}</th>
            <th scope="col">{{ garegorian2jalali($course->updated_at) }}</th>
            <th scope="col">
                <button style="background-color:green;" class="btn"><a href="{{ route('admin.video.index', ['course'=>$course->id]) }}">videos</a></button>
            </th>
            <th scope="col">
                <button class="btn btn-primary"><a href="{{ route('admin.course.edit', ['course'=>$course->id]) }}">edit</a></button>
            </th>

            <th scope="col">
                <form method="POST" action="{{ route('admin.course.delete', ['course'=>$course->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">delete</button>
                </form>

            </th>
            
        </tr>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection