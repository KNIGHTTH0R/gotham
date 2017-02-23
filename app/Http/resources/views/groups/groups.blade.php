@extends('templates.dashboard_template')

@section('scripts')

@endsection

@section('content')
    <div class="row" style="margin:25px; margin-bottom: 200px;">
        <?php
        $colspan = 3;
        ?>
        @if($groups->count() > 0)

            <div style="padding:0; background-color:#2c2c2c; padding:5px;" class="col-md-6 col-md-offset-3">
                <table style="width:100%">
                    <th colspan="{{$colspan}}" style="padding:10px;border-bottom:3px solid #5f4a3d;background-color: #212121">
                        Groups</th>
                    <tr>
                        <td style="text-align:left;" colspan="{{$colspan}}">
                            <a class="glyphicon glyphicon-plus"
                               style="text-decoration: none; padding-top:10px; padding-bottom:10px;"
                               title="Create a new project"
                               href="/groups/create"></a>
                            <a class="glyphicon glyphicon-th-list"
                               title="List all groups"
                               style="text-decoration: none; padding-top:10px; padding-bottom:10px;"
                               href="/groups"></a>
                        </td>

                    </tr>
                    <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">Name</th>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">Member count</th>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">Last update</th>
                    <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                    @foreach($groups as $group)
                        <tr>
                            <td style="padding-right:15px"><a href="groups/{{$group->slug }}">{{$group->name}}</a></td>
                            <td style="padding-right:15px">{{$group->users->count()}}</td>
                            <td style="padding-right:15px">{{$group->updated_at}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        @else
            <div style="padding:0; background-color:#2c2c2c; padding:5px;" class="col-md-6 col-md-offset-3">
                <table style="width:100%">
                    <th colspan="{{$colspan}}" style="padding:10px;border-bottom:3px solid #5f4a3d;background-color: #212121">
                        groups</th>
                    <tr>
                        <td style="text-align:left;" colspan="{{$colspan}}">
                            <a class="glyphicon glyphicon-plus"
                               style="text-decoration: none; padding-top:10px; padding-bottom:10px;"
                               title="Create a new project"
                               href="/groups/create"></a>
                            <a class="glyphicon glyphicon-th-list"
                               title="List all groups"
                               style="text-decoration: none; padding-top:10px; padding-bottom:10px;"
                               href="/groups"></a>
                        </td>

                    </tr>
                    <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">Name</th>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">Last update</th>
                    <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                    <tr><td style="text-align:center;padding-top:5px;font-weight:bolder; color:black" colspan="{{$colspan}}">No project records found</td></tr>
                </table>
            </div>

        @endif
    </div>

@endsection