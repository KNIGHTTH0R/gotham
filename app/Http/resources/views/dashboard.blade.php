<?php
use gotham\Http\Controllers\MyUtilController;
?>
@extends('templates.dashboard_template')

@section('scripts')

@endsection

@section('content')
    <div class="row" style="margin:25px;" >
        <div>
            @if(Auth::check())
                <?php
                    $user = Auth::user();
                    $myutil = new gotham\Http\Controllers\MyUtilController;
                ?>
            @endif
            <div style="padding:0;" class="col-md-2">
                <table style="width:100%">
                    <th style="padding:10px;border-bottom:1px solid #5f4a3d;background-color: #212121">
                        <a href="/projects">Projects</a></th>
                    <tr><td>
                            <a class="glyphicon glyphicon-plus" style="color: #8ccd26; text-decoration: none" href="/projects/create"></a></td></tr>
                    <tr><td style="font-size: 52px; text-align: center; vertical-align: middle">{{ gotham\Project::count() }}</td></tr>

                </table>
            </div>
            <div style="padding:0;" class="col-md-4 col-md-offset-1">
                <table style="width:100%">
                    <th style="padding:10px;border-bottom:1px solid #5f4a3d;background-color: #212121">Requests For Information</th>
                    <tr><td>
                            <a class="glyphicon glyphicon-plus" style="color: #8ccd26; text-decoration: none" href="#"></a></td></tr>
                    <tr><td style="font-size: 52px; text-align: center; vertical-align: middle">{{ 0 }}</td></tr>
                </table>
            </div>
            <div style="padding:0;" class="col-md-3 col-md-offset-1">
                <table style="width:100%">
                    <th style="padding:10px;border-bottom:1px solid #5f4a3d;background-color: #212121">
                        <a href="/users">Users</a>
                    </th>
                    <tr><td>
                            <a class="glyphicon glyphicon-plus" style="color: #8ccd26; text-decoration: none" href="users/create"></a></td></tr>
                    <tr><td style="font-size: 52px; text-align: center; vertical-align: middle">{{ gotham\User::count() }}</td></tr>
                </table>
            </div>
            <div style="padding-top:100px;" class="col-md-11 col-md-offset-0">
                <table style="width:100%">
                    <th style="padding:10px;border-bottom:1px solid #5f4a3d;background-color: #212121">Announcements</th>

                </table>
            </div>

            
                
            
           
        </div>
    </div>
@endsection