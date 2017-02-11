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
    <?php
        $status_list = [
            'Pending',   
            'In Progress',
            'Completed',
        ];
        
    ?>

    {{ Form::open(['route' => ['rfis.update', $rfi->slug], 'method' => 'PUT', 'class' => 'form-register', 'style' => 'padding-bottom:0px;']) }}
        {{csrf_field()}}
        <h4 class="form-register-heading" style="margin-top: 0">Edit RFI</h4>
        <label for="subject" class="sr-only">Subject</label>
        <input type="text" id="subject" name="subject" 
            class="form-control" placeholder="Subject" value="{{$rfi->subject}}" required autofocus>
        <br />
        <label for="project" class="sr-only">Project</label>
        
        <select id="project_id" name="project_id" class="form-control myselect"  required>
            @foreach(Auth::user()->projects as $project)
                <option value="{{ $rfi->project_id }}">{{ $rfi->project->name }}</option>
            @endforeach
        </select>
        <br />
        <label for="status" class="sr-only">Status</label>
        
        <select id="status" name="status" class="form-control myselect" required>
            @foreach($status_list as $status)
               <option value="{{ $status }}">{{ $status }}</option>
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
    {{ Form::open(['route' => ['rfis.destroy', $rfi->slug], 'method' => 'delete','class' => 'form-register', 'style' => 'padding:15px; padding-top:0px']) }}
    <button type="submit" style="font-size:18px" class="btn btn-lg btn-danger btn-block" id="confirm" title="Delete User" onclick="return deleteRFI();">Delete RFI</button>
    {{ Form::close() }}
    
@endsection