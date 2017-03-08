@extends('templates.dashboard_template')

@section('scripts')

@endsection

@section('content')
    <div class="row" style="margin:25px; margin-bottom: 200px; margin-right:125px">
        <?php
            $colspan = 4;
        ?>
            <div style="padding:0; background-color:#2c2c2c; padding:5px;" class="col-md-6 col-md-offset-3">
                <table style="width:100%">
                    <th colspan="{{$colspan}}" style="padding:10px;border-bottom:3px solid #5f4a3d;background-color: #212121">
                        RFI: <a href="/projects/rfis/{{$post->rfi->slug}}">{{$post->rfi->subject}}</a>
                        <br />Subject: {{$post->subject}}</th>
                    <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                   
                    <tr><td style="text-align:justified;padding-top:5px;padding-left:10px;font-weight:bolder;" colspan="{{$colspan}}">{{$post->message}}</td></tr>
                </table>
            </div>
    </div>

@endsection