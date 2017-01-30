<?php

namespace gotham\Http\Controllers;

use Illuminate\Http\Request;
use gotham\User;

class SearchController extends Controller
{
    //
    public function search(Request $query){

        $this->validate($query, [
           'q' => 'required'
        ]);

        $search = $query->get('q');

        $users = User::where('first_name', 'LIKE', "%{$search}%")
            ->orWhere('last_name', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->orWhere('permission_level', 'LIKE', "%{$search}%")
            ->paginate(25)
            ->appends(['q' => $search]);



        return view('users.users', compact('users'));
    }
}
