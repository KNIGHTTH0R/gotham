@include('templates.parts.header')

<form class="form-signin" action="{{ url('/login') }}" method="POST">
    {!! csrf_field() !!}
    @include('templates.snippets.form_img')
    <h4 class="form-signin-heading" style="margin-top: 0">Please sign in</h4>
    <label for="email" class="sr-only">Email address</label>
    <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
    <div class="checkbox">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
        <label style="padding-left: 70px">
            <a href="/register">Register here</a>
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>

@include('templates.parts.footer')