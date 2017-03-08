@extends('templates.dashboard_template')

@section('content')
    <form class="form form-horizontal form-rfi" method="POST" action="/projects/rfis/posts">
        {{csrf_field()}}
            <h4 class="form-register-heading" style="margin-top: 0; text-align: center">Create a new Post</h4></th>
            <br />

            <div class="form-group">
                <label for="project" class="col-sm-2">Project</label>
                <select id="project_id" name="project_id" class="col-sm-10" style="padding:5px" disabled>
                    @foreach(Auth::user()->projects as $project)

                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                </select>
            </div>
        <div class="form-group">
            <label for="rfi_id" class="col-sm-2">RFI</label>
            <?php
                $slug = Request::get('rslug');
                $rfi = \gotham\RFI::where('slug', $slug)->first();
             ?>
            <select id="rfi_id" name="rfi_id" class="col-sm-10" style="padding:5px">
                   
    
                    <option value="{{$rfi->id}}">{{$rfi->subject}}</option>
               
            </select>
        </div>
            <div class="form-group">
                 <label for="subject" class="col-sm-2">Subject</label>
                <input type="text" name="subject" class="col-sm-10" style="padding: 5px"/>
            </div>
            <div class="form-group">
                
                <label for="body" class="col-sm-2" >Post data</label>

                <textarea class="col-sm-10" style="padding: 5px" rows="5" id="body" name="body"></textarea>
            </div>
            <div class="form-group" style="text-align: center">
                <button class="btn btn-md btn-primary btn-block" type="submit" style="margin-top:30px;">Submit Post</button>
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