@extends('templates.dashboard_template')

@section('scripts')

@endsection

@section('content')
    <div class="row" style="margin:25px; margin-bottom: 200px; margin-right:125px">
        <?php
            $colspan = 4;
        ?>
        @if($projects->count() > 0)
        
            <div style="padding:0; background-color:#2c2c2c; padding:5px;" class="col-md-6 col-md-offset-3">
                <table style="width:100%">
                    <th colspan="{{$colspan}}" style="padding:10px;border-bottom:3px solid #5f4a3d;background-color: #212121">
                        Projects</th>
                    <?php
                    $myUtil = new \gotham\Http\Controllers\MyUtilController;
                    $projects = $myUtil->paginate($projects, 25);
                    ?>
                    <tr><td colspan="{{$colspan}}" style="text-align: center">{{ $projects->links() }}</td></tr>


                    <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">
                        <a class="glyphicon glyphicon-plus"
                           style="text-decoration: none; padding-left:10px; padding-bottom:0px;"
                           title="Create a new project"
                           href="/projects/create"></a>
                    </th>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">Name</th>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">Last update</th>
                    <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                    <?php
                        $row = 0;
                        $lineCount = $projects->firstItem();

                    ?>
                    @foreach($projects as $project)
                        <?php
                            $row++;
                            if($row % 2 == 0){
                                $color = "#4C3E31";
                            } else {
                                $color = "none";
                            }
                        ?>
                        <tr style="background-color: {{ $color }}">
                            <td style="padding-left:10px;padding-right:5px">{{$lineCount}}.</td>
                            <td style="padding-right:15px"><a href="projects/{{$project->slug }}">{{$project->name}}</a></td>
                            <td style="padding-right:15px">{{$project->updated_at}}</td>
                        </tr>
                            <?php
                                $lineCount += 1;
                            ?>
                     @endforeach
                </table>
            </div>
        @else 
            <div style="padding:0; background-color:#2c2c2c; padding:5px;" class="col-md-6 col-md-offset-3">
                <table style="width:100%">
                    <th colspan="{{$colspan}}" style="padding:10px;border-bottom:3px solid #5f4a3d;background-color: #212121">
                        Projects</th>
                    <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">
                        <a class="glyphicon glyphicon-plus"
                           style="text-decoration: none; padding-left:10px; padding-bottom:0px;"
                           title="Create a new project"
                           href="/projects/create"></a>
                    </th>
                    <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                    <tr><td style="text-align:center;padding-top:5px;font-weight:bolder; color:black" colspan="{{$colspan}}">No project records found</td></tr>
                </table>
            </div>
        
        @endif
    </div>

@endsection