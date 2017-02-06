@extends('templates.dashboard_template')

@section('scripts')
<script>
        function deleteProject() {
            var response = confirm("Are you sure you would like to delete this project?\nThis process is not reversible!");
            if (response){
                return true;
            } else {
                return false;
            }
        }
    </script>
@endsection

@section('content')
    <div class="row" style="margin:25px; margin-bottom: 25px; padding-right:10px">
        <?php   
            $colspan = 3;
        ?>
        <div style="margin-bottom: 10px; background-color:#2c2c2c; padding:5px; " class="col-md-11">
            <table style="width:100%">
                <th colspan="{{$colspan}}" style="padding:10px;border-bottom:3px solid #5f4a3d;background-color: #212121">
                        Project: {{ $project->name }}</th>
                <tr><td>Description: {{ $project->description }}</td></tr>
            </table>
        </div>

        <div style="margin-right: 2px; background-color:#2c2c2c;padding: 5px;" class="col-md-8">
            <table style="width:100%; ">
                <th colspan="{{$colspan}}"
                    style="padding:10px;border-bottom:3px solid #5f4a3d;background-color: #212121">
                    Your RFI's
                </th>

                <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                <th style="padding-left:10px;border-bottom:1px solid #5f4a3d;background-color: #212121">Subject</th>
                <!--<th style="border-bottom:1px solid #5f4a3d;background-color: #212121">Submitted by</th>-->
                <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">Last update</th>
                <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                </tr>
                <tr>
                    @foreach($project->rfis()->get() as $rfi)
                        @if($rfi->user_id == Auth::id())
                            <td style="padding:3px;">{{ $rfi->subject }}</td>
                        <!--<td>{{ gotham\User::find($rfi->user_id)->first_name }}</td>-->
                            <td>{{ $rfi->updated_at }}</td>
                        @endif
                </tr>
                @endforeach
            </table>
        </div>
        <div style="background-color:#2c2c2c; padding:5px;" class="col-md-3">
            <table style="width:100%">
                <th colspan="{{$colspan}}" style="padding:10px;border-bottom:3px solid #5f4a3d;background-color: #212121">
                    Collaborators</th>
                <!--- Finish this section later!!! You need to add collaborators to project page-->
                <!--- Add Collaborators by saving User to $project->user()->save($user), any other
                      way will provide unexpected results --->
                @foreach(gotham\Project::find($project->id)->users as $collaborators)
                    <tr><td>{{ $collaborators->first_name }}</td></tr>
                @endforeach
            </table>
        </div>

        <div style="padding:0; background-color:#2c2c2c; padding:5px;margin-top: 10px;" class="col-md-8">
            <table style="width:100%">
                <th colspan="{{$colspan}}"
                    style="padding:10px;border-bottom:3px solid #5f4a3d;background-color: #212121">
                    All Other RFI's
                </th>

                <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                <th style="padding-left:10px;border-bottom:1px solid #5f4a3d;background-color: #212121">Subject</th>
                <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">Submitted by</th>
                <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">Last update</th>
                <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                </tr>
                <tr>
                    @foreach($project->rfis()->get() as $rfi)
                        @if($rfi->user_id != Auth::id())
                            <td style="padding:3px;">{{ $rfi->subject }}</td>
                            <td>{{ gotham\User::find($rfi->user_id)->first_name }}</td>
                            <td>{{ $rfi->updated_at }}</td>
                        @endif
                </tr>
                @endforeach
            </table>
        </div>

    </div>

    <div class="row" style="margin:25px; margin-bottom: 200px;padding-right:10px">
        


    </div>
    
@endsection