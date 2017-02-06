@extends('templates.dashboard_template')

@section('scripts')

@endsection

@section('content')
    <div class="row" style="margin:25px; margin-bottom: 200px;">
        <?php
            $colspan = 3;
        ?>
        @if($projects->count() > 0)
        
            <div style="padding:0; background-color:#2c2c2c; padding:5px;" class="col-md-6 col-md-offset-3">
                <table style="width:100%">
                    <th colspan="{{$colspan}}" style="padding:10px;border-bottom:3px solid #5f4a3d;background-color: #212121">
                        Projects</th>
                    <tr>
                        <td style="text-align:left;" colspan="{{$colspan}}">
                            <a class="glyphicon glyphicon-plus" 
                            style="text-decoration: none; padding-top:10px; padding-bottom:10px;" 
                            title="Create a new project"
                            href="/projects/create"></a>
                            <a class="glyphicon glyphicon-th-list" 
                            title="List all projects"
                            style="text-decoration: none; padding-top:10px; padding-bottom:10px;" 
                            href="/projects"></a>
                        </td>
                        
                    </tr>
                    <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">Name</th>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">Last update</th>
                    <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                    @foreach($projects as $project)
                    <tr>
                        <td style="padding-right:15px"><a href="projects/{{$project->id }}">{{$project->name}}</a></td>
                        <td style="padding-right:15px">{{$project->updated_at}}</td>
                    </tr>
                     @endforeach
                </table>
            </div>
        @else 
            <div style="padding:0; background-color:#2c2c2c; padding:5px;" class="col-md-6 col-md-offset-3">
                <table style="width:100%">
                    <th colspan="{{$colspan}}" style="padding:10px;border-bottom:3px solid #5f4a3d;background-color: #212121">
                        Projects</th>
                    <tr>
                        <td style="text-align:left;" colspan="{{$colspan}}">
                            <a class="glyphicon glyphicon-plus" 
                            style="text-decoration: none; padding-top:10px; padding-bottom:10px;" 
                            title="Create a new project"
                            href="/projects/create"></a>
                            <a class="glyphicon glyphicon-th-list" 
                            title="List all projects"
                            style="text-decoration: none; padding-top:10px; padding-bottom:10px;" 
                            href="/projects"></a>
                        </td>
                        
                    </tr>
                    <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">Name</th>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">Last update</th>
                    <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                    <tr><td style="text-align:center;padding-top:5px;font-weight:bolder; color:black" colspan="{{$colspan}}">No records found</td></tr>
                </table>
            </div>
        
        @endif
    </div>

@endsection