<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\user\tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('can:posts.tag');
    }

    public function index()
    {
        $tags = tag::all();

        return view('admin.tag.show', compact('tags'));
    }

    public function create()
    {
        return view('admin.tag.tag');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'tag' => 'required',
            'slug' => 'required'
        ]);

        $tag = new tag;
        $tag->tag = $request->tag;
        $tag->slug = $request->slug;

        $tag->save();

        return redirect(route('tag.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $tag = tag::where('id', $id)->first();

        return view('admin.tag.edit', compact('tag'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tag'=>'required',
            'slug'=>'required',
        ]);

        $tag = tag::find($id);
        $tag->tag = $request->tag;
        $tag->slug = $request->slug;
        $tag->save();

        return redirect(route('tag.index'));

    }

    public function destroy($id)
    {
        tag::where('id', $id)->delete();
        return redirect()->back();
    }
}
