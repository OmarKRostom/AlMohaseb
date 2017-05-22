<!DOCTYPE html>
<html>
<head>
	<title>AlMohaseb - v2.0</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- ALL STYLESHEET -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/all.css') }}">

    <script type="text/javascript">
        window.AlMohaseb = {
            csrfToken: '{{ csrf_token() }}',
            isLogged: {{ auth()->user() ? 'true' : 'false' }}
          };
    </script>
</head>
<body>
	<div id="wrapper">
		@include("admin.includes.navbar")

            <div id="page-wrapper">


        		<!-- CONTENT -->
        		@yield("content")

            </div>
            <!-- /#page-wrapper -->
    </div>
    <!-- /#wrapper -->

    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

    @include('flash::message')
</body>
</html>