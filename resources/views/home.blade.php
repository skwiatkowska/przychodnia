@extends('layouts.layout')

@section('title', 'Strona główna')

@section('content')

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                <div class="row">
                <br/>
                    <div id="carousel-example-generic" class="carousel slide data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>
                        
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner">
                            <div class="item active">
                                <img class="img-responsive img-full" src="{{PUBLIC_URL}}img/hand.jpg" alt="">
                                <div class="carousel-caption">
                                    <h3>Witaj na stronie AGHmed</h3>
                                    <h5>Nasi specjaliści zadbają o zdrowie Twojej rodziny</h5>
                                </div>
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="{{PUBLIC_URL}}img/waiting-room.jpg" alt="">
                                <div class="carousel-caption">
                                <h3>Nie czekaj w kolejkach</h3>
                                <a class="btn btn-primary" href="/lista_lekarzy">Umów wizytę online </a>
                                </div>
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="{{PUBLIC_URL}}img/child.jpg" alt="">
                                <div class="carousel-caption">
                                    <h3>Z myślą o najmłodszych</h3>
                                    <h5>Zapraszamy do nowego gabinetu pediatrycznego</h5>
                                </div>
                            </div>
                            <div class="item">
                                <img class="img-responsive img-full" src="{{PUBLIC_URL}}img/senior.jpg" alt="">
                                <div class="carousel-caption">
                                    <h3>Pakiet premium senior</h3>
                                    <h5>Abonament medyczny dla osób po 65 roku życia</h5>
                                </div>
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
      

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <hr>
                    <h2 class="intro-text ">O nas
                    </h2>
                    <hr>
                    <p>Centrum zdrowia AGHmed zostało stworzone z myślą o Pacjentach.</p>
                    <p>
                    Jest to nowoczesna placówka z wykwalifikowanymi specjalistami i sprzętem najwyższej jakości. 
                    Oferujemy szeroki zakres usług medycznych dla osób w każdym wieku. 
                    Dzięki współpracy z wieloma lekarzami specjalistami gwarantujemy profesjonalną opiekę medyczną.</p>
                </div>
            </div>
        </div>
        </div>
        </div>
    </div>


@endsection