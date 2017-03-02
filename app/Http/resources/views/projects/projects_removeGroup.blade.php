@extends('templates.dashboard_template')

@section('scripts')

@endsection

@section('content')
<div class="row" style="margin:25px; margin-bottom: 200px;">
    <?php
        $colspan = 4;
    ?>
    <div style="padding:0; background-color:#2c2c2c; padding:5px;" class="col-md-6 col-md-offset-3">

        <table style="width:100%">
            <th colspan="2" style="padding:10px;border-bottom:3px solid #5f4a3d;background-color: #212121;">
                Select group(s) to remove from: <br />{{$project->name}}</th>
            <th colspan="2" style="padding:10px;border-bottom:3px solid #5f4a3d;background-color: #212121;">
                 <a style="float: right;" href="/projects/remove_collaborator/{{ $project->slug }}">Remove Users: {{ $project->users()->count() }}</a>
             </th>
            <form class="form-register" method="POST" action="/projects/remove_group">
            {{csrf_field()}}

            <?php 
                
               
            
                $myUtil = new \gotham\Http\Controllers\MyUtilController;
                //$groupCollection = gotham\Group::get();
                $projectGroupCollection = $project->groups()->get();
                
                // dd($project->groups()->count());
                
                $diff = $projectGroupCollection;
               
                $diff = $myUtil->paginate($diff, 10);
            ?>
             @if($diff->count() > 0)
    
                    <tr><td colspan="{{$colspan}}" style="text-align: center">{{ $diff->links() }}</td></tr>
                    <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121"></th>
                    <th colspan="{{$colspan}}" style="border-bottom:1px solid #5f4a3d;background-color: #212121">Name</th>
                    <tr><td colspan="{{$colspan}}"><hr style="margin:0; margin-bottom:5px; border-color:#5f4a3d"></td></tr>

                @foreach($diff as $group)
                <tr><td><input type="checkbox" name="selected[]" value="{{$group->id}}"/></td>
                    <td>{{$group->name}}</td>
                    
                </tr>
                @endforeach
                <tr><td colspan="{{$colspan}}"><button class="btn btn-lg btn-primary btn-block" 
                            type="submit" style="margin-top:30px;">Remove Group(s) from Project</button>
                    <input type="hidden" name="uid" value="{{ Auth::id() }}" >
                    <input type="hidden" name="pid" value="{{ $project->id }}"/>
            </td></tr>
            @else
                <tr><td style="text-align:center;padding-top:5px;font-weight:bolder; color:black" colspan="{{$colspan}}">No groups found that can be removed</td></tr>
            @endif
            
            
            @if($errors->any())
                <tr><td class="alert alert-danger"><strong>{{$errors->first()}}</strong></td></tr>   
            @endif
            
            </form>
        </table>
    </div>
</div>
@endsection