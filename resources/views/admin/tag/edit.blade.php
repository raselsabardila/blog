@extends('templates_backend.home')
@section("sub-title","Edit Data")

@section('content')
    <form action="{{route('tag.update',$tag)}}" method="post">
        @method("patch")
        @csrf
        <div class="form-group">
            <label for="name">Name : </label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$tag->name}}">
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