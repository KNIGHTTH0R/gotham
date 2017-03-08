@extends('templates.dashboard_template')

@section('scripts')

@endsection

@section('content')
   <div class="row" style="margin:25px; margin-right:125px; margin-bottom: 200px;">
        <?php
        $colspan = 8;
        ?>
        @if($posts->count() > 0)

            <div style="padding:0; background-color:#2c2c2c; padding:5px;" class="col-md-9 col-md-offset-1">
                <table style="width:100%">
                    <th colspan="{{$colspan}}" style="padding:10px;border-bottom:3px solid #5f4a3d;background-color: #212121">
                        Posts</th>
                    <?php
                    $myUtil = new \gotham\Http\Controllers\MyUtilController;
                    $posts = $myUtil->paginate($posts, 25);
                    ?>
                    <tr><td colspan="{{$colspan}}" style="text-align: center">{{ $posts->links() }}</td></tr>


                    <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">
                       <span style="padding-left:10px;padding-right:10px">#</span>
                    </th>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121;padding-left:10px;padding-right:10px">Project</th>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">Subject</th>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">Submitter</th>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">Last update</th>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">RFI Status</th>

                    <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                    <?php
                    $row = 0;
                    $lineCount = $posts->firstItem();

                    ?>
                    @foreach($posts as $post)
                        <?php
                        $row++;
                        if($row % 2 == 0){
                            $color = "#4C3E31";
                        } else {
                            $color = "none";
                        }
                        ?>
                        <tr style="background-color: {{ $color }}">
                            <td style="padding-left:10px;padding-right:10px">{{$lineCount}}.</td>
                            <td style="padding-left:1px;padding-right:10px">{{$post->rfi->subject}}</td>
                            <td style="padding-right:15px"><a href="/projects/rfis/posts/{{$post->slug }}">{{$post->subject}}</a></td>
                            <td style="padding-right:15px">{{gotham\User::find($post->user_id)->getFullName()}}</td>
                            <td style="padding-right:15px">{{$post->updated_at}}</td>
                             <td style="padding-right:15px">{{$post->rfi->status}}</td>
                        </tr>
                        <?php
                        $lineCount += 1;
                        ?>
                    @endforeach
                </table>
            </div>
        @else
            <div style="padding:0; background-color:#2c2c2c; padding:5px;" class="col-md-6 col-md-offset-3">
                <table style="width:100%">
                    <th colspan="{{$colspan}}" style="padding:10px;border-bottom:3px solid #5f4a3d;background-color: #212121">
                        Posts</th>
                    <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                    <th style="border-bottom:1px solid #5f4a3d;background-color: #212121">
                        <a class="glyphicon glyphicon-plus"
                           style="text-decoration: none; padding-left:10px; padding-bottom:0px;"
                           title="Create a new project"
                           href="/project/rfis/posts/create"></a>
                    </th>
                    <tr><td colspan="{{$colspan}}"><hr style="margin:0; border-color:#5f4a3d"></td></tr>
                    <tr><td style="text-align:center;padding-top:5px;font-weight:bolder; color:black" colspan="{{$colspan}}">No RFI Post records found</td></tr>
                </table>
            </div>

        @endif
    </div>

@endsection