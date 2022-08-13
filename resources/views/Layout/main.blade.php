<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    @if(!empty($title))
        <title>{{$title}}</title>
    @else
        <title>Admin</title>
    @endif
    <!-- <title>Director | Dashboard</title> -->
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Developed By M Abdur Rokib Promy">
    <meta name="keywords" content="Admin, Bootstrap 3, Template, Theme, Responsive">
    <!-- bootstrap 3.0.2 -->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="{{ asset('css/ionicons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="{{ asset('css/morris/morris.css')}}" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="{{ asset('css/jvectormap/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="{{ asset('css/datepicker/datepicker3.css')}}" rel="stylesheet" type="text/css" />
    <!-- fullCalendar -->
    <!-- <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" /> -->
    <!-- Daterange picker -->
    <link href="{{ asset('css/daterangepicker/daterangepicker-bs3.css')}}" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="{{ asset('css/iCheck/all.css')}}" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <!-- <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> -->
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!-- Theme style -->
    <link href="{{ asset('css/style.css')}}" rel="stylesheet" type="text/css" />



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->

          <style type="text/css">

          </style>
      </head>
      <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            @include('Layout.header')
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
                    <!-- Left side column. contains the logo and sidebar -->
                    @include('Layout.sidebar')

                    <aside class="right-side">
                @yield('dashboard')

            <section class="content">
                <div class="row">

                    @yield('content')

                </div>
            </section>


        </div>


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="{{ asset('js/jquery.min.js')}}" type="text/javascript"></script>

        <!-- jQuery UI 1.10.3 -->
        <script src="{{ asset('js/jquery-ui-1.10.3.min.js')}}" type="text/javascript"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('js/bootstrap.min.js')}}" type="text/javascript"></script>
        <!-- daterangepicker -->

        <script src="{{ asset('js/plugins/chart.js')}}" type="text/javascript"></script>



        <!-- Director App -->
        <script src="{{ asset('js/Director/app.js')}}" type="text/javascript"></script>

        <!-- Director dashboard demo (This is only for demo purposes) -->
@yield('script')



</body>
</html>