@extends('templates.dashboard_template')

@section('scripts')

@endsection

@section('content')
    <div class="row" style="padding:10px; margin-bottom: 200px; overflow-y:auto;">
        <div class="col-md-12" style="overflow-y:scroll;">
            @if(isset($users))
                <?php
                    $linecount = $users->firstItem();
                ?>
              

                <h3 style="text-decoration: none; text-align: center"><a href="/users">Users</a></h3>
                <p style="text-align:center">Records found: {{number_format($users->total())}}</p>
                <hr>
                <form action="/search" method="GET">
                <div style="text-align: center;padding-bottom: 15px;">
                    <div style="">
                        <div class="glyphicon glyphicon-search" style="font-size:16px; border-radius: 3px; border: 1px solid #c09f80;color:#c09f80; text-align:left;">
                            <input type="text" name="q" id="q" class="search" style="background-color: transparent;height:30px;padding: 0; border:none; outline:0;" required/>
                            <hidden type="submit"/>

                        </div>
                    </div>
                    {{$users->links()}}
                </div>
                </form>
                <a class="glyphicon glyphicon-plus" style="font-size: 24px; text-decoration: none;" href="/users/create"></a>
                <br /><br />
                <table>
                    <tr><td colspan="3"></td></tr>
                    @foreach($users as $user)
                        <tr>

                            <td style="padding-right: 15px;">{{$linecount}}.</td>

                            <td style="padding-right: 15px;"><a href="/users/{{$user->id}}">{{$user->last_name}}, {{$user->first_name}}</a></td>
                            <td style="padding-right: 15px;">{{ $user->email }}</td>
                            <td>{{ $user->permission_level }}</td>
                        </tr>
                         <?php
                            $linecount += 1;
                         ?>
                    @endforeach


                </table>

            @endif
        </div>
    </div>
@endsection