@extends('admin.layouts.dashboard')
@section('main')
<a href="{{ route('admin.video.create', ['course'=>$course->id]) }}" class="btn btn-success float-right mb-2">ثبت ویدیو</a>
<table class="table table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">show_name</th>
            <th scope="col">episode</th>
            <th scope="col">length_time</th>
            <th scope="col">like</th>
            <th scope="col">created_at</th>
            <th scope="col">updated_at</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($videos as $video)
        <tr>
            <th scope="col">{{$video->id}}</th>
            <th scope="col">{{$video->show_name}}</th>
            <th scope="col">{{$video->episode}}</th>
            <th scope="col">{{$video->length_time}}</th>
            <th scope="col">{{$video->like}}</th>
            <th scope="col">{{ garegorian2jalali($video->created_at) }}</th>
            <th scope="col">{{ garegorian2jalali($video->updated_at) }}</th>
            <th scope="col">
                <button class="btn btn-primary"><a href="{{ route('admin.video.edit', ['course'=>$video->course->id , 'video'=>$video->id]) }}">edit</a></button>
            </th>

            <th scope="col">
                <form method="POST" action="{{ route('admin.video.delete', ['course'=>$video->course->id , 'video'=>$video->id]) }}">
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