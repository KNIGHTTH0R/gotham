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
            
                <div style="padding:0; background-color:#2c2c2c; padding:5px;" class="col-md-3">
                    <table style="width:100%">
                        <th style="padding:10px;border-bottom:3px solid #5f4a3d;background-color: #212121">
                            <a href="/projects">Projects</a></th>
                        <tr><td>
                                <a class="glyphicon glyphicon-plus" style="color: #8ccd26; text-decoration: none; padding-top:10px;" href="/projects/create"></a></td></tr>
                        <tr><td style="font-size: 72px; text-align: center; line-height:200px;font-weight:bold">{{ gotham\Project::count() }}</td></tr>
    
                    </table>
                </div>
                <div style="padding:0; background-color:#2c2c2c; padding:5px;" class="col-md-3 col-md-offset-1">
                    <table style="width:100%">
                        <th style="padding:10px;border-bottom:3px solid #5f4a3d;background-color: #212121"><a href="#">Requests For Information</a></th>
                        <tr><td>
                                <a class="glyphicon glyphicon-plus" style="color: #8ccd26; text-decoration: none; padding-top:10px;" href="#"></a></td></tr>
                        <tr><td style="font-size: 52px; text-align: center;line-height:200px; font-weight:bold">{{ 0 }}</td></tr>
                    </table>
                </div>
                <div style="padding:0; background-color:#2c2c2c; padding:5px;" class="col-md-3 col-md-offset-1">
                    <table style="width:100%">
                        <th style="padding:10px;border-bottom:3px solid #5f4a3d;background-color: #212121">
                            <a href="/users">Users</a>
                        </th>
                        <tr><td>
                                <a class="glyphicon glyphicon-plus" style="color: #8ccd26; text-decoration: none; padding-top:10px;" href="users/create"></a></td></tr>
                        <tr><td style="font-size: 52px; text-align: center; line-height:200px;font-weight:bold">{{ gotham\User::count() }}</td></tr>
                    </table>
                </div>
           
            <div style="padding:5px;padding-top:100px;" class="col-md-11 col-md-offset-0">
                <table style="width:100%">
                    <th style="padding:10px;border-bottom:3px solid #5f4a3d;background-color: #212121">Announcements</th>

                </table>
            </div>

            
                
            
           
        </div>
    </div>
@endsection