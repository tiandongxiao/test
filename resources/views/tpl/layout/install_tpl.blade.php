<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E行动</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{URL::asset('/')}}bower_components/AdminLTE/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{URL::asset('/')}}css/font-awesome.min.css">
    <!--[if IE 7]>
    <link rel="stylesheet" href="{{URL::asset('/')}}css/font-awesome-ie7.min.css">
    <![endif]-->  
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{URL::asset('/')}}css/ionicons.min.css">
    @yield('css')
    <link rel="stylesheet" href="{{URL::asset('/')}}bower_components/AdminLTE/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="{{URL::asset('/')}}bower_components/AdminLTE/dist/css/skins/skin-green.min.css">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <!--
  BODY TAG OPTIONS:
  =================
  Apply one or more of the following classes to get the
  desired effect
  |---------------------------------------------------------|
  | SKINS         | skin-blue                               |
  |               | skin-black                              |
  |               | skin-purple                             |
  |               | skin-yellow                             |
  |               | skin-red                                |
  |               | skin-green                              |
  |---------------------------------------------------------|
  |LAYOUT OPTIONS | fixed                                   |
  |               | layout-boxed                            |
  |               | layout-top-nav                          |
  |               | sidebar-collapse                        |
  |               | sidebar-mini                            |
  |---------------------------------------------------------|
  -->
  <body class="hold-transition skin-green sidebar-mini">
      <!-- Content Wrapper. Contains page content -->
      <div class="container">
        <!-- Main content -->
        <section class="content" style="min-height:600px;">
          @if($errors)
            @foreach($errors->all() as $error)
              <p class="alert alert-warning">{{ $error }}</p>
            @endforeach
          @endif  
          <!-- Your Page Content Here -->
          @yield('content')
        </section><!-- /.content -->
      </div>
     <script src="{{URL::asset('/')}}bower_components/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
     <script src="{{URL::asset('/')}}bower_components/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
     @yield('script')     
  </body>
</html>