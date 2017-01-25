<?php
use gotham\Http\Controllers\MyUtilController;
?>
@extends('templates.dashboard_template')

@section('content')
    <div class="row" style="margin:25px;" >
        <div>
            @if(Auth::check())
                <?php
                    $user = Auth::user();
                    $myutil = new MyUtilController;
                ?>
            @endif
            <h1 style="margin-top: 0;">Welcome, {{ $myutil->firstlettertoupper($user->first_name) }}</h1>
        </div>
        <form method="POST" action="{{url('/logout')}}">
            {{ csrf_field() }}
            <input type="submit" class="glyphicon glyphicon-off"/>
            <span class="glyphicon glyphicon-off"></span>
        </form>
    </div>
@endsection