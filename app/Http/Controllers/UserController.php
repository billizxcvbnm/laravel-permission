<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use Illuminate\Support\Facades\Auth;
class UserController extends Controller
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
    public function edit(Request $request, $id)
    {
        $id_user = Auth::user()->id;
        $user = $request->user();
        if($id_user == $id){ 
            $data=User::find($id);
            return view('User.edit',compact(['data']));
        } if($user->hasRole('Admin')){ 
            $data=User::find($id);
            return view('User.edit',compact(['data']));
        } else{
            abort(404);
        }
       
    
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
        $id_user = Auth::user()->id;
        $user = $request->user();
        if($id_user == $id){ 
            $request->validate([
            'name',
            'email',
            'username',
            'password',
        ]);
        User::find($id)->update($request->all());
        return redirect('/home');
    }if($user->hasRole('Admin')){ 
        $request->validate([
        'name',
        'email',
        'username',
        'password',
    ]);
    User::find($id)->update($request->all());
    return redirect('/STD');
}
    else{
        abort(404);
        }

       
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
