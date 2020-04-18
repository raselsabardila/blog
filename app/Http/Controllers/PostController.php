<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth; 

class PostController extends Controller
{

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post=Post::paginate(5);
        return view("admin.post.index",compact("post"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag=Tag::all();
        $category=\App\Category::all();
        return view("admin.post.create",compact("category","tag"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "judul"=>"required",
            "kategori_id"=>"required",
            "content"=>"required",
            "gambar"=>"required",
        ]);

        $file=$request->file("gambar");
        $nama_file=$file->getClientOriginalName();
        $extension=$file->getClientOriginalExtension();
        $ukuran=$file->getSize();
        $format=["jpg","jpeg","png","svg","gif","mp4","pdf"];

        $destination='uploads/post';
        $nama_file_split=explode(".",$nama_file);
        $nama_file_split[0]=uniqid($nama_file_split[0]);
        if(!in_array($nama_file_split[1],$format)){
            return redirect()->route("post.index")->with("status","Format file tidak mendukung");
        }
        $namaasli="";
        $namaasli .= $nama_file_split[0];
        $namaasli .= ".";
        $namaasli .= $nama_file_split[1];

        $file->move($destination,$namaasli);

        $post=Post::create([
            "judul"=>$request->judul,
            "kategori_id"=>$request->kategori_id,
            "content"=>$request->content,
            "gambar"=>$namaasli,
            "slug"=>Str::slug($request->judul),
            "user_id"=>Auth::id()
        ]);

        $post->tag()->attach($request->tag);

        return redirect()->route("post.index")->with("status","Data Berhasil Di Tambahkan!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $category=\App\Category::all();
        $tag=\App\Tag::all();
        return view("admin.post.edit",["post"=>$post,"category"=>$category,"tag"=>$tag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            "judul"=>"required",
            "kategori_id"=>"required",
            "content"=>"required",
        ]);

        if ($request->has("gambar")) {
            $file=$request->file("gambar");
            $nama_file=$file->getClientOriginalName();
            $extension=$file->getClientOriginalExtension();
            $ukuran=$file->getSize();
            $format=["jpg","jpeg","png","svg","gif","mp4","pdf"];

            $destination='uploads/post';
            $nama_file_split=explode(".",$nama_file);
            $nama_file_split[0]=uniqid($nama_file_split[0]);
            if(!in_array($nama_file_split[1],$format)){
                return redirect()->route("post.index")->with("status","Format file tidak mendukung");
            }
            $namaasli="";
            $namaasli .= $nama_file_split[0];
            $namaasli .= ".";
            $namaasli .= $nama_file_split[1];   

            $file->move($destination,$namaasli);

            $post_data=[
                "judul"=>$request->judul,
                "kategori_id"=>$request->kategori_id,
                "content"=>$request->content,
                "gambar"=>$namaasli,
                "slug"=>Str::slug($request->judul)
            ];
        }

        else{
            $post_data=[
                "judul"=>$request->judul,
                "kategori_id"=>$request->kategori_id,
                "content"=>$request->content,
                "slug"=>Str::slug($request->judul)
            ];
        }

        $post->tag()->sync($request->tag);

        $post->update($post_data);

        return redirect()->route("post.index")->with("status","Data Berhasil di Update!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route("post.index")->with("status","Data Berhasil di Hapus!!");
    }

    public function tampilhapus(){
        $post=Post::onlyTrashed()->paginate(5);
        return view("admin.post.hapus",["post"=>$post]);
    }

    public function restore($id){
        $post=Post::withTrashed()->where("id",$id)->first();
        $post->restore();

        return redirect()->route("post.index")->with("status","Data Berhasi Di Restore");
    }

    public function kill($id){
        $post=Post::withTrashed()->where("id",$id)->first();
        $post->forceDelete();
        return redirect()->route("post.recycle")->with("status","Data Berhasi Di hapus Secara Permanen");
    }
}
