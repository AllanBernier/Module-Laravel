<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    public function index()
    {
        return Blog::paginate(10);
    }

    public function create()
    {
        return view("create");
    }

    public function store(BlogStoreRequest $request)
    {
        dd("Storing blog");
        $chemin_image = $request->picture->store("posts");

        Blog::create($request->validated());
    }

    public function show(Blog $blog)
    {
        //
    }

    public function edit(Blog $blog)
    {
        //
    }

    public function update(BlogUpdateRequest $request, Blog $blog)
    {
        $blog->update($request->validated());
    }
    public function destroy(Blog $blog)
    {
        $blog->delete();
    }
}
