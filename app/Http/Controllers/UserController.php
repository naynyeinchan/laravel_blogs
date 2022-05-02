<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('dashboard',compact('users'));
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
        $user = User::find($id);
        return view('users.edit',compact('user'));
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

        $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email'],
        ]);
        if ($request->password != null || $request->confirmpassword != null){
            $request->validate([
                'password' => 'required',
                'confirmpassword' => 'required|same:password',
            ]);
            User::find($id)->update([
                'password' => Hash::make($request->confirmpassword)
            ]);
        }
        if ($request->file != null){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            User::find($id)->update([
                'img'=>$filename,
            ]);
        }
        User::find($id)->update([
            'name'=> $request->name,
            'email'=>$request->email,
        ]);



        return redirect()->route('users.index');
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

    public function banuser($id){
        $user = User::find($id);
        return view('users.ban',compact('user'));
    }

    public function ban(Request $request,$id){
        $request->validate([
            'bandate' => ['required', 'string'],
        ]);
        $time = strtotime($request->bandate);
        $newformat = date('Y-m-d',$time);

        User::find($id)->update([
            'banned_until'=> $newformat,
        ]);
        return redirect()->route('users.index');
    }
    public function unban(Request $request,$id){

        User::find($id)->update([
            'banned_until'=> null,
        ]);
        return redirect()->route('users.index');
    }

}

