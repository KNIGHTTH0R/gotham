@extends('templates.dashboard_template')

@section('content')
    <div class="row">
        <div class="col-md-3 col-md-offset-4">
             {{ Form::open(['route' => ['users.update', $user->id], 'method' => 'PUT']) }}
                            <div class="form-register">
                                <h4 class="form-register-heading" style="margin-top: 0">Edit user</h4>
                                {{ csrf_field() }}
                                {{--<h4 class="form-register-heading" style="margin-top: 0">Add User</h4>--}}
                                <label for="first_name" class="sr-only">First name</label>
                                <input type="text" id="first_name" value="{{$user->first_name}}" name="first_name" class="form-control" required autofocus>

                                <label for="inputLastName" class="sr-only">Last name</label>
                                <input type="text" id="last_name" value="{{$user->last_name}}"name="last_name" class="form-control" required autofocus>

                                <label for="inputEmail" class="sr-only">Email address</label>
                                <input type="email" id="email" value="{{$user->email}}" name="email" class="form-control" required autofocus>


                                <button class="btn btn-lg btn-primary btn-block" type="submit">Edit User</button>
                                <a href="/users/{{$user->id}}" class="btn btn-lg btn-secondary btn-block" style="background-color: #f9d1ab"> Cancel </a>

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