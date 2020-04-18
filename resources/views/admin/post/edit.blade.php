@extends('templates_backend.home')
@section("sub-title","Edit Post")

@section('content')

    <form action="{{route('post.update',$post)}}" method="post" enctype="multipart/form-data">
        @method("PATCH")
        @csrf
        <div class="form-group">
            <label for="judul">Judul : </label>
            <input type="text" class="form-control @error('judul') is-invalid @enderror" name="judul" value="{{$post->judul}}">
            @error('judul')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="kategori_id">Kategori : </label>
            <select name="kategori_id" class="form-control @error('kategori_id') is-invalid @enderror" id="">
                @foreach ($category as $item)
                    <option value="{{$item->id}}"
                        @if ($item->id == $post->kategori_id)
                            selected
                        @endif    
                    >{{$item->name}}</option>
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
            <select class="form-control select2" multiple="" name="tag[]" style="width:100%">
                @foreach ($tag as  $item)
                    <option value="{{$item->id}}" 
                    @foreach ($post->tag as $item2)
                        @if ($item->id == $item2->id)
                            selected
                        @endif
                    @endforeach    
                    >{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="judul">Content : </label>
            <textarea name="content" id="" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror">{{$post->content}}</textarea>
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
        <button type="submit" class="btn btn-primary btn-block">Edit Data</button>
        </div>
    </form>
@endsection