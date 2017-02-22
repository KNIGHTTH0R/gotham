@extends('templates.dashboard_template')

@section('scripts')

@endsection

@section('content')
    <div class="row" style="padding:10px; margin-bottom: 200px;">
        <div class="col-md-12" style="overflow-y:scroll;">
            <h2>Requests for Information</h2><br/>
            
            <h4>Post's</h4>
            <table>
                <th style="padding-right:15px">Date & Time Submitted (UTC)</th>
                <th style="padding-right:15px">Message</th>

                
                @foreach($posts as $post)
                    <tr>
                        <td style="padding-right:15px">{{$post->created_at}}</td>
                        <td style="padding-right:15px"><a href="rfis/{{$post->id}}">{{$post->message}}</a></td>
                    </tr>
                @endforeach
                 
            </table>
           
       </div>
    </div>

@endsection