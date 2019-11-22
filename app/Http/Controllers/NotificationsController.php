<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notifications = Notification::paginate(10);
        return view('notifications.index')->with('notifications',$notifications);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notifications.add');
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
            'notiName' => 'required',
            'notiType' => 'required',
            'notiStatus' => 'required',
        ]);
        // Create client
        $notification = new Notification;
        $notification->name = $request->input('notiName');
        $notification->type = $request->input('notiType');
        $notification->status = $request->input('notiStatus');
        $notification->save();
        \LogActivity::addToLog(Auth::user()->firstname.' '.Auth::user()->lastname,'Notification','Add');
        return redirect('/notification')->with('success','Notification Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $notification = Notification::find($id);
        \LogActivity::addToLog(Auth::user()->firstname.' '.Auth::user()->lastname,'Notification','View');
        return view('notifications.view')->with('notification',$notification);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $notification = Notification::find($id);
        return view('notifications.edit')->with('notification',$notification);
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
            'notiName' => 'required',
            'notiType' => 'required',
            'notiStatus' => 'required',
        ]);
        // Create client
        $notification = Notification::find($id);
        $notification->name = $request->input('notiName');
        $notification->type = $request->input('notiType');
        $notification->status = $request->input('notiStatus');
        $notification->save();
        \LogActivity::addToLog(Auth::user()->firstname.' '.Auth::user()->lastname,'Notification','Update');
        return redirect('/notification')->with('success','Notification Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $notification = Notification::find($id);
        $notification->delete();
        \LogActivity::addToLog(Auth::user()->firstname.' '.Auth::user()->lastname,'Notification','Delete');
        return redirect('/notification')->with('success','Notification deleted successfully');
    }
}
