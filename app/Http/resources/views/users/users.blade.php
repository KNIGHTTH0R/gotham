@extends('templates.dashboard_template')

@section('scripts')

@endsection

@section('content')
    <div class="row" style="padding:10px; margin-bottom: 200px; overflow-y:auto;">
        <div class="col-md-12" style="overflow-y:scroll;">
            @if(isset($users))
                <?php
                    $linecount = $users->firstItem();
                    $checkboxno = 1;
                ?>
                    
                
                @if($currentpage == 'active_users')
                    <h3 style="text-decoration: none; text-align: center"><a href="/users">Accounts (active)</a></h3>
                    <p style="text-align:center">Records found: <span id="user_total">{{ number_format($users->total())}}</span></p>
                    <a href="/users/inactive">View inactive accounts</a>
                @elseif($currentpage == 'inactive_users')
                    <h3 style="text-decoration: none; text-align: center"><a href="/users">Accounts (inactive)</a></h3>
                    <p style="text-align:center">Records found: <span id="user_total">{{ number_format($users->total())}}</span></p>
                    <a href="/users">View active accounts</a>
                @endif
                <hr />
                
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
                <table>
                    <tr>
                        <td><a class="glyphicon glyphicon-plus" style="font-size: 24px; text-decoration: none;" href="/users/create"></a></td>
                        @if($currentpage == 'inactive_users')
                            <td style="padding-right: 15px;"><input type="checkbox" name="select_all" id="select_all" onclick='handleClick();'/></td>
                        
                        @endif
                    </tr>
                    @foreach($users as $user)
                        @if($currentpage == 'active_users')
                            <tr>
                                <td style="padding-right: 15px;">{{$linecount}}.</td>
    
                                <td style="padding-right: 15px;"><a href="/users/{{$user->id}}">{{$user->last_name}}, {{$user->first_name}}</a></td>
                                <td style="padding-right: 15px;">{{ $user->email }}</td>
                                <td style="padding-right: 15px;">{{ $user->permission_level }}</td>
                            </tr>
                             <?php
                                $linecount += 1;
                             ?>
                         @elseif($currentpage == 'inactive_users')
                              <tr>
                                <td style="padding-right: 15px;">{{$linecount}}.</td>
                                <td style="padding-right: 15px;"><input type="checkbox" id="checkbox-{{$checkboxno}}" name="{{$user->first_name}}" value="{{$user->id}}"/></td>
                                <?php $checkboxno += 1; ?>
                                <td style="padding-right: 15px;"><a href="/users/{{$user->id}}">{{$user->last_name}}, {{$user->first_name}}</a></td>
                                <td style="padding-right: 15px;">{{ $user->email }}</td>
                                <td style="padding-right: 15px;">{{ $user->permission_level }}</td>
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
        function handleClick() {
            var count = parseInt(document.getElementById('user_total').textContent);
            if (select_all.checked){
                
                var i;
                for (i=1; i < count; i++){
                    document.getElementById('checkbox-' + i).checked = true;
                }
                
            } 
            if (select_all.checked == false){
                var i;
                for (i=1; i < count; i++){
                    document.getElementById('checkbox-' + i).checked = false;
                }
            }
        }
    </script>
@endsection