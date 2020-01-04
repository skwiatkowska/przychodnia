@extends('layouts.layout-lekarz')

@section('title', 'Panel lekarza - strona główna')

@section('content')

    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-10 col-lg-offset-1">
                    <br><hr>
                    <h2 class="intro-text text-center">Witaj w panelu Lekarza
                    </h2>
                    <hr><br>
                    <p class="text-center">
                    Jesteś w panelu administracyjnym dla Lekarza, który umożliwia generowanie historii zdrowia i choroby pacjenta, przeglądanie umówionych wizyt i zarządzanie własnym kontem.
                    </p> <br/>  
            
        </div>
        <div class="row">
    <div class="col-sm-4 box">
    <div class="hovereffect">
        <img class="img-responsive img-full" src="{{PUBLIC_URL}}img/patients.jpg" alt="">
        <div class="overlay">
           <h2>Pacjenci</h2>
           <a class="info" href="/panel_lekarza/lista_pacjentow">Przeglądaj listę swoich pacjentów</a>
        </div>
    </div>
    </div>
    <div class="col-sm-4 box">
    <div class="hovereffect">
        <img class="img-responsive img-full" src="{{PUBLIC_URL}}img/appointment.jpg" alt="">
        <div class="overlay">
           <h2>Wizyty</h2>
           <a class="info" href="/panel_lekarza/wizyty">Przeglądaj zaplanowane wizyty</a>
        </div>
    </div>
    </div> 
    <div class="col-sm-4 box">
    <div class="hovereffect">
        <img class="img-responsive img-full" src="{{PUBLIC_URL}}img/doctor.jpg" alt="">
        <div class="overlay">
           <h2>Moje konto</h2>
           <a class="info" href="/panel_lekarza/dane">Zarządzaj swoim kontem</a>
        </div>
    </div></div>       <br/>

    </div>
  </div>
  </div>
  </div>
    </div>



@endsection