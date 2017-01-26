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
            <p>Welcome, {{ $myutil->firstlettertoupper($user->first_name) }}</p>
        </div>
    </div>
@endsection