<?php

namespace gotham\Http\Controllers;

use Illuminate\Http\Request;
use gotham\Events\UserAddedToProject;
use gotham\Events\UserRemovedFromProject;
use gotham\Events\ProjectCreated;

use gotham\Project;
use gotham\RFI;
use gotham\User;
use gotham\Group;
use Auth;
use Log;


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
        // dd($user->projects()->first());
        
        $user->projects()->save($project);
        
        event(new ProjectCreated([$project, $user]));

        return redirect('projects');
    }
    
     public function show($slug)
    {
        $project = Project::where('slug', $slug)->first();
        
        return view('projects.projects_show' , compact('project'));
    }
    
    public function edit($slug)
    {
        $project = Project::where('slug', $slug)->first();
        
        return view('projects.projects_edit', compact('project'));
    }
    
    public function update(Request $request, $slug)
    {
        //
        $project = Project::where('slug', $slug)->first();
        $project->name = $request->input('name');
        $project->description = $request->input('description');
        
        
        $project->save();
        return redirect("/projects/$project->slug");
    }
    
    public function destroy($slug)
    {
        //
        
        $project = Project::where('slug', $slug)->first();
        
        foreach (RFI::get() as $rfi){
            if($rfi->project_id == $project->id){
                $rfi->delete();
            }
        }
        Project::destroy($project->id);
        return redirect('/');
    }
    
    public function addCollaborator($slug){
        $project = Project::where('slug', $slug)->first();
       
        
        
        return view('projects.projects_addCollaborator', compact('project'));
    }
    
    public function addGroup($slug){
        
        $project = Project::where('slug', $slug)->first();
        $groups = \gotham\Group::get();
        
        
        return view('projects.projects_addGroup', compact(['project', 'groups']));
    }
    
    public function saveGroup(Request $request){
        
        $project = Project::find($request->input('pid'));

        if (!empty($request->input('selected'))) {
            foreach ($request->input('selected') as $item) {
                $group = \gotham\Group::find($item);
                
                $groupUsers = $group->users()->get();
                
                foreach ($groupUsers as $user){
                    
                    if(!$project->hasUser($user)){
                       
                        $project->users()->save($user);
                        $event = new UserAddedToProject([$user, $project, $user->projects()->count()]);
                        event($event);
                        
                    } else {
                         //print "Yes - Project does contain user --> $user<br />";
                         
                    }
                        
                }
                $project->groups()->save($group);
            }
            
            
            return redirect("projects/{$project->slug}");
        }
    }
    
    public function saveCollaborator(Request $request){
        
        $project = Project::find($request->input('pid'));

        if (!empty($request->input('selected'))) {
            foreach ($request->input('selected') as $item) {
                $user = \gotham\User::find($item);
                \gotham\Project::find($request->input('pid'))->users()->save($user);
                
                $event = new UserAddedToProject([$user, $project, $user->projects()->count()]);
                event($event);
                
                // $user->notify(new AddedToProject($project));
            }
            return redirect("projects/{$project->slug}");
        }
    }
    
    public function removeCollaborator($slug){
        $project = Project::where('slug', $slug)->first();
        
        return view('projects.projects_removeCollaborator', compact('project'));
    }
    
    public function removeGroup($slug){
        $project = Project::where('slug', $slug)->first();
        
        return view('projects.projects_removeGroup', compact('project'));
    }
    
    
    public function removeCollaboratorFromProject(Request $request){
        $project = Project::find($request->input('pid'));
        
        foreach($request->input('selected') as $item){
            $user = \gotham\User::find($item);
            $project->users()->detach($user);
            $event = new UserRemovedFromProject([$user, $project->name, $user->projects()->count(), Auth::User()->email]);
            event($event);
            
        }
        return redirect("projects/{$project->slug}");
    }
    
    public function removeGroupFromProject(Request $request){
        $project = Project::find($request->input('pid'));
        
        foreach($request->input('selected') as $item){
            $group = \gotham\Group::find($item);
            $project->groups()->detach($group);
            
            foreach($group->users as $gUser){
                if($project->userInAssociatedGroup($gUser)){
                    // do nothing if user is in another group
                } else {
                    // detach the user
                    $project->users()->detach($gUser);
                    $event = new UserRemovedFromProject([$gUser, $project->name, $gUser->projects()->count(), Auth::User()->email]);
                    event($event);
                }
            }
            
        }
        
        
        return redirect("projects/{$project->slug}");
    }
    
    


}
