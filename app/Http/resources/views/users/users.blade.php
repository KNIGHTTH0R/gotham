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
                    
                
                @if($currentpage == 'enabled_users')
                        <h3 style="text-decoration: none; text-align: center"><a href="/users">Accounts (<span style="color: #8ccd26">Enabled</span>)</a></h3>
                    <p style="text-align:center">Records found: <span id="user_total">{{ number_format($users->total())}}</span></p>
                    <a href="/users/disabled">View disabled accounts</a>
                @elseif($currentpage == 'disabled_users')
                        <h3 style="text-decoration: none; text-align: center"><a href="/users">Accounts (<span style="color: #cc0000">Disabled</span>)</a></h3>
                    <p style="text-align:center">Records found: <span id="user_total">{{ number_format($users->total())}}</span></p>
                    <a href="/users">View enabled accounts</a>
                @elseif($currentpage == 'search')
                        <h3 style="text-decoration: none; text-align: center"><a href="/users">Accounts (Search)</a></h3>
                        <p style="text-align:center">Records found: <span id="user_total">{{ number_format($users->total())}}</span></p>
                        <a href="/users">View enabled accounts</a>
                @endif
                
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
                
                
                
                <br /><br />

                <table align="center">
                    <tr style="background-color: #4C3E31">

                        <th style="border: 1px solid #f9d1ab; padding: 5px;"><a class="glyphicon glyphicon-plus" style="font-size: 24px; text-decoration: none;" href="/users/create"></a></th>
                        <th style="border: 1px solid #f9d1ab; padding: 5px;">Name</th>
                        <th style="border: 1px solid #f9d1ab; padding: 5px;">Email Address</th>
                        <th style="border: 1px solid #f9d1ab; padding: 5px;">Permission Level</th>

                    </tr>
                    <?php
                        $row = 0;
                        $color = "black";
                    ?>
                    @foreach($users as $user)
                        <?php
                            $row++;
                            if($row % 2 == 0){
                                $color = "#4C3E31";
                            } else {
                                $color = "none";
                            }
                        ?>
                        @if($currentpage == 'enabled_users' || $currentpage == 'search' )
                            <tr>
                                <td style="border: 1px solid #f9d1ab; padding: 5px;background-color: {{$color}}">{{$linecount}}.</td>

                                <td style="border: 1px solid #f9d1ab; padding: 5px;background-color: {{$color}}"><a href="/users/{{$user->id}}">{{$user->last_name}}, {{$user->first_name}}</a></td>
                                <td style="border: 1px solid #f9d1ab; padding: 5px;background-color: {{$color}}">{{ $user->email }}</td>
                                <td style="border: 1px solid #f9d1ab; padding: 5px;background-color: {{$color}}">{{ $user->permission_level }}</td>
                            </tr>
                             <?php
                                $linecount += 1;
                             ?>
                         @elseif($currentpage == 'disabled_users')
                              <tr>
                                <td style="border: 1px solid #f9d1ab; padding: 5px; background-color: {{$color}}">{{$linecount}}.</td>

                                <td style="border: 1px solid #f9d1ab; padding: 5px; background-color: {{$color}}"><a href="/users/{{$user->id}}">{{$user->last_name}}, {{$user->first_name}}</a></td>
                                <td style="border: 1px solid #f9d1ab; padding: 5px; background-color: {{$color}}">{{ $user->email }}</td>
                                <td style="border: 1px solid #f9d1ab; padding: 5px; background-color: {{$color}}">{{ $user->permission_level }}</td>
                            </tr>
                             <?php
                                $linecount += 1;
                             ?>
                         @endif
                    @endforeach
                </table>


            @endif
        </div>
    </div>
    <script>

@endsection