@include('templates.parts.header')
@if($errors->any())
    <div class="alert alert-danger">
        <strong>{{$errors->first()}}</strong>
    </div>
@endif
<form method="POST" action="/register" style="padding-bottom:100px;">
    <div class="form-register">
        @include('templates.snippets.form_img')
        {{ csrf_field() }}
        <h4 class="form-signin-heading" style="margin-top: 0">Please register</h4>
        {{--<h4 class="form-register-heading" style="margin-top: 0">Add User</h4>--}}
        <label for="first_name" class="sr-only">First name</label>
        <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First name" required autofocus>

        <label for="inputLastName" class="sr-only">Last name</label>
        <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last name" required autofocus>

        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>

        <label for="password-confirm" class="sr-only">Password again</label>
        <input type="password" id="password-confirm" name="password_confirmation" class="form-control" placeholder="Password again" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Add User</button>

    </div>

</form>

@include('templates.parts.footer')