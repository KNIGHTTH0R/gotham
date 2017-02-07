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
        
        
        
        return redirect("/projects/{$request->input('project_id')}");
    }
    
     public function show(RFI $rfi) {
        
        $rfi = $rfi;
        
        return view('rfis.rfis_show', compact('rfi'));
    }
    
    public function edit(RFI $rfi) {
        
        $rfi = $rfi;
        
        return view('rfis.rfis_edit', compact('rfi'));
    }
    
    public function update(Request $request, RFI $rfi) {
        
        $rfi->subject = $request->input('subject');
        $rfi->body = $request->input('body');
        $rfi->user_id = $request->input('uid');
        $rfi->project_id = $request->input('project_id');
        
        
        $rfi->save();
        return redirect("/rfis/$rfi->id");
    }
    
     public function destroy(RFI $rfi)
    {
        //
        $project_id = $rfi->project_id;
        
        RFI::destroy($rfi->id);
        return redirect("/projects/$project_id");
    }
}
