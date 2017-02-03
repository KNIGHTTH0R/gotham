<?php

namespace gotham\Http\Controllers;

use Illuminate\Http\Request;
use gotham\Project;

class ProjectsController extends Controller
{
    //
    public function index(){
        $projects = Project::get();
        return $projects;
    } 
    
    
}
