<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    public function index()
    {
        return view('blogs.index', [
            'blogs' => Blog::latest()
                ->filter(request(['search', 'category', 'author'])) // testing querys
                ->paginate(6) // show 6 elements per 1 page //laravel's method
                ->withQueryString(), // add query //laravel's method
        ]);
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', [
            'blog' => $blog,
            'random' => Blog::inRandomOrder()->take(3)->get(),
            'comments' => $blog->comments()->latest()->paginate(3),
        ]);
    }

    public function subscribeHandler(Blog $blog)
    {
        if (User::find(auth()->id())->isSubscribed($blog)) {
            $blog->unSubscribe();
        } else {
            $blog->subscribe();
        }

        return back();
    }

    public function create()
    {
        return view('blogs.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store()
    {

        $formData = request()->validate([
            'title' => ['required'],
            'slug' => ['required', Rule::unique('blogs', 'slug')],
            'intro' => ['required'],
            'body' => ['required'],
            'category_id' => ['required',Rule::exists('categories','id')],
        ]);
        $formData['user_id'] = auth()->id();
        $formData['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        Blog::create($formData);

        return redirect('/')->with('success', 'Blog Create Successfull!');
    }

    public function destroy(Blog $blog)
    {
        $user = auth()->user();
        if (! $user->is_admin || $user->name !== $blog->author->name) {
            abort(403, 'You are not authorized to delete this blog.');
        }

        // Delete the blog
        $blog->delete();

        // Redirect with success message
        return redirect()->back()->with('success', 'Blog deleted successfully.');
    }
}

// specials variables
// $error $message $request
