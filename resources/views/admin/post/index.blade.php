@extends('templates_backend.home')
@section('sub-judul','Post')
@section('content')
	@if (session('status'))
	<div class="alert alert-success">
		{{session('status')}}
	</div>
	@endif

	<a href="{{ route('post.create') }}" class="btn btn-info btn-sm">Tambah Post</a>
	<br><br>

	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Post</th>
				<th>Kategori</th>
				<th>Tag</th>
				<th>Author</th>
				<th>Gambar</th>
                <th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($post as $result =>$hasil)
			<tr>
				<td>{{ $result + $post->firstitem() }}</td>
				<td>{{ $hasil->judul }}</td>
				<td>{{ $hasil->category->name}}</td>
				<td>
					@foreach ($hasil->tag as $item2)
				<span class="badge badge-primary">{{$item2->name}}</span>
					@endforeach
				</td>
				<td>{{$hasil->user->name}}</td>
				<td><img src="{{asset("uploads/post/$hasil->gambar")}}" width="70px" alt="gambar"></td>
				@if (Auth::user()->id == $hasil->user->id)
					<td>
						<a href="{{ route('post.edit', $hasil ) }}" class="btn btn-primary btn-sm">Edit</a>
						<form action="{{ route('post.destroy', $hasil )}}" method="POST">
							@csrf
							@method('delete')
						<button type="submit" class="btn btn-danger btn-sm">Delete</button>
						</form>
					</td>
				@endif
			</tr>
			@endforeach
		</tbody>
	</table>
    {{ $post->links() }}
    
    @endsection
