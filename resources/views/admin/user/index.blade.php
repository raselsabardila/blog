@extends('templates_backend.home')

@section('sub-title',"User")

@section('content')
    @if (session("status"))
        <div class="alert alert-success" role="alert">
            {{session("status")}}
        </div>
    @endif

    <a href="{{route('user.create')}}"><button class="btn btn-primary" type="button">Tambah User</button></a>

    <br><br>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Permission</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $item=> $hasil)
                <tr>
                    <td>{{$item + $user->firstitem()}}</td>
                    <td>{{$hasil->name}}</td>
                    <td>{{$hasil->email}}</td>
                    <td>
                        @if ($hasil->type)
                            <span class="badge badge-primary">Administrator</span>
                        @else
                        <span class="badge badge-warning">Author</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('user.edit',$hasil)}}"><button class="btn btn-warning btn-sm">Edit</button></a>
                        <form action="{{route("user.destroy",$hasil->id)}}" method="post">
                            @csrf
                            @method("delete")
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{$user->links()}}
@endsection