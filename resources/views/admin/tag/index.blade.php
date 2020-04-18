@extends('templates_backend.home')

@section('sub-title',"Tags")

@section('content')
    @if (session("status"))
        <div class="alert alert-success" role="alert">
            {{session("status")}}
        </div>
    @endif

    <a href="{{route('tag.create')}}"><button class="btn btn-primary" type="button">Tambah Tag</button></a>

    <br><br>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tag as $item=> $hasil)
                <tr>
                    <td>{{$item + $tag->firstitem()}}</td>
                    <td>{{$hasil->name}}</td>
                    <td>{{$hasil->slug}}</td>
                    <td>
                        <a href="{{route('tag.edit',$hasil)}}"><button class="btn btn-warning btn-sm">Edit</button></a>
                        <form action="{{route("tag.destroy",$hasil)}}" method="post">
                            @csrf
                            @method("delete")
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection