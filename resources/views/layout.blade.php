<!DOCTYPE html>
<html>
<head>
	<title>AlMohaseb - v2.0</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- FONTAWESOME -->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- ALL STYLESHEET -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/all.css') }}">

    <script type="text/javascript">
        window.AlMohaseb = {
            csrf: '{{ csrf_token() }}',
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

    <!-- jQuery -->
    <script src="/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/js/sb-admin-2.js"></script>

    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/all.js') }}"></script>

    @include('flash::message')
</body>
</html>