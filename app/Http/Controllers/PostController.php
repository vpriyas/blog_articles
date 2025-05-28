<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

   /*  public function create()
    {
        return view('posts.create');
    } */
	
	public function create()
	{
		$categories = Category::all();
		return view('posts.create', compact('categories'));
	}

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
			'category_id' => 'required'
        ]);

        Post::create($request->all());

        return redirect()->route('posts.index')
                         ->with('success', 'Post created successfully.');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /* public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    } */
	
	public function edit(Post $post)
	{
		$categories = Category::all();
		return view('posts.edit', compact('post', 'categories'));
	}
	
	

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'body' => 'required',
			'category_id' => 'required',
        ]);

        $post->update($request->all());

        return redirect()->route('posts.index')
                         ->with('success', 'Post updated successfully');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')
                         ->with('success', 'Post deleted successfully');
    }
	
	public function categoryPosts($id)
{
    $category = Category::findOrFail($id);
    $posts = $category->posts;
    return view('posts.index', compact('posts'));
}

}




