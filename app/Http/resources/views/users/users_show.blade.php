@extends('templates.dashboard_template')

@section('content')
    @if(isset($user))
    <div style="margin-left: 10px">
        <h1>{{$user->last_name}}, {{$user->first_name}}</h1>

        <p>{{$user->email}}</p>

    </div>
   @endif
@endsection