@extends('templates.dashboard_template')

@section('content')
    {{ Form::open(['route' => ['projects.update', $project->id], 'method' => 'PUT', 'class' => 'form-register']) }}
        {{csrf_field()}}
        <h4 class="form-register-heading" style="margin-top: 0">Edit Project</h4>
        <label for="Name" class="sr-only">Project name</label>
        <input type="text" id="projectName" name="name" value="{{ $project->name }}"
            class="form-control" placeholder="Project name" required autofocus>
        
        <label for="description" class="sr-only">Description</label>
        <input type="text" id="description" name="description" value="{{ $project->description }}"
            class="form-control" placeholder="Description"/>


        <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:30px;">Update</button>
        <input type="hidden" name="uid" value="{{ Auth::id() }}" >
         @if($errors->any())
        <div class="alert alert-danger">
            <strong>{{$errors->first()}}</strong>
        </div>
        @endif
    {{ Form::close() }}
@endsection