<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GRC CheckViwer</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <!--datepicker plugin -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

        <!--DataTables　plugin -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/dataTables.bootstrap.min.css">
<!--        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--        <script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/jquery.dataTables.min.js"></script>-->
<!--        <script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/dataTables.bootstrap.min.js"></script>-->
        <script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.18/js/jquery.dataTables.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.10.18/js/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/plug-ins/1.10.6/sorting/currency.js"></script>
        <script src="//cdn.datatables.net/plug-ins/1.10.19/sorting/num-html.js"></script>        

        <!-- Chart plugin -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>

        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    
    <body>
        @include('commons.navbar')
        
        @yield('keywords')
        
        @yield('cover')
        
        <div class="container">
            @include('commons.error_messages')
            @yield('content')
        </div>
    </body>
    
</html>