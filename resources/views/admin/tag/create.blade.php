@extends('templates_backend.home')
@section("sub-title","Tambah Tag")

@section('content')
    <form action="{{route('tag.store')}}" method="post">
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
            <button type="submit" class="btn btn-primary btn-block">Tambah Data</button>
        </div>
    </form>
@endsection