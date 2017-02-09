@extends('templates.dashboard_template')

@section('scripts')

<script>
    function deleteProject() {
        var response = confirm("Are you sure you would like to delete this Project?\nThis process is not reversible!");
        if (response){
            return true;
        } else {
            return false;
        }
    }
</script>
@endsection


@section('content')
    {{ Form::open(['route' => ['projects.update', $project->slug], 'method' => 'PUT', 'class' => 'form-register']) }}
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
    {{ Form::open(['route' => ['projects.destroy', $project->slug], 'method' => 'delete','class' => 'form-register', 'style' => 'padding:15px; padding-top:0px']) }}
    <button type="submit" style="font-size:18px" class="btn btn-lg btn-danger btn-block" id="confirm" title="Delete Project" onclick="return deleteProject();">Delete Project</button>
    {{ Form::close() }}
@endsection