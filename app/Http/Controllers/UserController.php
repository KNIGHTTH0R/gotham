<?php

namespace gotham\Http\Controllers;

use DB;
use gotham\User;
use gotham\Util;
use Illuminate\Http\Request;


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
        $myUtil = new MyUtilController;

        // Modify first and lastnames so that the first letters are Capitalized.
        foreach ($users as $user){
            $user->first_name = $myUtil->firstlettertoupper($user->first_name);
            $user->last_name = $myUtil->firstlettertoupper($user->last_name);
        }


        return view('users.users', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.users_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');
        $password = $request->input('password');
        $password_again = $request->input('password_again');
        if ($password == $password_again){
            $user = new User();

            $user->first_name = $first_name;
            $user->last_name = $last_name;
            $user->email = $email;
            $user->password = $password;
            $user->save();

            return redirect()->back();
        } else {
            return redirect()->back()->withErrors(['msg' => 'Passwords do not match']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \gotham\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
        $myUtil = new MyUtilController;

        $user->first_name = $myUtil->firstlettertoupper($user->first_name);
        $user->last_name = $myUtil->firstlettertoupper($user->last_name);

        return view('users.users_show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \gotham\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        $user = $user;
        return view('users.users_edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \gotham\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        
        $user->save();
        return redirect("/users/$user->id");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \gotham\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        User::destroy($user->id);
        return redirect('/users');
    }
}
