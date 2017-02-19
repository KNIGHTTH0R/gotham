@extends('templates.dashboard_template')

@section('content')
<div class="row" style="margin:25px; margin-bottom: 200px;">
    <?php
        $colspan = 3;
    ?>
    <div style="padding:0; background-color:#2c2c2c; padding:5px;" class="col-md-4 col-md-offset-4">
        <table style="width:100%">
            <th colspan="{{$colspan}}" style="padding:10px;border-bottom:3px solid #5f4a3d;background-color: #212121">
                Create Group</th>
            <form class="form-register" method="POST" action="/groups">
            {{csrf_field()}}
            <label for="groupName" class="sr-only">Group name</label>
            <tr><td style="padding-top:15px; padding-bottom:5px"><input type="text" id="groupName" name="name"
                   class="form-control" placeholder="Group name" required autofocus></td></tr>
            <tr><td><button class="btn btn-lg btn-primary btn-block" 
                            type="submit" style="margin-top:30px;">Add Group</button>
                    <input type="hidden" name="uid" value="{{ Auth::id() }}" >
            </td></tr>
            @if($errors->any())
                <tr><td class="alert alert-danger"><strong>{{$errors->first()}}</strong></td></tr>   
            @endif
            
            </form>
        </table>
    </div>
</div>
@endsection