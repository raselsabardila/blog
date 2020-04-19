<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $post=\App\Post::latest()->get();
        return view("blog",compact("post"));
    }

    public function show($slug){
        $post=\App\Post::where("slug",$slug)->get();
        return view("blog.isi_post",compact("post"));
    }
}
