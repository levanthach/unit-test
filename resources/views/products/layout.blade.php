<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5.8 CRUD Application</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/custom.css') }}">
</head>
<body style="background:#e1e1e1">
  
<div class="container">
    @yield('content')
</div>
   
</body>
	<script src="{{ asset('js/app.js') }}" type="text/javascript" charset="utf-8" async defer></script>
</html>