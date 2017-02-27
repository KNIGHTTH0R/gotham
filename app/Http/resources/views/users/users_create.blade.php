@extends('templates.dashboard_template')

@section('content')
    <form class="form-register" method="POST" action="/users">
        {{csrf_field()}}
        <h4 class="form-register-heading" style="margin-top: 0">Add User</h4>
        <label for="inputFirstName" class="sr-only">First name</label>
        <input type="text" id="inputFirstName" name="first_name" class="form-control" placeholder="First name" required autofocus>

        <label for="inputLastName" class="sr-only">Last name</label>
        <input type="text" id="inputLastName" name="last_name" class="form-control" placeholder="Last name" required>

        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required>
        
        <label for="permission_level" class="sr-only">Permission Level</label>
        <select id="permission_level" name="permission_level" class="form-control myselect" required>
            <option value="Guests">Guest</option>
            <option value="Users">User</option>
            <option value="Administrators">Administrator</option>
        </select>
        <br />
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>

        <label for="inputPasswordAgain" class="sr-only">Password again</label>
        <input type="password" id="inputPasswordAgain" name="password_confirmation" class="form-control" placeholder="Password again" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Add User</button>
         @if($errors->any())
        <div class="alert alert-danger">
            <strong>{{$errors->first()}}</strong>
        </div>
        @endif
    </form>
@endsection