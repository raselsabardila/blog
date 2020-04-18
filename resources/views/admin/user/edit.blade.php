@extends('templates_backend.home')
@section("sub-title","Edit User")

@section('content')
    <form action="{{route('user.update',$user)}}" method="post">
        @csrf
        @method("PATCH")
        <div class="form-group">
            <label for="name">Name : </label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}">
            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Email : </label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" readonly>
            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="permission">Permission : </label>
            <select name="type" id="" class="form-control" name="permission">
                <option value="">Pilih Permission</option>
                <option value="1" 
                    @if ($user->type == 1)
                        selected
                    @endif
                >Administrator</option>
                <option value="0"
                    @if ($user->type == 0)
                        selected
                    @endif
                >Author</option>
            </select>
            @error('type')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password : </label>
            <input type="password" class="form-control" name="password" value="{{$user->password}}"> 
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Edit Data</button>
        </div>
    </form>
@endsection