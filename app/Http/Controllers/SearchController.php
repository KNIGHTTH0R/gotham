<?php

namespace gotham\Http\Controllers;

use Illuminate\Http\Request;
use gotham\User;

class SearchController extends Controller
{
    //
    public function search(Request $query){
        
        
        $search = $query->input('search');
        
        
        $users = User::where( 'first_name', 'LIKE', "%{$search}%")
                    ->orWhere('last_name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->get();
        $count = $users->count();
        
        return view('users.users', compact(['users','count']));
    }
}
