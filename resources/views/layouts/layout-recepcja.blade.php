<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <script src="{{PUBLIC_URL}}js/jquery.js"></script>
    <link href="{{PUBLIC_URL}}css/bootstrap.min.css" rel="stylesheet">
    <script src="{{PUBLIC_URL}}js//bootstrap.min.js"></script>

    <!-- Custom CSS -->
    <link href="{{PUBLIC_URL}}css/business-casual.css" rel="stylesheet">
    <link href="{{PUBLIC_URL}}css/app.css" rel="stylesheet">


</head>
<body>


<nav class="navbar navbar-light " role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">AGHmed</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav ">
             <li>
                    <a href="/recepcja">Strona startowa</a>
                </li>
                <li>
                    <a href="/recepcja/lista_pacjentow">Pacjenci</a>
                </li>
                <li>
                    <a href="/recepcja/lista_lekarzy">Lekarze</a>
                </li>
                <li>
                    <a href="/recepcja/wizyty">Wizyty</a>
                </li>
                <li>
                     <a href="/logout">Wyloguj</a>
                </li>   
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>


<div class="container">

    <div class="row">
        {{--<div class="box">--}}

            @if (session('errors'))
                <div class="alert alert-dismissible alert-danger">
                    Wystąpiły następujące błędy:<br/>
                    <ul>
                        @foreach(session('errors') as $error)
                            <li>{!!$error!!}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            @if (session('info'))
                <div class="container2">
                    <div class="alert alert-success">
                        <ul>
                            <li><strong>{{session('info')}}</strong></li>
                        </ul>
                    </div>
                </div>
            @endif

        {{--</div>--}}
    </div>
</div>



@yield('content')


<!-- jQuery -->
<script src="{{PUBLIC_URL}}js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{PUBLIC_URL}}js/bootstrap.min.js"></script>

</body>
</html>