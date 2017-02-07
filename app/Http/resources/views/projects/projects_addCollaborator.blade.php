@extends('templates.dashboard_template')

@section('content')
<div class="row" style="margin:25px; margin-bottom: 200px;">
    <?php
        $colspan = 4;
    ?>
    <div style="padding:0; background-color:#2c2c2c; padding:5px;" class="col-md-6 col-md-offset-3">
        <table style="width:100%">
            <th colspan="{{$colspan}}" style="padding:10px;border-bottom:3px solid #5f4a3d;background-color: #212121">
                Select user(s) to add to: <br />{{$project->name}}</th>
            <form class="form-register" method="POST" action="/projects/add_collaborator">
            {{csrf_field()}}
             <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121"></th>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">Last Name</th>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">First Name</th>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">Email</th>
                    <tr><td colspan="{{$colspan}}"><hr style="margin:0; margin-bottom:5px; border-color:#5f4a3d"></td></tr>
            
            <?php 
                $myUtil = new \gotham\Http\Controllers\MyUtilController;
                $enabledUserCollection = \gotham\User::where('account_status', 'Enabled')->get();
                $projectUserCollection = \gotham\Project::find($project->id)->users()->get();
                
                $diff = $enabledUserCollection->diff($projectUserCollection);
                
                $diff = $myUtil->paginate($diff, 10)
            ?>
             @if($diff->count() > 0) 
                 <tr><td colspan="{{$colspan}}">{{ $diff->links() }}</td></tr>
                @foreach($diff as $user)
                <tr><td><input type="checkbox" name="selected[]" value="{{$user->id}}"/></td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->first_name}}</td>
                    <td>{{$user->email}}</td>
                </tr>
                @endforeach
                <tr><td colspan="{{$colspan}}"><button class="btn btn-lg btn-primary btn-block" 
                            type="submit" style="margin-top:30px;">Add User Project</button>
                    <input type="hidden" name="uid" value="{{ Auth::id() }}" >
                    <input type="hidden" name="pid" value="{{ $project->id }}"/>
            </td></tr>
            @else
                <tr><td style="text-align:center;padding-top:5px;font-weight:bolder; color:black" colspan="{{$colspan}}">No enabled users found that can be added</td></tr>
            @endif
            
            
            @if($errors->any())
                <tr><td class="alert alert-danger"><strong>{{$errors->first()}}</strong></td></tr>   
            @endif
            
            </form>
        </table>
    </div>
</div>
@endsection