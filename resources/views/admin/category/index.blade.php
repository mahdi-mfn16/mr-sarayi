@extends('admin.layouts.dashboard')
@section('main')
<a href="{{ route('admin.category.create') }}" class="btn btn-success float-right mb-2">ایجاد کتگوری</a>
<table class="table table-striped">
    <style>
        table {
            text-align: right;
            direction: rtl;
        }
    </style>
    <thead class="thead-dark">
        <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">slug</th>
            <th scope="col">created_at</th>
            <th scope="col">updated_at</th>
            <th scope="col">edit</th>
            <th scope="col">delete</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <th scope="col">{{$category->id}}</th>
            <th scope="col">{{$category->name}}</th>
            <th scope="col">{{$category->slug}}</th>
            
            <th scope="col">{{ garegorian2jalali($category->created_at) }}</th>
            <th scope="col">{{ garegorian2jalali($category->updated_at) }}</th>
            <th scope="col">
                <button class="btn btn-primary"><a href="{{ route('admin.category.edit', ['category'=>$category->id]) }}">edit</a></button>
            </th>

            <th scope="col">
                <form method="POST" action="{{ route('admin.category.delete', ['category'=>$category->id]) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">delete</button>
                </form>

            </th>
            <!-- <style>
                button.btn a {
                    color: white;
                    text-decoration: none;
                }
            </style> -->
        </tr>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection