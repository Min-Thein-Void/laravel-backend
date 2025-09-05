<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{
    function index()
    {
        return view('blogs.index', [
            'blogs' => Blog::latest()
                            ->filter(request(['search','category','author']))//testing querys
                            ->paginate(6)//show 6 elements per 1 page //laravel's method
                            ->withQueryString()//add query //laravel's method
        ]);
    }

    function show(Blog $blog)
    {
        return view('blogs.show', [
            'blog' => $blog,
            'random' => Blog::inRandomOrder()->take(3)->get()
        ]);
    }
}

//specials variables
// $error $message $request
