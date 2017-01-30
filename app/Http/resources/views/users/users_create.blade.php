@extends('templates.dashboard_template')

@section('content')
    <form class="form-register">
        <h4 class="form-register-heading" style="margin-top: 0">Add User</h4>
        <label for="inputFirstName" class="sr-only">First name</label>
        <input type="text" id="inputFirstName" class="form-control" placeholder="First name" required autofocus>

        <label for="inputLastName" class="sr-only">Last name</label>
        <input type="text" id="inputLastName" class="form-control" placeholder="Last name" required autofocus>

        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        
        <label for="permission_level" class="sr-only">Permission Level</label>
        <input type="permission_level" id="permission_level" class="form-control" placeholder="Email address" required autofocus>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>

        <label for="inputPasswordAgain" class="sr-only">Password again</label>
        <input type="password" id="inputPasswordAgain" class="form-control" placeholder="Password again" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Add User</button>
    </form>
@endsection