@extends('templates.dashboard_template')

@section('content')
    <form class="form-register" method="POST" action="/projects">
        {{csrf_field()}}
        <h4 class="form-register-heading" style="margin-top: 0">Create Project</h4>
        <label for="projectName" class="sr-only">Project name</label>
        <input type="text" id="projectName" name="name" class="form-control" placeholder="Project name" required autofocus>


        <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:30px;">Add Project</button>
         @if($errors->any())
        <div class="alert alert-danger">
            <strong>{{$errors->first()}}</strong>
        </div>
        @endif
    </form>
@endsection