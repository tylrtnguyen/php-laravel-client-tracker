<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get a list of users who are not Manager
        $users = User::where([['position','!=','Manager']])->paginate(10);
        return view('users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.add');
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
            'fName' => ['required', 'string', 'max:255'],
            'lName' => ['required','string','max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'user_name' => ['required', 'string', 'max:255', 'unique:users'],
            'cell_number' => ['required','digits:10'],
            'position' => 'required',
            'address'=> 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'image' => 'image|nullable|max:1999'
        ]);
        // Handle file upload
        if($request->hasFile('image')){
            // Get file name with extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get file name only
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            // Get just image extension
            $extension = $request->file('image')->getClientOriginalExtension();
            // Create file name to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            // Upload image
            $path = $request->file('image')->storeAs('public/user_images',$filenameToStore);
        }else{
            $filenameToStore = 'default_image.jpg';
        }
        // Create user
        $user = new User;
        $user->firstname = $request->input('fName');
        $user->lastname = $request->input('lName');
        $user->email = $request->input('email');
        $user->cell_number = $request->input('cell_number');
        $user->password = Hash::make($request->input('password'));
        $user->position = $request->input('position');
        $user->status = 'Active';
        $user->address = $request->input('address');
        $user->user_name = $request->input('user_name');
        $user->profile_picture = $filenameToStore;
        $user->save();
        \LogActivity::addToLog(Auth::user()->firstname.' '.Auth::user()->lastname,'User','Add');
        return redirect('/user')->with('success','User Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        \LogActivity::addToLog(Auth::user()->firstname.' '.Auth::user()->lastname,'User','View');
        return view('users.view')->with('user',$user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit')->with('user',$user);
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
            'fName' => ['required', 'string', 'max:255'],
            'lName' => ['required','string','max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'user_name' => ['required', 'string', 'max:255'],
            'cell_number' => ['required','digits:10'],
            'position' => 'required',
            'address'=> 'required',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'status' => ['required'],
            'image' => 'image|nullable|max:1999'
        ]);
        // Handle file upload
        if($request->hasFile('image')){
            // Get file name with extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get file name only
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            // Get just image extension
            $extension = $request->file('image')->getClientOriginalExtension();
            // Create file name to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            // Upload image
            $path = $request->file('image')->storeAs('public/user_images',$filenameToStore);
        }else{
            $filenameToStore = 'default_image.jpg';
        }

        // Create user
        $user = User::find($id);
        $user->firstname = $request->input('fName');
        $user->lastname = $request->input('lName');
        $user->email = $request->input('email');
        $user->cell_number = $request->input('cell_number');
        $user->password = Hash::make($request->input('password'));
        $user->position = $request->input('position');
        $user->status = $request->input('status');
        $user->address = $request->input('address');
        $user->user_name = $request->input('user_name');
        $user->profile_picture = $filenameToStore;
        $user->save();
        $ip = $request->ip();
        \LogActivity::addToLog(Auth::user()->firstname.' '.Auth::user()->lastname,'User','Update');
        return redirect('/user')->with('success','User Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        \LogActivity::addToLog(Auth::user()->firstname.' '.Auth::user()->lastname,'User','Delete');
        return redirect('/user')->with('success','User Removed');
    }
}
