@extends('templates.dashboard_template')

@section('content')
    <form class="form-register" method="POST" action="/rfis">
        {{csrf_field()}}
        <h4 class="form-register-heading" style="margin-top: 0">Create a new RFI</h4>
        <label for="subject" class="sr-only">Subject</label>
        <input type="text" id="subject" name="subject" 
            class="form-control" placeholder="Subject" required autofocus>
        <br />
        <label for="project" class="sr-only">Project</label>
        
        <select id="project_id" name="project_id" class="form-control myselect" required>
            @foreach(Auth::user()->projects as $project)
            
                <option value="{{ $project->id }}">{{ $project->name }}</option>
            @endforeach
        </select>
        
        <div class="form-group">
          <label for="comment">Request Info</label>
          <textarea class="form-control" rows="5" id="body" name="body"></textarea>
        </div>


        <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:30px;">Submit RFI</button>
        <input type="hidden" name="uid" value="{{ Auth::id() }}" >
         @if($errors->any())
        <div class="alert alert-danger">
            <strong>{{$errors->first()}}</strong>
        </div>
        @endif
    </form>
@endsection