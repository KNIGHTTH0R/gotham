@extends('templates.dashboard_template')
@section('scripts')

<script>
    function deleteRFI() {
        var response = confirm("Are you sure you would like to delete this RFI?\nThis process is not reversible!");
        if (response){
            return true;
        } else {
            return false;
        }
    }
</script>
@endsection
@section('content')

    {{ Form::open(['route' => ['rfis.update', $rfi->id], 'method' => 'PUT', 'class' => 'form-register']) }}
        {{csrf_field()}}
        <h4 class="form-register-heading" style="margin-top: 0">Edit RFI</h4>
        <label for="subject" class="sr-only">Subject</label>
        <input type="text" id="subject" name="subject" 
            class="form-control" placeholder="Subject" value="{{$rfi->subject}}" required autofocus>
        <br />
        <label for="project" class="sr-only">Project</label>
        
        <select id="project_id" name="project_id" class="form-control myselect" required>
            @foreach(Auth::user()->projects as $project)
            
                <option value="{{ $rfi->project_id }}">{{ $rfi->project->name }}</option>
            @endforeach
        </select>
        
        <div class="form-group">
          <label for="body">Request Info</label>
          <textarea class="form-control" rows="5" id="body" name="body" >{{$rfi->body}}</textarea>
        </div>

        <div class="form-group">
            <button class="btn btn-lg btn-primary btn-block" type="submit" style="margin-top:30px;">Update RFI</button>
            
        </div>
        
        
        <input type="hidden" name="uid" value="{{ Auth::id() }}" >
         @if($errors->any())
        <div class="alert alert-danger">
            <strong>{{$errors->first()}}</strong>
        </div>
        @endif
    {{ Form::close() }}
    {{ Form::open(['route' => ['rfis.destroy', $rfi->id], 'method' => 'delete','class' => 'form-register', 'style' => 'padding:15px']) }}
    <button type="submit" style="font-size:18px" class="btn btn-danger btn-block" id="confirm" title="Delete User" onclick="return deleteRFI();">Delete RFI</button>
    {{ Form::close() }}
    
@endsection