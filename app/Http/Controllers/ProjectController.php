<?php

namespace gotham\Http\Controllers;

use Illuminate\Http\Request;
use gotham\Project;
use gotham\RFI;
use gotham\User;
use Auth;


class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    //
    public function index(){
        
        $user = Auth::user();
        
        $projects = $user->projects;

        return view('projects.projects', compact('projects'));
    }

    public function create()
    {
        return view('projects.projects_create');
    }

    public function store(Request $request)
    {
        $project = new Project;
        $uid = $request->input('uid');
        
       
        
        $project->name = $request->input('name');
        $project->description = $request->input('description');
        
        $project->save();
        
        
        
        $user = User::find($uid);
        $user->projects()->save($project);

        return redirect('projects');
    }
    
     public function show(Project $project)
    {
        $project = Project::find($project->id);
        
        return view('projects.projects_show' , compact('project'));
    }
    
    public function edit(Project $project)
    {
        $project = $project;
        
        return view('projects.projects_edit', compact('project'));
    }
    
    public function update(Request $request, Project $project)
    {
        //
        $project->name = $request->input('name');
        $project->description = $request->input('description');
        
        
        $project->save();
        return redirect("/projects/$project->id");
    }
    
    public function destroy(Project $project)
    {
        //
        foreach (RFI::get() as $rfi){
            if($rfi->project_id == $project->id){
                $rfi->delete();
            }
        }
        Project::destroy($project->id);
        return redirect('/');
    }


}
