@extends('layouts.layout-recepcja') 
@section('title', 'Lista lekarzy')
@section('content')

<div class="container">

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <div class="row">
                    <hr>
                    <h2 class="intro-text text-center">Wizyty
                    </h2>
                    <h2 class="intro-text text-center"><b>W BUDOWIE</b>
                    </h2>
                    <hr>
                </div>
                <div class="row">
            <div class="col-lg-10 col-lg-offset-3">
            <ul class="nav nav-pills nav-stacked col-sm-3 col-md-3">
                @foreach($doctors as $doctor)
                <li class=""><a href="lekarz/{{$doctor['id']}}/wizyty" target="_blank">{{$doctor['tytul']}} {{$doctor['imie']}} {{$doctor['nazwisko']}} </a></li>
                @endforeach
</ul>


                    <div class="col-md-4 col-md-4-offset-1">
                            <a href="lekarz/1" class="col-sm-8 btn btn-large btn-info">Dane osobowe</a>
                    </div>
                </div>
             </div>


                <div class="row">
                <ul class="nav nav-pills nav-stacked col-sm-3 col-md-3">
                @foreach($doctors as $doctor)
                <li class=""><a href="lekarz/{{$doctor['id']}}/wizyty" target="_blank">{{$doctor['tytul']}} {{$doctor['imie']}} {{$doctor['nazwisko']}} </a></li>
                @endforeach
</ul>
            </div>
        </div>
    </div>
</div>



@endsection