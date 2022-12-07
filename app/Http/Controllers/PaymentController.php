<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Event;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('payment');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Event $event)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'event_title' => 'required',
            'event_date' => 'required',
            'event_price' => 'required',
            'email' => 'required|email:dns',
            // // 'slug' => 'required|unique:posts',
            'image' => 'image|file|max:1024|required', //maksudnya maksimal file nya 1024 kilobyte ata 1 mb
            //'rekening' => 'required',

        ]);

        $validatedData['rekening'] = "4123778583775834";
        $validatedData['user_id'] = auth()->user()->id;

        //untuk stagging, sebelum deploy
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images'); //maka simpan di dalam storage/app/post-images
        }

        //heroku production
        // if ($request->hasfile('image')) {
        //     $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('image')->getClientOriginalName());
        //     $request->file('image')->move(public_path('images'), $filename);
        // }

        //$validatedData['image'] = $filename;
        //dd($validatedData);

        Payment::create($validatedData);

        return redirect('/')->with('success', 'New Event has Been Added');
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
