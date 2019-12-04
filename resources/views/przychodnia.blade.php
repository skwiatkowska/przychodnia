@extends('layout')

@section('title', 'Przychodnia')

@section('content')

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <div id="carousel-example-generic" class="carousel slide">
                        <!-- Indicators -->
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="img-responsive img-full" src="{{PUBLIC_URL}}img/medicine.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="{{PUBLIC_URL}}img/emergency.jpg" alt="">
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="{{PUBLIC_URL}}img/skull.jpg" alt="">
                            </div>
                        </div>

                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                            <span class="icon-prev"></span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                            <span class="icon-next"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">O nas
                    </h2>
                    <hr>
                    <p>Przychodnia Twoje Zdrowie w Elblągu rozpoczęła swoją działalność w czerwcu 1988 roku.
                        Jest największą placówką ochrony zdrowia w mieście, podległą Marszałkowi Warmii i Mazur. </p>
                    <p>Przychodnia Twoje Zdrowie w Elblągu świadczy kompleksowe usługi medyczne w zakresie opieki stacjonarnej, ambulatoryjnej, pomocy doraźnej, ratownictwa medycznego i transportu sanitarnego a także diagnostyki i rehabilitacji.
                        Dysponujemy 606 łóżkami (w tym 12 w Szpitalnym Oddziale Ratunkowym). Rocznie hospitalizujemy ponad 42 tys. pacjentów i wykonujemy blisko 14 tys. zabiegów operacyjnych, w tym prawie 2 tys. zabiegów onkologicznych.
                        W ostatnich latach staliśmy się największym zakładem pracy w Elblągu. Zatrudniamy około 1,5 tys. osób, w tym ponad 300 lekarzy i ponad 600 pielęgniarek i położnych.</p>
                </div>
            </div>
        </div>
    </div>


@endsection