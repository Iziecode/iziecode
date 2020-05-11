<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{csrf_token()}}">
  @stack('meta')
    <title> {{get_page_title('gas')}} </title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="/iziecode/adminlte/css/adminlte.mim.css">   
    <link rel="stylesheet" href="{{mix('css/admin.css')}}">
  @stack('css')
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    @include('iziecode::layouts.top')
    @include('iziecode::layouts.sidenav')
    
    <div class="content-wrapper">
      @yield('content')
    </div>

    @include('iziecode::layouts.bottom')
  </div>
  <script src="/iziecode/adminlte/plugins/jquery/jquery.min.js"></script>
  <script src="/iziecode/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/iziecode/adminlte/js/adminlte.min.js"></script> 
  <script src="/js/app.js"></script> 
  @stack('js')
</body>
</html>
