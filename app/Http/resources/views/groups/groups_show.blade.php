@extends('templates.dashboard_template')

@section('scripts')
<script>
        function deleteGroup() {
            var response = confirm("Are you sure you would like to delete this group?\nThis process is not reversible!");
            if (response){
                return true;
            } else {
                return false;
            }
        }
    </script>
@endsection

@section('content')
    <div class="row" style="margin:25px; margin-right:125px; margin-bottom: 200px;">
        <?php
            $colspan = 3;
        ?>
        <div style="margin-bottom: 10px; background-color:#2c2c2c; padding:5px; " class="col-md-4 col-md-offset-4">
            <table style="width:100%">
                <th colspan="{{$colspan}}" style="font-size:18px;text-align:center;padding:10px;border-bottom:3px solid #5f4a3d;background-color: #212121">
                        <a href="/groups">Group:</a> {{ $group->name }}</th>
                <tr><td>
                        @if ($group->name != 'Administrators' && $group->name != 'Users' && $group->name != 'Guests')
                            <a class="glyphicon glyphicon-edit"
                            title="Edit Group"
                            style="text-decoration: none; padding-top:10px;padding-bottom:10px;" href="/groups/{{$group->slug}}/edit"></a>
                        @endif
                        <a class="glyphicon glyphicon-plus"
                           title="Add User to group"
                           style="text-decoration: none; padding-top:10px;padding-bottom:10px;" href="/groups/add_user/{{$group->slug}}"></a>
                        <a class="glyphicon glyphicon-minus"
                           title="Remove User from group"
                           style="text-decoration: none; padding-top:10px;padding-bottom:10px;" href="/groups/remove_user/{{$group->slug}}"></a>
                </td></tr>
                <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                <tr><th style="text-align: center">Group Members</th></tr>
                <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                @foreach ($group->users as $group_user)
                    <tr><td><a href="/users/{{ Hashids::encode($group_user->id) }}">{{ $group_user->getFullName() }}</a></td></tr>
                @endforeach

            </table>
        </div>

    </div>
    
@endsection