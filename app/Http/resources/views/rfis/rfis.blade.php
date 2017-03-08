@extends('templates.dashboard_template')

@section('scripts')

@endsection

@section('content')
    <div class="row" style="margin:25px; margin-right:125px; margin-bottom: 200px;">
        <?php
        $colspan = 8;
        ?>
        @if($rfis->count() > 0)

            <div style="padding:0; background-color:#2c2c2c; padding:5px;" class="col-md-9 col-md-offset-1">
                <table style="width:100%">
                    <th colspan="{{$colspan}}" style="padding:10px;border-bottom:3px solid #5f4a3d;background-color: #212121">
                        RFIs</th>
                    <?php
                    $myUtil = new \gotham\Http\Controllers\MyUtilController;
                    $rfis = $myUtil->paginate($rfis, 25);
                    ?>
                    <tr><td colspan="{{$colspan}}" style="text-align: center">{{ $rfis->links() }}</td></tr>


                    <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">
                       <span style="padding-left:10px;padding-right:10px">#</span>
                    </th>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121;padding-left:10px;padding-right:10px">Project</th>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">RFI ID</th>
                    
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">Subject</th>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">Submitter</th>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">Last update</th>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">Updated by</th>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">Status</th>

                    <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                    <?php
                    $row = 0;
                    $lineCount = $rfis->firstItem();

                    ?>
                    @foreach($rfis as $rfi)
                        <?php
                        $row++;
                        if($row % 2 == 0){
                            $color = "#4C3E31";
                        } else {
                            $color = "none";
                        }
                        ?>
                        <tr style="background-color: {{ $color }}">
                            <td style="padding-left:10px;padding-right:10px">{{$lineCount}}.</td>
                            <td style="padding-left:10px;padding-right:10px"><a href="/projects/{{gotham\Project::find($rfi->project_id)->slug}}">{{ gotham\Project::find($rfi->project_id)->name }}</a></td>
                            <td style="padding-left:1px;padding-right:10px">{{$rfi->control_number}}</td>
                            <td style="padding-right:15px"><a href="/projects/rfis/{{$rfi->slug }}">{{$rfi->subject}}</a></td>
                            <td style="padding-right:15px">{{gotham\User::find($rfi->user_id)->getFullName()}}</td>
                            <td style="padding-right:15px">{{$rfi->updated_at}}</td>
                            <td style="padding-right:15px">{{gotham\User::find($rfi->last_updated_by)->getFullName()}}</td>
                             <td style="padding-right:15px">{{$rfi->status}}</td>
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
                        RFIs</th>
                    <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">
                        <a class="glyphicon glyphicon-plus"
                           style="text-decoration: none; padding-left:10px; padding-bottom:0px;"
                           title="Create a new project"
                           href="/rfis/create"></a>
                    </th>
                    <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                    <tr><td style="text-align:center;padding-top:5px;font-weight:bolder; color:black" colspan="{{$colspan}}">No RFI records found</td></tr>
                </table>
            </div>

        @endif
    </div>

@endsection