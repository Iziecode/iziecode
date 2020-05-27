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
    
    <link rel="stylesheet" href="{{ url('/vendor/iziecode/plugins/summernote/summernote.min.css') }}">
    <link rel="stylesheet" href="{{ url('/vendor/iziecode/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ url('/vendor/iziecode/plugins/select2/css/select2.min.css') }}">   
    <link rel="stylesheet" href="{{ url('/vendor/iziecode/plugins/select2-bootstrap4-theme/select2-bootstrap4.css') }}"> 
    <link rel="stylesheet" href="{{ url('/vendor/iziecode/dist/css/iziecode.css') }}">
    <link rel="stylesheet" href="{{ url('/vendor/iziecode/dist/css/adminlte.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ mix('/css/iziecode.css') }}">  for testing --}}
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
  <script src="{{ url('/vendor/iziecode/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ url('/vendor/iziecode/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('/vendor/iziecode/dist/js/adminlte.min.js') }}"></script> 
  <script src="{{ url('/vendor/iziecode/plugins/daterangepicker/moment.min.js') }}"></script>
  <script src="{{ url('/vendor/iziecode/plugins/summernote/summernote.min.js') }}"></script>
  <script src="{{ url('/vendor/iziecode/plugins/daterangepicker/daterangepicker.js') }}"></script>
  <script src="{{ url('/vendor/iziecode/plugins/select2/js/select2.min.js') }}"></script>
  <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('.select2').select2();

      $('.datepicker').each(function(){
        config = {
          singleDatePicker : true,
          showDropdowns: true,
          startDate : $(this).data('value') != '' ? $(this).data('value') : moment(),
          locale : {
            format : 'YYYY-MM-DD'
          }
        }
        $(this).daterangepicker(config);
      })

      $('.rangedatepicker').daterangepicker({
        showDropdowns: true,
        locale : {
          format : 'YYYY-MM-DD'
        }
      })

      $('.summernote').summernote();

      function getData(){
        $('.ajaxable').each(function(){
          var url = $(this).data('ajax-url');
          $.get(url,function(){
            alert("success")
          })
          .fail(function(){
            alert('error')
          })
        })
      }
      
      var _this = this;
      $('.watch').change(function(){
        var id = $(this).data('watch-id');
        $("#"+id).addClass('ajaxable')
        getData();
      });

    });
  </script>
  {{-- <script src="{{ url('/vendor/js/app.js') }}"></script>  --}}
  
  @stack('js')
</body>
</html>
