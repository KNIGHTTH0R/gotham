<div class="dashboard_header">
    <div class="dashboard_header_inner" >
        <?php
            $myutil = new gotham\Http\Controllers\MyUtilController;
        ?>
        <p style="color: #ccc; line-height:70px;  text-align:center" class="col-md-12">Welcome, {{ $myutil->firstlettertoupper(Auth::User()->first_name) }}</p>
    </div>
</div>