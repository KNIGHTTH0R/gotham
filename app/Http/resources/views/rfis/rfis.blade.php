@extends('templates.dashboard_template')

@section('scripts')

@endsection

@section('content')
    <div class="row" style="padding:10px; margin-bottom: 200px;">
        <div class="col-md-12" style="overflow-y:scroll;">
            <h2>Requests for Information</h2><br/>
            
            <h4>RFI's</h4>
            <table>
                <th style="padding-right:15px">Project</th>
                <th style="padding-right:15px">Subject</th>
                <th style="padding-right:15px">Body</th>
                <th style="padding-right:15px">Submitted by</th>
                
                @foreach($rfis as $rfi)
                    <tr>
                        <td style="padding-right:15px">{{$rfi->project->name}}</td>
                        <td style="padding-right:15px"><a href="rfis/{{$rfi->id}}">{{$rfi->subject}}</a></td>
                        <td style="padding-right:15px">{{$rfi->body}}</td>
                        <td style="padding-right:15px">{{ gotham\User::find($rfi->user_id)->first_name }}</td>
                    </tr>
                @endforeach
                 
            </table>
           
       </div>
    </div>

@endsection