@extends('templates.dashboard_template')

@section('scripts')
    <script>
        function deleteUser() {
            var response = confirm("Are you sure you would like to delete this user?\nThis process is not reversible!");
            if (response){
                return true;
            } else {
                return false;
            }
        }
    </script>
@endsection

@section('content')
    @if(isset($user))
    <div style="margin-left: 10px">
        <h1 id="name">{{$user->last_name}}, {{ $user->first_name }}</h1>

        <p>{{$user->email}}</p>
        <p>Permission Group: {{ $user->permission_level }}</p>
        @if($user->account_status == 'Enabled')
            <p id="status">Account Status: <span style="color: #8ccd26">{{ $user->account_status }}</span></p>
        @elseif($user->account_status == 'Disabled')
            <p id="status">Account Status: <span style="color: #cc0000">{{ $user->account_status }}</span></p>
        @endif

        
        <div style="margin-top:100px;">
            <a href="{{ url('users/'.$user->id.'/edit') }}" class="btn btn-primary" style="float:left; margin-right:10px;">Edit</a>
            {{ Form::open(['route' => ['users.destroy', $user->id], 'method' => 'delete']) }}
            <button type="submit" class="btn btn-danger" id="confirm" title="Delete User" onclick="return deleteUser();">Delete</button>
            {{ Form::close() }}
        </div>
       
    </div>
   @endif


@endsection