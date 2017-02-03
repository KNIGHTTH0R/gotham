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
            <div style="border:1px solid #333333;padding:0;" class="col-md-4">
                <table style="width:100%">
                    <th style="padding:10px;border:1px solid #333333;">Name</th>
                    @foreach($user->projects as $project)
                        <tr>
                            <td style="padding:10px;">{{$project->name}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
            
                
            
           
        </div>
    </div>
@endsection