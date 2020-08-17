<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\user\category;
use App\Model\user\Post;
use App\Model\user\tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function index()
    {
        $posts = post::all();

        return view('admin.post.show', compact('posts'));
    }

    public function create()
    {
        if (Auth::user()->can('posts.create')) {
            $tags = tag::all();
            $categories = category::all();

            return view('admin.post.post', compact('tags', 'categories'));
        }
        return redirect(route('admin.home'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'subtitle'=>'required',
            'slug'=>'required',
            'body'=>'required',
        ]);

            $post = new post;
            $post->title = $request->title;
            $post->subtitle = $request->subtitle;
            $post->status = $request->status;
            $post->slug = $request->slug;
            $post->body = $request->body;
            $post->save();

            $post->tags()->sync($request->tags);
            $post->categories()->sync($request->categories);

        return redirect(route('post.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        if (Auth::user()->can('posts.update'))
        {
            $post = post::with('tags', 'categories')->where('id', $id)->first();
            $tags = tag::all();
            $categories = category::all();
            return view('admin.post.edit', compact('tags', 'categories', 'post'));
        }
        return redirect(route('admin.home'));

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=>'required',
            'subtitle'=>'required',
            'slug'=>'required',
            'body'=>'required',
        ]);

        $post = post::find($id);
        $post->title = $request->title;
        $post->subtitle = $request->subtitle;
        $post->slug = $request->slug;
        $post->body = $request->body;
        $post->save();

        $post->tags()->sync($request->tags);
        $post->categories()->sync($request->categories);

        return redirect(route('post.index'));
    }

    public function destroy($id)
    {
         post::where('id', $id)->delete();
         return redirect()->back();
    }
}
