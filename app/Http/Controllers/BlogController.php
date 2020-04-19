<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $category=\App\Category::all();
        $post=\App\Post::latest()->take(8)->get();
        return view("blog",compact("post","category"));
    }

    public function show($slug){
        $category=\App\Category::all();
        $post=\App\Post::where("slug",$slug)->get();
        return view("blog.isi_post",compact("post","category"));
    }

    public function list(){
        $category=\App\Category::all();
        $post=\App\Post::latest()->paginate(6);
        return view("blog.list",compact("post","category"));
    }

    public function listkategori($id){
        $category=\App\Category::all();
        $post=\App\Post::where("kategori_id",$id)->paginate(6);
        return view("blog.list",compact("post","category"));
    }

    public function cari(request $request){
        $category=\App\Category::all();
        $post=\App\Post::where("judul",$request->search)->orWhere("judul","like","%".$request->search."%")->paginate(6);
        return view("blog.list",compact("post","category"));
    }
}
