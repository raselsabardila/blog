@extends('templates_backend.home')
@section("sub-title","Category")

@section('content')

    @if (session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif

    <a href="{{route('category.create')}}"><button class="btn btn-primary">Tambah Category</button></a>
    <br><br>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Slug</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($category as $item => $hasil)
                <tr>
                    <th scope="row">{{$item + $category->firstitem()}}</th>
                    <td>{{$hasil->name}}</td>
                    <td>{{$hasil->slug}}</td>
                    <td>
                    <a href="{{route('category.edit',$hasil)}}"><button class="btn btn-warning btn-sm">Edit</button></a>
                        <form action="{{route('category.destroy',$hasil)}}" method="post">
                            @csrf
                            @method("delete")
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$category->links()}}
@endsection