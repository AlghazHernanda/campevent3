<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventType;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DasboardEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('myevent', [
            'events' => Event::latest()->where('user_id', auth()->user()->id)->get(), //dimana user_id nya sama kyk user id yang login
            // 'themes' => Event::where('eventTheme')
            'payments' => Payment::latest()->where('user_id', auth()->user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registerevent', [
            'eventTypes' => EventType::all()
        ]);
    }

    public function welcomeShow()
    {
        return view('welcome', [
            "events" => Event::latest("date")->paginate(4)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'eventType' => 'required',
            'eventTheme' => 'required',
            // 'slug' => 'required|unique:posts',
            'image' => 'image|file|max:1024|required', //maksudnya maksimal file nya 1024 kilobyte ata 1 mb
            'desc' => 'required',
            'date' => 'required',
            'speaker' => 'required',
            'price' => 'required',
            'no_hp' => 'required',
            // 'published_at' => 'required',
        ]);

        // //logika untuk multi checkbox agar bentuk nya string berkoma
        // if (!empty($request->input('eventTheme'))) {
        //     $validatedData['eventTheme'] = join(',', $request->input('eventTheme'));
        // } else {
        //     $validatedData['eventTheme'] = '';
        // }

        //logika untuk mulit checkbox untuk masukin ke database dalam bentuk array
        //$validatedData['eventTheme'] = serialize($request['eventTheme']);

        //jika ada gambar yang di upload
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images'); //maka simpan di dalam storage/app/post-images
        }

        //heroku production
        // if ($request->hasfile('image')) {
        //     $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('image')->getClientOriginalName());
        //     $request->file('image')->move(public_path('images'), $filename);
        // }
        // $validatedData['image'] = $filename;


        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['category_id'] = $validatedData['eventType'];
        //$validatedData['published_at'] = $validatedData['created_at'];


        //dd($validatedData);



        Event::create($validatedData);

        return redirect('/myevent')->with('success', 'New Event has Been Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event, EventType $eventType)
    {
        //catatan join table manual 
        // $event_type_name = $event::join('event_types', 'events.eventType', '=', 'event_types.id')
        //     ->get(['events.*', 'event_types.name']);

        // ddd($event_type_name);

        //agar bisa dipanggil diview, sudah di join table lewat model
        $event_type_name = Event::find(1);

        return view('eventdetail', [
            'event' => $event,
            'eventType' => $eventType,

        ]);
    }

    public function showPaymentEvent(Event $event)
    {
        return view('payment', [
            'event' => $event
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('editEvent', [
            'event' => $event,
            'eventTypes' => EventType::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $rules = [
            'title' => 'required|max:255',
            'eventType' => 'required',
            'eventTheme' => 'required',
            // 'slug' => 'required|unique:posts',
            'image' => 'image|file|max:1024|required', //maksudnya maksimal file nya 1024 kilobyte ata 1 mb
            'desc' => 'required',
            'date' => 'required',
            'speaker' => 'required',
            'price' => 'required',
            'no_hp' => 'required',
            // 'published_at' => 'required',
        ];

        $validatedData = $request->validate($rules);

        // //logika untuk multi checkbox
        // if (!empty($request->input('eventTheme'))) {
        //     $validatedData['eventTheme'] = join(',', $request->input('eventTheme'));
        // } else {
        //     $validatedData['eventTheme'] = '';
        // }

        //jika ada gambar yang di upload
        if ($request->file('image')) {
            // ika ada image lama, maka mendelete image lama
            //$validatedData['image'] = $request->file('image')->store('post-images'); //maka simpan di dalam post-images

            // $validatedData['image']  = $request->file('image');
            // $validatedData['image']->storeAs('/article/img',  $validatedData['image']->hashName(), 'public');
            $filename = round(microtime(true) * 1000) . '-' . str_replace(' ', '-', $request->file('image')->getClientOriginalName());
            $request->file('image')->move(public_path('images'), $filename);
            $validatedData['image'] = $filename;
        }

        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['category_id'] = $validatedData['eventType'];

        Event::where('id', $event->id)->update($validatedData);

        return redirect('/myevent')->with('success', 'Event has Been Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //untuk mendelete image lama
        if ($event->image) {
            Storage::delete($event->image);
        }
        Event::destroy($event->id);

        return redirect('/myevent')->with('success', 'event has Been deleted');
    }
}
