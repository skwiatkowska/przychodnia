@extends('layouts.layout-recepcja') @section('title', 'Lista lekarzy') @section('content')

<div class="container">

    <div class="row">
        <div class="box">
                <div class="row">
                    <hr>
                    <h2 class="intro-text text-center">Wizyty
                    </h2>
                    <hr>
                </div>
                <div class="col-lg-12">

                <div class="row">
                    <div class="col-md-3">
                        <ul class="nav nav-pills nav-stacked">
                            @foreach($doctors as $doctor)
                            <li class=""><a class="btn btn-primary btn-blue-hover" href="wizyty/{{$doctor['id']}}">{{$doctor['tytul']}} {{$doctor['imie']}} {{$doctor['nazwisko']}} </a></li>
                            @endforeach
                        </ul>
                        
                    </div>

                    <div class="col-md-7 col-md-offset-1 text-center">
                        <div class="row">
                            <h4><br><br><br><br><br>Wybierz lekarza, dla którego chcesz<br>zobaczyć terminarz.</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @endsection