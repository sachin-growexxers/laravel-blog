<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function sendMail(Request $request)
    {
        $details = [
            'title' => 'Registration Details',
            'body' => 'This is sample content we have added for this test mail'
        ];

        Mail::to('sachin.sharma@growexx.com')->send(new TestMail($details));
        return "EMail Sent";
        // $data = array(
        //                 'name'=> "Our Code World",
        //                 'username' => $request->name,
        //                 'email' => $request->email,
        //                 'password' => $request->password
        //             );

        // // Path or name to the blade template to be rendered
        // $template_path = 'emails.template';

        // Mail::send($template_path, $data, function($message) {

        //     // Set the receiver and subject of the mail.
        //     $message->to('sachin.sharma@growexx.com', 'noreply')->subject('Registration Details');

            // Set the sender
            //$message->from('sachin.sharma@growexx.com','Our Code World');
        //});
    }
}
