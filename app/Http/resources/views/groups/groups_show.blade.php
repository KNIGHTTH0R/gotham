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
    <div class="row" style="margin:25px; margin-bottom: 200px; padding-right:10px;">
        <?php
            $colspan = 3;
        ?>
        <div style="margin-bottom: 10px; background-color:#2c2c2c; padding:5px; " class="col-md-4 col-md-offset-4">
            <table style="width:100%">
                <th colspan="{{$colspan}}" style="font-size:18px;text-align:center;padding:10px;border-bottom:3px solid #5f4a3d;background-color: #212121">
                        <a href="/groups">Group:</a> {{ $group->name }}</th>
                <tr><td>
                        <a class="glyphicon glyphicon-edit"
                        title="Edit Group"
                        style="text-decoration: none; padding-top:10px;padding-bottom:10px;" href="/groups/{{$group->slug}}/edit"></a>
                </td></tr>
                <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                @foreach ($group->users as $group_users)
                    <tr><td>{{ $group_users->first_name }}</td></tr>
                @endforeach

            </table>
        </div>

    </div>
    
@endsection