@extends('templates.dashboard_template')

@section('scripts')

@endsection

@section('content')
    <div class="row">
        <div class="col-md-3 col-md-offset-4">
             {{ Form::open(['route' => ['users.update', Hashids::encode($user->id)], 'method' => 'PUT']) }}
                            <div class="form-register">
                                <h4 class="form-register-heading" style="margin-top: 0">Edit user</h4>
                                {{ csrf_field() }}
                                {{--<h4 class="form-register-heading" style="margin-top: 0">Add User</h4>--}}
                                <label for="first_name" class="sr-only">First name</label>
                                <input type="text" id="first_name" value="{{$user->first_name}}" name="first_name" class="form-control" required autofocus>

                                <label for="inputLastName" class="sr-only">Last name</label>
                                <input type="text" id="last_name" value="{{$user->last_name}}" name="last_name" class="form-control" required>

                                <label for="inputEmail" class="sr-only">Email address</label>
                                <input type="email" id="email" value="{{$user->email}}" name="email" class="form-control" required>
                                
                                <label for="permission_level" class="sr-only">Permission Level</label>
                                <select id="permission_level" name="permission_level" class="form-control myselect" required>
                                    @if($user->permission_level == 'Guests')
                                        <option value="Guests" selected>Guest</option>
                                        <option value="Users">User</option>
                                        <option value="Administrators">Administrator</option>
                                    @elseif($user->permission_level == 'Users')
                                        <option value="Guests">Guest</option>
                                        <option value="Users" selected>User</option>
                                        <option value="Administrators">Administrator</option>
                                    @elseif($user->permission_level == 'Administrators')
                                        <option value="Guests">Guest</option>
                                        <option value="Users">User</option>
                                        <option value="Administrators" selected>Administrator</option>
                                    @endif
                                </select>
                                <select id="account_status" name="account_status" class="form-control myselect" required>
                                    @if($user->account_status == 'Enabled')
                                        <option value="Enabled" selected>Enabled</option>
                                        <option value="Disabled">Disabled</option>
                                    @elseif($user->account_status == 'Disabled')
                                        <option value="Enabled">Enabled</option>
                                        <option value="Disabled" selected>Disabled</option>
                                    @endif
                                </select>
                                <br />
                                
                                <button class="btn btn-lg btn-primary btn-block" type="submit">Edit User</button>
                                <a href="{{route('users.show', Hashids::encode($user->id))}}" class="btn btn-lg btn-secondary btn-block" style="background-color: #f9d1ab"> Cancel </a>

                            </div>
                            @if($errors->any())
                                <div class="alert alert-danger">
                                    <strong>{{$errors->first()}}</strong>
                                </div>
                            @endif
            {{ Form::close() }}
        </div>
    </div>
@endsection