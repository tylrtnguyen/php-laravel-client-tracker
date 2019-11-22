<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Client;
use App\ClientEvent;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::paginate(10);
        return view('clients.index')->with('clients',$clients);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.add');
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
            'comName' => 'required',
            'busiNum' => 'required',
            'cellNum' => 'required',
            'fName' => 'required',
            'lName' => 'required',
            'comWeb' => 'required',
        ]);
        // Create client
        $client = new Client;
        $client->company_name = $request->input('comName');
        $client->business_number = $request->input('busiNum');
        $client->cell_number = $request->input('cellNum');
        $client->firstname = $request->input('fName');
        $client->last_name = $request->input('lName');
        $client->status = $request->input('status');
        $client->website = $request->input('comWeb');
        $client->save();
        \LogActivity::addToLog(Auth::user()->firstname.' '.Auth::user()->lastname,'Client','Add');
        return redirect('/client')->with('success','Client Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
        \LogActivity::addToLog(Auth::user()->firstname.' '.Auth::user()->lastname,'Client','View');
        return view('clients.view')->with('client',$client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::find($id);
        return view('clients.edit')->with('client',$client);
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
            'comName' => 'required',
            'busiNum' => 'required',
            'cellNum' => 'required',
            'fName' => 'required',
            'lName' => 'required',
            'comWeb' => 'required',
        ]);
         // Update client
         $client = Client::find($id);
         $client->company_name = $request->input('comName');
         $client->business_number = $request->input('busiNum');
         $client->cell_number = $request->input('cellNum');
         $client->firstname = $request->input('fName');
         $client->last_name = $request->input('lName');
         $client->status = $request->input('status');
         $client->website = $request->input('comWeb');
         $client->save();
         \LogActivity::addToLog(Auth::user()->firstname.' '.Auth::user()->lastname,'Client','Update');
         return redirect('/client')->with('success','Client Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        \LogActivity::addToLog(Auth::user()->firstname.' '.Auth::user()->lastname,'Client','Delete');
        return redirect('/client')->with('success','Client Removed');
    }
}
