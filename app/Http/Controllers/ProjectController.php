<?php

namespace gotham\Http\Controllers;

use Illuminate\Http\Request;
use gotham\Project;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

    }
    //
    public function index(){
        $projects = Project::get();

        return view('projects.projects', compact('projects'));
    }

    public function create()
    {
        return view('projects.projects_create');
    }

    public function store(Request $request)
    {
        $project = new Project;

        $project->name = $request->input('name');
        $project->save();

        return redirect('projects');
    }


}
