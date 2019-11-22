<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ClientEvent;
use App\Client;
use App\Notification;


class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = ClientEvent::paginate(10);
        $clients = Client::all();
        $notifications = Notification::all();
        return view('events.index')->with('events',$events)
                                    ->with('clients',$clients)
                                    ->with('even',$notifications);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $events = ClientEvent::all();
        $notifications = Notification::all();
        return view('events.add')
                ->with('clients',$clients)
                ->with('events',$events)
                ->with('notifications',$notifications);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'client' => 'required',
            'notification' => 'required',
            'startDate' => 'date_format:Y-m-d',
            'frequency' => ['required','string'],
            'status' => ['required','string']
        ]);
        // Create event
        $event = new ClientEvent;
        $event->client_id = $request->input('client');
        $event->notification_id = $request->input('notification');
        $event->start_date = $request->input('startDate');
        $event->frequency = $request->input('frequency');
        $event->status = $request->input('status');
        $event->save();
        \LogActivity::addToLog(Auth::user()->firstname.' '.Auth::user()->lastname,'Event','Add');
        return redirect('/event')->with('success','Event Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = ClientEvent::find($id);
        $clients = Client::all();
        $notifications = Notification::all();
        $selected_noti = Notification::find($event->notification_id);
        $selected_client = Client::find($event->client_id);
        \LogActivity::addToLog(Auth::user()->firstname.' '.Auth::user()->lastname,'Event','View');
        return view('events.view')->with('event',$event)
                                    ->with('clients',$clients)
                                    ->with('notifications',$notifications)
                                    ->with('selected_noti',$selected_noti)
                                    ->with('selected_client',$selected_client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = ClientEvent::find($id);
        $clients = Client::all();
        $notifications = Notification::all();
        $selected_noti = Notification::find($event->notification_id);
        $selected_client = Client::find($event->client_id);
        return view('events.edit')->with('event',$event)
                                    ->with('clients',$clients)
                                    ->with('notifications',$notifications)
                                    ->with('selected_noti',$selected_noti)
                                    ->with('selected_client',$selected_client);
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
        $this->validate($request,[
            'client' => 'required',
            'notification' => 'required',
            'startDate' => 'date_format:Y-m-d',
            'frequency' => ['required','string'],
            'status' => ['required','string']
        ]);
        // Create event
        $event = ClientEvent::find($id);
        $event->client_id = $request->input('client');
        $event->notification_id = $request->input('notification');
        $event->start_date = $request->input('startDate');
        $event->frequency = $request->input('frequency');
        $event->status = $request->input('status');
        $event->save();
        \LogActivity::addToLog(Auth::user()->firstname.' '.Auth::user()->lastname,'Event','Update');
        return redirect('/event')->with('success','Event Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = ClientEvent::find($id);
        $event->delete();
        \LogActivity::addToLog(Auth::user()->firstname.' '.Auth::user()->lastname,'Event','Delete');
        return redirect('/event')->with('success','Event deleted successfully');
    }
}
