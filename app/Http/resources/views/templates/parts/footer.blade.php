<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>--}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="/js/bootstrap.min.js"></script>
{{--<script src="/js/bootstrap-select.js"></script>--}}
<script src="/js/ajax.js"></script>
<script src="/js/bootstrap-select.js"></script>
<script src="/js/toastr.min.js"></script>
<script src="/js/socket.io.min.js"></script>
<script src="/js/vue.min.js"></script>



<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->

@if (isset(Auth::User()->permission_level))
     <script>
        var uid = "<?php echo Auth::id(); ?>";
    </script>
    @if(Auth::User()->permission_level == 'Administrators')
        <script type="text/javascript" src="/js/gotham-1.js"></script>
    @elseif(Auth::User()->permission_level == 'Users')
        <script type="text/javascript" src="/js/gotham-2.js"></script>
    
    @endif
   
@endif
@yield('scripts')

</body>
</html>
