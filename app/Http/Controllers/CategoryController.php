<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
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
        $page = $request->get('page');

        DB::enableQueryLog();

        if(!empty($keyword))
        {
            $posts = Post::select('id', 'title', 'slug' , 'excerpt' , 'body' , 'thumbnail' , 'created_at')
                        ->latest()
                        ->Where('title' , 'LIKE' , "%". $keyword. "%")
                        ->orWhere('slug', 'LIKE' , "%". $keyword. "%")
                        ->orWhere('excerpt', 'LIKE' , "%". $keyword. "%")
                        ->orWhere('body', 'LIKE' , "%". $keyword. "%")
                        ->where([
                            'category_id' => $request->id,
                            'user_id' => Session::get('user_id')
                        ])
                        ->paginate(3);
                        if(!empty($keyword))
                        {
                            $posts->appends( array(
                                'search' => $keyword
                            ));
                        }
            dd(DB::getQueryLog());
                        
        }
        else
        {
            $posts = Post::select('id', 'title', 'slug' , 'excerpt' , 'body' , 'thumbnail' , 'created_at')
                        ->latest()
                        ->where([
                            'category_id' => $request->id,
                            'user_id' => Session::get('user_id')
                        ])
                        ->paginate(3);
        }
        
        $categories = Category::all()
                    ->where('deleted_at', null);
        return view('dashboard', [
            'posts' => $posts,
            'categories' => $categories
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
    }
}
