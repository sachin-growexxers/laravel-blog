<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $keyword = $request->get('search');
        $perPageRecord = 3;

        if(!empty($keyword))
        {
            $posts = Post::select('id', 'title', 'slug' , 'excerpt' , 'body' , 'thumbnail' , 'created_at')  ->latest()
            ->where([
                    'deleted_at' => null,
                    'user_id' => Session()->get('user_id')
                ])
            ->Where('title' , 'LIKE' , "%$keyword%")
            ->orWhere('slug', 'LIKE' , "%$keyword%")
            ->orWhere('excerpt', 'LIKE' , "%$keyword%")
            ->orWhere('body', 'LIKE' , "%$keyword%")
            ->paginate($perPageRecord);
        }
        else
        {
            $posts = Post::select('id', 'title', 'slug' , 'excerpt' , 'body' , 'thumbnail' , 'created_at')
            ->latest()
            ->where([
                    'deleted_at' => null,
                    'user_id' => Session()->get('user_id')
                ])
            ->paginate($perPageRecord);
        }
        
        return view('dashboard', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5|max:255',
            'slug' => 'required|min:5|max:255',
            'excerpt' => 'required|min:5|max:255',
            'body' => 'required|min:5|max:500',
            'thumbnail' => 'required|image'
        ]);

        if($validator->fails())
        {
            return redirect('/dashboard')
                ->withInput()
                ->withErrors($validator);
        }

        Post::create([
            'user_id' => Session::get('user_id'),
            'title' => $request->title,
            'slug' => $request->slug,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'thumbnail' => $request->file('thumbnail')->store('thumbnails')
        ]);

        return redirect('/dashboard')->with('flash', "Blog added successfully.!!!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $post = Post::findOrfail($id);
        return view('show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::findOrfail($id);
        return view('update', [
            'post' => $post
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5|max:255',
            'slug' => 'required|min:5|max:255',
            'excerpt' => 'required|min:5|max:255',
            'body' => 'required|min:5|max:500',
            'thumbnail' => 'image|nullable'
        ]);

        if($validator->fails())
        {
            return redirect('/post/edit' . $id)
                ->withInput()
                ->withErrors($validator);
        }

        if(($request->thumbnail != $request->oldThumbnail) && $request->thumbnail !='')
        {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails');
        }
        else
        {
            $thumbnailPath = $request->oldThumbnail;
        }

        Post::where('id' , $id)->update([
            'user_id' => Session()->get('user_id'),
            'title' => $request->title,
            'slug' => $request->slug,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'thumbnail' => $thumbnailPath
        ]);

        return redirect('/dashboard')->with('flash', "Blog updated successfully.!!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::findOrfail($id)->delete();

        if($post)
        {
           return redirect('/dashboard')->with('flash', "Blog deleted successfully.!!");
        }
        else
        {
            return redirect('/dashboard')->with('flash', "Sorry, blog unable to delete.!!");
        }
    }
}
