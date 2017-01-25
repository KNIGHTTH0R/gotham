<?php
use gotham\Http\Controllers\MyUtilController;
?>
@extends('templates.dashboard_template')

@section('content')
    <div>
        @if(Auth::check())
            <?php
                $user = Auth::user();
                $myutil = new MyUtilController;
            ?>
        @endif
        <h1>Welcome, {{ $myutil->firstlettertoupper($user->first_name) }}</h1>
    </div>
    <form method="POST" action="{{url('/logout')}}">
        {{ csrf_field() }}
        <input type="submit" class="btn btn-primary" value="logout"/>
    </form>
@endsection