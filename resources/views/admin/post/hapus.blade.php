@extends('templates_backend.home')
@section('sub-judul','Recycle')
@section('content')
	@if (session('status'))
	<div class="alert alert-success">
		{{session('status')}}
	</div>
	@endif

	<table class="table table-striped table-hover table-sm table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Post</th>
				<th>Kategori</th>
				<th>Tag</th>
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
				<td><img src="{{asset("uploads/post/$hasil->gambar")}}" width="70px" alt="gambar"></td>
				<td>
					<a href="{{route("post.restore",$hasil->id)}}" class="btn btn-primary btn-sm">Restore</a>
					<form action="{{ route('post.kill', $hasil->id )}}" method="POST">
						@csrf
						@method('delete')
					<button type="submit" class="btn btn-danger btn-sm">Delete</button>
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
    {{ $post->links() }}
    
    @endsection
