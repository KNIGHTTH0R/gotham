<div class="dashboard_sidebar">
    <div class="dashboard_sidebar_inner">
        <div class="dashboard_sidebar_inner_logo">
            <div class="dashboard_sidebar_inner_logo_inner">
                <a href="/"><img src="/themes/dark/img/logo_city_1.png" border="0"></a>
            </div>
        </div>
        <div class="dashboard_sidebar_menu" style="text-align: center">
            <ol class="list-group">
                <li class="list-group-item" style="border: none;">
                    <a class="btn glyphicon glyphicon-home" style="font-size: 30px;
                         background: none; border: none;padding: 0; outline: 0" href="/"></a>
                </li>
                <li class="list-group-item" style="border: none; ">
                    <a class="btn glyphicon glyphicon-user" style="font-size: 30px;
                         background: none; border: none;padding: 0; outline: 0" href="/users/{{Auth::user()->id}}"></a>
                </li>
                <li class="list-group-item" style="border: none; color: #c09f80">
                    <form method="POST" action="{{url('/logout')}}">
                        {{ csrf_field() }}
                        <button type="submit" class="btn glyphicon glyphicon-off" style="font-size: 30px;
                         background: none; border: none;padding: 0; outline: 0" ></button>
                    </form>
                </li>

            </ol>
        </div>
    </div>
</div>