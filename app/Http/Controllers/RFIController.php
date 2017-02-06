<?php

namespace gotham\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use gotham\RFI;
use gotham\User;
use gotham\Project;

class RFIController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');

    }
    
    public function index(){
        
        $rfis = RFI::get();
        
        return view('rfis.rfis', compact('rfis'));
    }
    
    public function create() {
        
        $project = Project::get();
        
        return view('rfis.rfis_create');
    }
    
    public function store(Request $request) {
        
       
        $rfi = new RFI([
            
            'subject' => $request->input('subject'),
            'body' => $request->input('body'),
            'project_id' => $request->input('project_id'),
            'user_id' => Auth::id(),
            
        ]);
        
        Auth::user()->rfis()->save($rfi);
        
        
        
        return redirect('/rfis');
    }
    
}
