<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $post=\App\Post::latest()->get();
        return view("blog",compact("post"));
    }
}
