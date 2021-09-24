<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_id = Session::get('user_id');
        $user = DB::table('users')
                        ->select('id', 'name', 'email', 'user_thumbnail', 'created_at')
                ->where([
                        'deleted_at' => null,
                        'id' => Session::get('user_id')
                    ])
                ->first();
       // dd($user);
        return view('users.profile', [
            'user' => $user
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:5|max:20',
            'user_thumbnail' => 'image|nullable'
        ]);

        if($validator->fails())
        {
            return redirect('profile')
                ->withInput()
                ->withErrors($validator);
        }

        if(($request->user_thumbnail != $request->oldThumbnail) && $request->user_thumbnail !='')
        {
            $thumbnailPath = $request->file('user_thumbnail')->store('thumbnails');
        }
        else
        {
            $thumbnailPath = $request->oldThumbnail;
        }

        
        $user = User::where('id' , $id)->update([
            'name' => $request->name,
            'user_thumbnail' => $thumbnailPath
        ]);

        return redirect('/profile')->with('flash', "Profile updated successfully.!!!");
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
