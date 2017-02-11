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
        
        
        
        return view('rfis.rfis_create');
    }
    
    public function store(Request $request) {
        
        $project = Project::find($request->input('project_id'));
        $rfi = new RFI([
            
            'subject' => $request->input('subject'),
            'status' => 'Submitted',
            'body' => $request->input('body'),
            'project_id' => $request->input('project_id'),
            'user_id' => Auth::id(),
            'control_number' => 0,
            'last_updated_by' => Auth::id(),
            
            
            
        ]);
        
        
        
        
        Auth::user()->rfis()->save($rfi);
        
        $rfi->control_number = $rfi->id + 1000;
        $rfi->save();
        
        return redirect("/rfis/{$rfi->slug}");
    }
    
     public function show($slug) {
        
        $rfi = RFI::where('slug', $slug)->first();
        
        return view('rfis.rfis_show', compact('rfi'));
    }
    
    public function edit($slug) {
        
        $rfi = RFI::where('slug', $slug)->first();
        
        return view('rfis.rfis_edit', compact('rfi'));
    }
    
    public function update(Request $request, $slug) {
        
        $rfi = RFI::where('slug', $slug)->first();
        $rfi->subject = $request->input('subject');
        $rfi->status = $request->input('status');
        $rfi->body = $request->input('body');
        $rfi->last_updated_by = $request->input('uid');
        $rfi->project_id = $request->input('project_id');
        $rfi->slug = null;
        $rfi->control_number = $rfi->id + 1000;
        
        
        $rfi->save();
        return redirect("/rfis/$rfi->slug");
    }
    
     public function destroy($slug)
    {
        //
        $rfi = RFI::where('slug', $slug)->first();
        $project_id = $rfi->project_id;
        $project = Project::find($project_id);
        
        RFI::destroy($rfi->id);
        return redirect("/projects/$project->slug");
    }
}
