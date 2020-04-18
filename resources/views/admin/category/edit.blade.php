@extends('templates_backend.home')
@section("sub-title","Edit Category")

@section('content')
    <form action="{{route('category.update',$category)}}" method="post">
        @method("patch")
        @csrf
        <div class="form-group">
            <label for="name">Name : </label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$category->name}}">
            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Edit Data</button>
        </div>
    </form>
@endsection