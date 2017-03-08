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
    
    $project = $rfi->project;
    $pSlug = $rfi->project->slug;
    ?>
    <form class="form form-horizontal form-rfi" method="POST" action="/projects/rfis/{{$rfi->slug}}">
        <input name="_method" type="hidden" value="PUT">
        {{csrf_field()}}
        <h4 class="form-register-heading" style="margin-top: 0; text-align: center">Edit RFI</h4></th>
        <br />
        <div class="form-group">
            <label for="subject" class="col-sm-2" >Subject</label>
            <input type="text" id="subject" name="subject" style="padding:3px"
                   class="col-sm-10" value="{{$rfi->subject}}" required autofocus>
        </div>
        <div class="form-group">
                <label for="to" class="col-sm-2">To</label>
                <select id="to" name="to" class="col-sm-10">
                    <option disabled>GROUPS</option>
                    
                    @foreach($project->groups as $pGroup)
                        <option value="{{ $pGroup->slug }}">{{ $pGroup->name }}</option>
                    @endforeach
                    <option disabled></option>
                    <option disabled>USERS</option>
                    @foreach($project->users as $pUser)
                        <option value="{{ $pUser->id }}">{{ $pUser->getFullName() }}</option>
                    @endforeach
                    
                </select>
            </div>
        <div class="form-group">
                <label for="project" class="col-sm-2">Project</label>
                <select id="project_id" name="project_id" class="col-sm-10" required>
                    
                        <option value="{{ Auth::user()->projects->where('slug', $pSlug)->first()->id }}">{{ Auth::user()->projects->where('slug', $pSlug)->first()->name }}</option>
                    
                </select>
            </div>
        <div class="form-group">
            <label for="comment" class="col-sm-2">Request Info</label>

            <textarea class="col-sm-10" rows="5" id="body" name="body" style="padding:2px">{{ $rfi->body }}</textarea>
        </div>
        <div class="form-group">
            <label for="status" class="col-sm-2">Status</label>
            <select id="status" name="status" class="col-sm-10" style="padding:3px" required>
                
                @if($rfi->status == "Submitted")
                    <option value="Submitted" selected>Submitted</option>
                    <option value="Pending Action">Pending Action</option>
                    <option value="Complete">Complete</option>
                @elseif($rfi->status == "Pending Action")
                    <option value="Submitted">Submitted</option>
                    <option value="Pending Action" selected>Pending Action</option>
                    <option value="Complete">Complete</option>
                @elseif($rfi->status == "Complete")
                    <option value="Submitted">Submitted</option>
                    <option value="Pending Action">Pending Action</option>
                    <option value="Complete" selected>Complete</option>
                @endif
                
            </select>
        </div>
        <div class="form-group" style="text-align: center">
            <button class="btn btn-primary" type="submit" style="margin-top:30px;">Update RFI</button>
        </div>

        <input type="hidden" name="uid" value="{{ Auth::id() }}" >
        @if($errors->any())
            <div class="alert alert-danger">
                <strong>{{$errors->first()}}</strong>
            </div>
            </table>
        @endif
    </form>
    {{ Form::open(['route' => ['rfis.destroy', $rfi->slug], 'method' => 'delete','class' => 'form-rfi']) }}
    <div class="form-group" style="text-align: center">
        <button type="submit" class="btn btn-danger" id="confirm" title="Delete User" onclick="return deleteRFI();">Delete RFI</button>
    </div>
    {{ Form::close() }}
@endsection