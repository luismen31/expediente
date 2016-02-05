<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Expediente @yield('title')</title>

    <!-- Fonts -->
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{ asset('assets/css/lato.css') }}" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/expediente.css') }}"> 
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-datepicker/bootstrap-datepicker3.min.css') }}">   
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css') }}">   
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap-table/bootstrap-table.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/easy-autocomplete.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/easy-autocomplete.themes.min.css') }}">

</head>
<body>
	<nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#spark-navbar-collapse">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand banner" href="{{ url('/') }}">
                    Expediente Clinico
                </a>
            </div>

            <div class="collapse navbar-collapse" id="spark-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    @if(Auth::check() and Auth::user()->rol == 'medico')
                    <li><a href="{{ route('cita.index') }}"><i class="fa fa-btn fa-medkit"></i>Registrar Cita</a></li>
                    <li><a href="{{ route('historial.index') }}"><i class="fa fa-btn fa-history"></i>Historial</a></li>
                    @endif
                </ul>
                
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::check())
                        
                        <!-- Authentication Links -->
                        @if(Auth::user()->rol == 'admin')
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-btn fa-cog"></i>Mantenimiento <span class="caret"></span></a>
                          <ul class="dropdown-menu">
                            <li><a href="{{ route('medico.index') }}">Médicos</a></li>
                            
                          </ul>
                        </li>
                        @endif
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                               <i class="fa fa-btn fa-user"></i> {{ Auth::user()->usuario }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/auth/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Salir</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>

    <!-- JavaScripts -->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/data-table.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.easy-autocomplete.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-datepicker/locales/bootstrap-datepicker.es.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-table/bootstrap-table.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-table/locale/bootstrap-table-es-ES.min.js') }}"></script>
    @yield('scripts')
    <script type="text/javascript">
        var baseurl = '{{ url("/") }}';

        $('.datepicker').datepicker({
            format: "mm/dd/yyyy",
            language: "es",
            autoclose: true,
            todayHighlight: true
        });        
        $('span.filter i').click(function(){
        
            $('.collapse-filter').toggle("fast", "linear");

        });
    </script>
</body>
</html>