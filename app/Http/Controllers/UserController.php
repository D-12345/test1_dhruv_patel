<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user_create');
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
        $request->validate([
            'firstname'=> 'required',
            'lastname'=> 'required',
            'email'=> 'required|email|unique:users',
            'contact_number'=>'required|unique:users',
            'city'=>'required',
            'gender'=>'required',
            
            'profile_photo' => 'required|mimes:jpeg,bmp,png|max:1048',
            'status'=> 'required'
        ]);
        $newImageName= time(). '.' . $request->profile_photo->getClientOriginalName();
        $request->profile_photo->move(public_path('dist/images'),$newImageName);
        $data = User::create([
            'firstname'=>$request->input('firstname'),
            'lastname'=>$request->input('lastname'),
            'email'=>$request->input('email'),
            'contact_number'=>$request->input('contact_number'),
            'city'=>$request->input('city'),
            'gender'=>$request->input('gender'),
            'age'=>$request->input('age'),
            'profile_photo'=>$newImageName,
            'status'=>$request->input('status')
        ]);
        return redirect('list');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $record=User::all();
        return view('user_list',['users'=>$record]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user ,$id)
    {
        $data = User::find($id);
        return view('user_edit', ['data'=>$data]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data= User::find($request->id);
        $request->validate([
            'firstname'=> 'required',
            'lastname'=> 'required',
            'email'=> 'required|email',
            'contact_number'=>'required',/*|numeric|max:14|regex:/^[\d\(\)\-+]+$/',*/
            'city'=>'required',
            /*'password'=> 'required|alpha_num|max:15|min:8',*/
            'gender'=>'required',
            
            'profile_photo' => 'required|mimes:jpeg,bmp,png|max:1048',
            'status'=> 'required'
        ]);
        
        $data->firstname=$request->firstname;
        $data->lastname=$request->lastname;
        $data->email=$request->email;
        $data->contact_number=$request->contact_number;
        $data->city=$request->city;
        $data->gender=$request->gender;
        $data->age=$request->age;

        if($request->hasFile('profile_photo')){
            $newImageName= time(). '.' . $request->profile_photo->getClientOriginalName();
            $request->profile_photo->move(public_path('dist/images'),$newImageName);
            $data->profile_photo= $newImageName;
        }

        $data->status=$request->status;
        $data->save();
        return redirect('list');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect('list');

    }
}
