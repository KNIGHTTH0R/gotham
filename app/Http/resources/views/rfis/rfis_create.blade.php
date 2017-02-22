@extends('templates.dashboard_template')

@section('content')
    <form class="form form-horizontal form-rfi" method="POST" action="/rfis">
        {{csrf_field()}}
            <h4 class="form-register-heading" style="margin-top: 0; text-align: center">Create a new RFI</h4></th>
            <br />
            <div class="form-group">
                <label for="subject" class="col-sm-2">Subject</label>
                <input type="text" id="subject" name="subject" style="padding: 5px"
                               class="col-sm-10" required autofocus>
            </div>
            <div class="form-group">
                <label for="to" class="col-sm-2">To</label>
                <select id="to" name="to" class="col-sm-10">
                    @foreach(gotham\Project::get() as $project)
                        @foreach($project->users as $pUser)
                            <option value="{{ $pUser->id }}">{{ $pUser->getFullName() }}</option>
                        @endforeach
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="project" class="col-sm-2">Project</label>
                <select id="project_id" name="project_id" class="col-sm-10" required>
                    @foreach(Auth::user()->projects as $project)

                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="body" class="col-sm-2">Request Info</label>

                <textarea class="col-sm-10" style="padding: 5px" rows="5" id="body" name="body"></textarea>
            </div>
            <div class="form-group" style="text-align: center">
                <button class="btn btn-md btn-primary btn-block" type="submit" style="margin-top:30px;">Submit RFI</button>
            </div>

            <input type="hidden" name="uid" value="{{ Auth::id() }}" >
             @if($errors->any())
            <div class="alert alert-danger">
                <strong>{{$errors->first()}}</strong>
            </div>
        </table>
        @endif
    </form>
@endsection