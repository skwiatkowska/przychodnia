@extends('layouts.layout-recepcja')

@section('title', 'Panel recepcjonisty - strona główna')

@section('content')

    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <br><hr>
                    <h2 class="intro-text text-center">Witaj w panelu  Recepcjonisty
                    </h2>
                    <hr><br>
                    <p class="text-center">
                    Jesteś w panelu administracyjnym dla Recepcjonisty, który umożliwia zarządzanie kontami pacjentów i lekarzy, modyfikację danych, wprowadzanie terminarzy i umawianie wizyt.
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
    <div class="col-sm-4 box">
    <div class="hovereffect">
        <img class="img-responsive img-full" src="{{PUBLIC_URL}}img/patients.jpg" alt="">
        <div class="overlay">
           <h2>Pacjenci</h2>
           <a class="info" href="/recepcja/lista_pacjentow">Zarządzaj pacjentami</a>
        </div>
    </div>
    </div>
    <div class="col-sm-4 box">
    <div class="hovereffect">
        <img class="img-responsive img-full" src="{{PUBLIC_URL}}img/doctor.jpg" alt="">
        <div class="overlay">
           <h2>Lekarze</h2>
           <a class="info" href="/recepcja/lista_lekarzy">Zarządzaj lekarzami</a>
        </div>
    </div>
    </div>
    <div class="col-sm-4 box">
    <div class="hovereffect">
        <img class="img-responsive img-full" src="{{PUBLIC_URL}}img/appointment.jpg" alt="">
        <div class="overlay">
           <h2>Wizyty</h2>
           <a class="info" href="#">Zarządzaj umówionymi wizytami</a>
        </div>
        
    </div>
    </div>
  </div>
 
  </div>
    </div>



@endsection