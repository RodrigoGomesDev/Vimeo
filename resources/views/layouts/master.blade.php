<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Starter</title>
   <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper" id="app">
  <div class="content-wrapper">
    <section class="content container-fluid">
        @yield('content')    
    </section>
  </div>
</div>
</body>
</html> 