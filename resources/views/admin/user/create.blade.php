@extends('templates_backend.home')
@section("sub-title","Tambah User")

@section('content')
    <form action="{{route('user.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name : </label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">
            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Email : </label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email">
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
                <option value="1">Administrator</option>
                <option value="0">Author</option>
            </select>
            @error('type')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password : </label>
            <input type="password" class="form-control" name="password"> 
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Tambah Data</button>
        </div>
    </form>
@endsection