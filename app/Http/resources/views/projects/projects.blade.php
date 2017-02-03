@extends('templates.dashboard_template')

@section('scripts')

@endsection

@section('content')
    <div class="row" style="padding:10px; margin-bottom: 200px; overflow-y:auto;">
        <div class="col-md-11" style="overflow-y:scroll;">
            <h3>Projects</h3>
            @foreach($projects as $project)
                {{--build a table here...--}}
                {{$project->id}}. {{$project->name}}<br /><br />
            @endforeach
        </div>
    </div>

@endsection