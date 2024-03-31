<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        return response()->json([
            'success' => true,
            'message' => 'List of all blogs',
            'data' => $blogs
        ]);
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $blog = Blog::find($id);
        return response()->json([
            'success' => true,
            'message' => 'Blog details',
            'data' => $blog
        ]);
    }
    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
