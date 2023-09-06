<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::limit(10)->get();
        return view('index', compact("blogs"));
    }

    public function create()
    {
        return view("create");
    }

    public function store(BlogStoreRequest $request)
    {
        $blog_data = $request->validated();
        $chemin_image = $blog_data['picture']->store("images");
        $blog_data['picture'] = $chemin_image;
        Blog::create($blog_data);

        return redirect( route('blog.index'));
    }

    public function show(Blog $blog)
    {
        return view('show', compact('blog'));
    }

    public function edit(Blog $blog)
    {
        return view("create", compact('blog'));
    }

    public function update(BlogUpdateRequest $request, Blog $blog)
    {
        $request_data = $request->validated();
        if ($request->has('picture')){
            Storage::delete($blog->picture);
            $image_path = $request->picture->store("images");
            $request_data['picture'] = $image_path;
        }
        $blog->update($request_data);
    }
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect(route('blog.index'));
    }
}
