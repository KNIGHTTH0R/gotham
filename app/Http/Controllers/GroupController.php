<?php

namespace gotham\Http\Controllers;

use Illuminate\Http\Request;
use gotham\Group;
use gotham\User;

class GroupController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $groups = Group::get();

        return view('groups.groups', compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('groups.groups_create');
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
        $group = new Group;
        $uid = $request->input('uid');



        $group->name = $request->input('name');

        $group->save();



        $user = User::find($uid);
        $user->groups()->save($group);

        return redirect('groups');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $group = Group::where('slug', $slug)->first();

        return view('groups.groups_show' , compact('group'));
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

    public function addUser($slug){
        $group = Group::where('slug', $slug)->first();
        //$project = $project;

        return view('groups.groups_addUser', compact('group'));
    }

    public function saveUser(Request $request){

        $group = Group::find($request->input('gid'));

        foreach($request->input('selected') as $item){
            $user = \gotham\User::find($item);
            \gotham\Group::find($request->input('gid'))->users()->save($user);

        }



        return redirect("groups/{$group->slug}");
    }

    public function removeUser($slug){
        $group = Group::where('slug', $slug)->first();

        return view('groups.groups_removeUser', compact('group'));
    }

    public function removeUserFromGroup(Request $request){
        $group = Group::find($request->input('gid'));

        foreach($request->input('selected') as $item){
            $user = \gotham\User::find($item);
            \gotham\Group::find($request->input('gid'))->users()->detach($user);

        }


        return redirect("groups/{$group->slug}");
    }
}
