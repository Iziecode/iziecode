<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="csrf-token" content="{{csrf_token()}}">
  @stack('meta')
    <title> {{page_title($template)}} </title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/iziecode/adminlte/css/adminlte.mim.css') }}">
    <link rel="stylesheet" href="{{ url('/iziecode/adminlte/plugins/select2/css/select2.min.css') }}">   
    <link rel="stylesheet" href="{{ url('/iziecode/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">   
    <link rel="stylesheet" href="{{mix('css/admin.css')}}">
  @stack('css')
</head>
<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    @include(load_view('layouts.top'))
    @include(load_view('layouts.sidenav'))
    
    <div class="content-wrapper">
      @yield('content')
    </div>

    @include(load_view('layouts.bottom'))
  </div>
  <script src="{{ url('/iziecode/adminlte/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ url('/iziecode/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('/iziecode/adminlte/js/adminlte.min.js') }}"></script> 
  <script src="{{ url('/iziecode/adminlte/plugins/select2/js/select2.min.js') }}"></script>
  <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.select2').select2();
    });
  </script>
  {{-- <script src="{{ url('/js/app.js') }}"></script>  --}}
  
  @stack('js')
</body>
</html>
