@extends('templates.dashboard_template')

@section('scripts')

    
@endsection

@section('content')
    <div class="row" style="margin-left:25px;margin-top:25px; padding-right:10px;">
        <?php   
            $colspan = 3;
        ?>
        <div style="margin-bottom: 5px; background-color:#2c2c2c; padding:5px; " class="col-md-11">
            <table style="width:100%">
                <th colspan="{{$colspan}}" style="padding:10px;border-bottom:3px solid #5f4a3d;background-color: #212121">
                        Project: <a href="/projects/{{$rfi->project->slug}}">{{ \gotham\Project::find($rfi->project_id)->name }}</a> 
                        / {{ $rfi->subject }}<br />
                        RFI #: {{ $rfi->control_number }}<br />
                        Status: {{ $rfi->status }} -- {{ \gotham\User::find($rfi->to)->getFullName()  }}
                        
                </th>
                <tr>
                    <td>
                        <a class="glyphicon glyphicon-edit" 
                        title="Edit RFI"
                        style="text-decoration: none; padding-top:10px;padding-bottom:10px;" href="/rfis/{{$rfi->slug}}/edit"></a>
                        
                     </td>
                </tr>
                <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                
                <tr><td>{{$rfi->body}}</td></tr>
                <tr><td>Submitted by: {{ \gotham\User::find($rfi->user_id)->last_name }}, {{ \gotham\User::find($rfi->user_id)->first_name }}</td></tr>
                
            </table>
        </div>
    </div>
    <div class="row" style="margin:0; margin-left:25px;margin-top:10px; ">
       
        <div style="margin-bottom: 5px; margin-right:5px; background-color:#2c2c2c; padding:5px; " class="col-md-8">
            <table style="width:100%">
                <th colspan="{{$colspan}}" style="padding:10px; border-bottom:3px solid #5f4a3d;background-color: #212121">
                       Updates</th>
                <tr>
                    <td colspan="{{$colspan}}">
                        <a class="glyphicon glyphicon-plus" 
                        title="Add a new Update"
                        style="text-decoration: none; padding-top:10px;padding-bottom:10px;" href="/posts/create"></a>
                     </td>
                </tr>
                <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                <th>Date & Time Submitted (UTC)</th>
                <th>Message</th>
                <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                @foreach($rfi->posts->sortByDesc('created_at') as $post)
                <tr>
                    <td style="min-width:250px; padding-right:15px">
                        {{ $post->created_at }}
                        <br />
                        {{ \gotham\User::find($post->user_id)->last_name }}, 
                        {{ \gotham\User::find($post->user_id)->first_name }} 
                    </td>
                    <td>
                        <span>
                            {{$post->message}}
                        </span>
                        <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    
        <div style="margin-bottom: 5px; background-color:#2c2c2c; padding:5px; " class="col-md-3">
            <table style="width:100%">
                <th colspan="{{$colspan}}" style="padding:10px;border-bottom:3px solid #5f4a3d;background-color: #212121">
                       Log</th>
                <tr>
                    <td>
                        <!--<a class="glyphicon glyphicon-plus" -->
                        <!--title="Add a new Update"-->
                        <!--style="text-decoration: none; padding-top:10px;padding-bottom:10px;" href="#"></a>-->
                     </td>
                </tr>
                <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                
            </table>
        </div>
    </div>
    
@endsection