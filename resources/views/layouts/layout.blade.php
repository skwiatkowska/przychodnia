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
    <link href="{{PUBLIC_URL}}css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{PUBLIC_URL}}css/business-casual.css" rel="stylesheet">
    <link href="{{PUBLIC_URL}}css/app.css" rel="stylesheet">


</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-light">
    	<div class="info">
    		<div class="col-lg-4 pr-2 align-items-center">
		    	<a class="navbar-brand" href="/">Centrum Zdrowia AGHmed</a>
	    	</div>
	    	<div class="col-lg-8">
                <div class="row d-flex">
                    <div class="col-md-4 pr-4 navbar-text">
                        <span class="text addr"><b>Adres:</b> Kraków, ul. Czarnowiejska 30</span>
                    </div>
                    <div class="col-md-4 pr-4 navbar-text">
                        <span class="text"><b>Email:</b> kontakt@aghmed.com</span>
                    </div>
                    <div class="col-md pr-4 navbar-text">
                        <span class="text"><b>Telefon:</b> + 48 111 111 111</span>
                    </div>
                </div>
		  </div>
    </nav>

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
            <ul class="nav navbar-nav">
                <li>
                    <a href="/">O nas</a>
                </li>
              
                <li>
                    <a href="/lista_lekarzy">Lekarze</a>
                </li>
                <li>
                    <a href="/poradnie">Poradnie</a>
                </li>
                <li>
                    <a href="/rodo">RODO</a>
                </li>
                @if(Auth::check())
                    <li>
                        <a href="/panel/wizyty">Moje wizyty</a>
                    </li>
                    <li>
                        <a href="/panel/dane">Moje konto</a>
                    </li>
                    <li>
                        <a href="/logout">Wyloguj</a>
                    </li>
                @else
                    <li>
                        <a href="/login">Logowanie/Rejestracja</a>
                    </li>

                @endif
                
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

<!-- /.container -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <p>© 2019 AGHMed. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery -->
<script src="{{PUBLIC_URL}}js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{PUBLIC_URL}}js/bootstrap.min.js"></script>

<!-- Script to Activate the Carousel -->
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })

    $('.carousel').on('slide.bs.carousel', function () {
		$('.carousel-caption h3').animate({
			marginLeft: "+=10%",
          fontSize: "1px",
			opacity: 0
		}, 50);
        $('.carousel-caption h5').animate({
			marginLeft: "+=10%",
          fontSize: "1px",
			opacity: 0
		}, 50);
        $('.carousel-caption a').animate({
			marginLeft: "+=10%",
          fontSize: "1px",
			opacity: 0
		}, 50);
	})
	$('.carousel').on('slid.bs.carousel', function () {
		$('.carousel-caption h3').animate({
			marginLeft: 0,
          fontSize: "40px",
			opacity: 0.8
		}, 600);
        $('.carousel-caption h5').animate({
			marginLeft: 0,
          fontSize: "20px",
			opacity: 0.8
		}, 600);
        $('.carousel-caption a').animate({
			marginLeft: 0,
          fontSize: "16px",
			opacity: 0.8
		}, 600);
	})


    function validatePesel() {
  var x = document.forms["registerForm"]["pesel"].value;
  if (x.size != 11) {
    alert("Wprowadź poprawny numer PESEL (11 znaków).");
    return false;
  }
}


</script>

</body>
</html>
