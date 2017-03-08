<?php
use gotham\Http\Controllers\MyUtilController;
?>
@extends('templates.dashboard_template')

@section('scripts')
<script>
    var socket = io('http://gotham-muldrowja.c9users.io:8081');
    
    new Vue({
        el: '#app',
        
        data: {
            users: []
        },
        
        created: function () {
            
            socket.on('gotham-updates:gotham\\Events\\UserSignedUp', function (data) {
                console.log(data);
                this.users.push(data.username);
                toastr.info('New user alert:' + data.username);
            }.bind(this));
        },
        
        methods: {
            
        }
    });
</script>
@endsection

@section('content')
    <div class="row" id="app" style="margin:25px;" >
        
        @if(Auth::check())
            <?php
                $user = Auth::user();
                $projects = $user->projects;
                $myutil = new gotham\Http\Controllers\MyUtilController;
            ?>
        @endif
        
        {{--Feature not added Yet--}}
        <div style="padding:5px;padding-top:100px;" class="col-md-11 col-md-offset-0">
        <table id="users" style="width:100%">
            <th style="padding:10px;border-bottom:3px solid #5f4a3d;background-color: #212121">Announcements</th>
            <tr v-for="user in users"><td>@{{ user }}</td></tr>
        </table>
        </div>
        <!--<ul id="users">-->
        <!--    <li v-for="user in users">@{{ user }}</li>-->
        <!--</ul>-->
        
    </div>
    
@endsection