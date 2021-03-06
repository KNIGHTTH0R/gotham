<?php

namespace gotham\Http\Controllers;

use DB;
use gotham\User;
use gotham\Group;
use gotham\Util;
use gotham\RFI;
use Auth;
use gotham\Events\UserDeleted;;
use Illuminate\Http\Request;

use Vinkla\Hashids\HashidsManager;



class UserController extends Controller
{
    protected $hashids;

    
    public function __construct(HashidsManager $hashids)
    {
        $this->middleware('auth');
        $this->hashids = $hashids;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all Active accounts
        $users = DB::table('users')
        ->where('account_status', 'Enabled')
        ->paginate(25);
        $count = $users->count();
        $currentpage = "enabled_users";
        

        return view('users.users', compact(['users','count','currentpage']));

    }
    
    public function getDisabledAccounts(){
        // Get all inactive accounts
        $users = DB::table('users')
        ->where('account_status', 'Disabled')
        ->paginate(25);
        $count = $users->count();
        $currentpage = 'disabled_users';

        return view('users.users', compact(['users','count','currentpage']));
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
        $myUtil = new MyUtilController;
        
        
      
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');
        $permission_level = $request->input('permission_level');
        $account_status = 'Disabled';
        $password = $request->input('password');
        $password_again = $request->input('password_confirmation');
        if ($password == $password_again){
            $user = new User();

            $user->first_name = $myUtil->firstlettertoupper($first_name);
            $user->last_name = $myUtil->firstlettertoupper($last_name);
            $user->permission_level = $myUtil->firstlettertoupper($permission_level);
            if ($user->permission_level == null){
                $user->permission_level = 'Guest';
            }
            $user->account_status = $myUtil->firstlettertoupper($account_status);
            $user->email = strtolower($email);
            $user->password = bcrypt($password);
             
            $user->save();

            $userGroup = \gotham\Group::where('name', $permission_level)->first();

            $user->groups()->save($userGroup);

            return redirect(route('users.show', $this->hashids->encode($user->id)));
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
    public function show($id)
    {
        //
        $myUtil = new MyUtilController;
        
        $user_id = $this->hashids->decode($id);
       
        $user = User::where('id', $user_id)->first();
       

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
    public function edit($id)
    {
        //
        $user_id = $this->hashids->decode($id);
       
        $user = User::where('id', $user_id)->first();
        
       
         
        return view('users.users_edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \gotham\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user_id = $this->hashids->decode($id);
       
        $user = User::where('id', $user_id)->first();
        
        $oldGroup = $user->groups()->where('name', $user->permission_level)->first();
        
        //dd($oldGroup);
        
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->permission_level = $request->input('permission_level');
        $user->account_status = $request->input('account_status');
        
        $user->save();
        
        
        $group = Group::where('name', $user->permission_level)->first();
        
        
        
        if ($user->groups->contains($group)){
            //dd('here');
            
            
        } else {
            
            $user->groups()->detach($oldGroup);
            $user->groups()->attach($group);
        }
        return redirect(route('users.show', $this->hashids->encode($user->id)));
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
        $email = $user->email;
        
        foreach ($user->rfis as $rfi){
                $rfi->delete();
        }
        
        foreach (RFI::get() as $rfi){
            if ($rfi->last_updated_by == $user->id){
                //fix this delete logic later
                $rfi->last_updated_by = User::get()->first()->id;
            }
            if ($rfi->to == $user->id){
                $rfi->to = User::get()->first()->id;
            }
            
            $rfi->save();
        }
        
        
        
        User::destroy($user->id);
        
        event(new UserDeleted([$email, Auth::user()->email, \gotham\User::get()->count()]));
        return redirect('/users');
    }
}
