<?php

namespace gotham\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use gotham\RFI;
use gotham\User;
use gotham\Project;
use gotham\Events\RFIAssigned;
use gotham\Events\RFIUpdated;
use gotham\Events\UserSignedUp;

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
    
    public function create(Request $request) {
        
        $pSlug = $request->input('s');
        
        return view('rfis.rfis_create', compact('pSlug'));
    }
    
    public function store(Request $request) {
        
        $project = Project::find($request->input('project_id'));
        $rfi = new RFI([
            
            'subject' => $request->input('subject'),
            'status' => 'Submitted',
            'to' => $request->input('to'),
            'body' => $request->input('body'),
            'project_id' => $request->input('project_id'),
            'user_id' => Auth::id(),
            'control_number' => 0,
            'last_updated_by' => Auth::id(),
        
        ]);
        
        Auth::user()->rfis()->save($rfi);
        
        $rfi->control_number = $rfi->id + 1000;
        $rfi->save();
        
        if (is_numeric($rfi->to)) {
            // Handle User ID notify
             // Handle User ID notify
            $user = User::find($rfi->to);
            event(new RFIAssigned([$rfi, $user]));
        } else {
            // It's a group, handle it
            $group = $project->groups->where('slug',$rfi->to)->first();
            foreach ($group->users()->get() as $user){
            
                event(new RFIAssigned([$rfi, $user]));
            }
            
        }
        
        return redirect("/projects/rfis/{$rfi->slug}");
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
        $rfi->to = $request->input('to');
        $rfi->slug = null;
        $rfi->control_number = $rfi->id + 1000;
        
        
        $rfi->save();
        
        if (is_numeric($rfi->to)) {
            // Handle User ID notify
            $user = User::find($rfi->to);
            event(new RFIUpdated([$rfi, $user]));
        } else {
            // It's a group, handle it
            $group = $rfi->project->groups->where('slug',$rfi->to)->first();
            foreach ($group->users()->get() as $user){
                    event(new RFIUpdated([$rfi, $user]));
                
            }
            // Notify RFI Creator
            $creator = User::find($rfi->user_id);
            event(new RFIUpdated([$rfi, $creator]));
            
        }
       
     
        return redirect("/projects/rfis/$rfi->slug");
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
