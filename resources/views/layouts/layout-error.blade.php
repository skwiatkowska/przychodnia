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

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
          rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic"
          rel="stylesheet" type="text/css">


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
                        <span class="text"><b>Adres:</b> Kraków, ul. Czarnowiejska 30</span>
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

</script>

</body>
</html>
