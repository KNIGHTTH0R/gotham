@extends('templates.dashboard_template')

@section('content')
    @if(isset($user))
    <div style="margin-left: 10px">
        <h1>{{$user->last_name}}, {{$user->first_name}}</h1>

        <p>{{$user->email}}</p>
        
        <div style="margin-top:100px;">
            <a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-primary" style="float:left; margin-right:10px;">Edit</a>
            {{ Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) }}
                <button type="submit" class="btn btn-danger" id="delete">Delete</button>
            {{ Form::close() }}
        </div>
       
    </div>
   @endif
@endsection