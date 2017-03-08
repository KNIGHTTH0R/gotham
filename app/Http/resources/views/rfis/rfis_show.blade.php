@extends('templates.dashboard_template')

@section('scripts')

    
@endsection

@section('content')
    <div class="row" style="margin-left:25px;margin-top:25px; margin-right:125px;">
        <?php   
            $colspan = 3;
        ?>
        <div style="margin-bottom: 5px; background-color:#2c2c2c; padding:5px; " class="col-md-12">
            <table style="width:100%">
                <th colspan="{{$colspan}}" style="padding:10px;border-bottom:3px solid #5f4a3d;background-color: #212121">
                        Project: <a href="/projects/{{$rfi->project->slug}}">{{ \gotham\Project::find($rfi->project_id)->name }}</a> 
                        <br />
                        Subject: {{ $rfi->subject }}<br />
                        RFI #: {{ $rfi->control_number }}<br /><br />
                        Status: {{ $rfi->status }} <br />
                        To:
                        <?php 
                            if (is_numeric($rfi->to)){
                                echo gotham\User::find($rfi->to)->getFullName();
                            } else {
                        ?>
                                <a href="/groups/{{$rfi->to}}">{{ gotham\Group::where('slug', $rfi->to)->first()->name }}</a>
                        <?php
                            }
                        ?>
                        
                </th>
                <tr>
                    <td>
                        <a class="glyphicon glyphicon-edit" 
                        title="Edit RFI"
                        style="text-decoration: none; padding-top:10px;padding-bottom:10px;" href="/projects/rfis/{{$rfi->slug}}/edit"></a>
                        
                     </td>
                </tr>
                <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                
                <tr><td><span style="white-space:pre-wrap;">{{$rfi->body}}</span></td></tr>
                
                <tr><td style="padding-top:30px">Submitted by: {{ \gotham\User::find($rfi->user_id)->last_name }}, {{ \gotham\User::find($rfi->user_id)->first_name }}</td></tr>
                
            </table>
        </div>
    </div>
    <div class="row" style="margin-left:25px;margin-top:10px; margin-right:125px;">
       
        <div style="margin-bottom: 5px; background-color:#2c2c2c; padding:5px; " class="col-md-12">
            <table style="width:100%">
                <th colspan="{{$colspan}}" style="padding:10px; border-bottom:3px solid #5f4a3d;background-color: #212121">
                       Updates</th>
                <tr>
                    <td colspan="{{$colspan}}">
                        <a class="glyphicon glyphicon-plus" 
                        title="Add a new Update"
                        style="text-decoration: none; padding-top:10px;padding-bottom:10px;" href="/projects/rfis/posts/create?rslug={{$rfi->slug}}"></a>
                     </td>
                </tr>
                <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                
                <th>Subject</th>
                <th>User</th>
                <th>Date & Time Submitted (UTC)</th>
                <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                @foreach($rfi->posts->sortByDesc('created_at') as $post)
                <tr>
                    <td><a href="/projects/rfis/posts/{{$post->slug}}"> {{ $post->subject }}</a></td>
                    <td>
                            {{ \gotham\User::find($post->user_id)->last_name }}, 
                            {{ \gotham\User::find($post->user_id)->first_name }}
                    </td>
                    <td style="padding-right:15px">
                        {{ $post->created_at }}
                    </td>
                    <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                    <tr><td><br /><strong>Message:</strong><br/>{{ $post->message }}<br /><br /></td></tr>
                    <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                </tr>
                @endforeach
            </table>
        </div>
    
        <!--<div style="margin-bottom: 5px; background-color:#2c2c2c; padding:5px; " class="col-md-3">-->
        <!--    <table style="width:100%">-->
        <!--        <th colspan="{{$colspan}}" style="padding:10px;border-bottom:3px solid #5f4a3d;background-color: #212121">-->
        <!--               Log</th>-->
        <!--        <tr>-->
        <!--            <td>-->
                        <!--<a class="glyphicon glyphicon-plus" -->
                        <!--title="Add a new Update"-->
                        <!--style="text-decoration: none; padding-top:10px;padding-bottom:10px;" href="#"></a>-->
        <!--             </td>-->
        <!--        </tr>-->
        <!--        <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>-->
                
        <!--    </table>-->
        <!--</div>-->
    </div>
    
@endsection