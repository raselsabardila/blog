@extends('templates_backend.home')
@section("sub-title","Tambah Post")

@section('content')

    <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="judul">Judul : </label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul">
            @error('judul')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="kategori_id">Kategori : </label>
            <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror" id="">
                    <option value="" holder>Pilih Kategori</option>
                @foreach ($category as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            @error('kategori')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label>Pilih Tag :</label>
            <select class="form-control select2" multiple="" name="tag[]">
                @foreach ($tag as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="judul">Content : </label>
            <textarea name="content" id="" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror"></textarea>
            @error('content')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <div class="form-group">
                <label for="thumbnail">Thumbnail : </label>
                <input type="file" class="form-control @error('thumbnail') is-invalid @enderror" name="gambar">
                @error('thumbnail')
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