<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">AlMohaseb v2.0</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <!-- /.dropdown -->
        <li><a href="{{route("logout")}}"><span class="glyphicon glyphicon-log-in"></span> Logout({{Auth::user()->name}})</a></li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    @include("admin.includes.sidebar")
    <!-- /.navbar-static-side -->
</nav>