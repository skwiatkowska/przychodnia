@extends('layout')

@section('title', 'Przychodnia')

@section('content')

        <div class="container">

            <div class="row">
                <div class="box">
                    <div class="col-lg-12">
                        <hr>
                        <h2 class="intro-text text-center">Zamów recepte
                            <strong>bez wychodzenia z domu!</strong>
                        </h2>
                        <hr>
                        <img class="img-responsive img-border img-left" src="{{PUBLIC_URL}}img/pills.jpg" alt="">
                        <hr class="visible-xs">
                        <p>Recepty on-line to usługa, dzięki której pacjent ma możliwość zamówienia recepty na lek stosowany stale, bez konieczności zrealizowania wizyty kontrolnej u lekarza.</p>
                        <p> Przyjęcie recepty do realizacji następuje kolejnego dnia roboczego od daty wypełnienia zgłoszenia.
                            Recepta będzie dostępna do odbioru następnego dnia roboczego po dniu, w którym lekarz przyjmuje w danym oddziale (licząc od dnia przyjęcia recepty do realizacji).
                            Jeśli wystawienie recepty na podstawie zgłoszenia nie będzie możliwe, skontaktujemy się z Tobą w celu umówienia wizyty u lekarza.
                            Receptę należy odebrać w oddziale osobiście po okazaniu dokumentu tożsamości ze zdjęciem lub poprzez osobę trzecią po uprzednio złożonym w oddziale pisemnym upoważnieniu.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="box">
                    <div class="col-lg-12">
                        <hr>
                        <h2 class="intro-text text-center">Formularz do zamawiania recept
                            <strong>on-line</strong>
                        </h2>
                        <hr>
                        <p align="center">Tylko zarejestrowani pacjenci mogą zamawiać recepty! Prosimy o bardzo dokładne wypełnienie każdej rubryki.</p>
                        <br/>

                        <form role="form" class="ania-center form-horizontal" method="post" action="panel/recepty/dodaj">
                            <div class="row" >
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="control-label">Lekarz prowadzący</label>

                                    <select name="idLekarza" class="form-control">
                                        @foreach($lekarze as $lekarz)
                                            <option value="{{$lekarz['id']}}">{{$lekarz['nazwisko']}} {{$lekarz['imie']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="control-label">Nazwa leku</label>
                                    <input type="text" class="form-control" name="nazwaLeku" placeholder="Nazwa Leku">
                                </div>
                                <div class="form-group">
                                    <label>Ile opakowań</label>
                                    <input type="number" class="form-control" name="ileOpakowan" placeholder="Ile opakowan">
                                </div>
                                <div class="form-group">
                                    <label>Dawka</label>
                                    <input type="text" class="form-control" name="dawka" placeholder="Dawka Leku">
                                </div>
                                <div class="form-group">
                                    <label>Sposób przyjmowania</label>
                                    <input type="text" class="form-control" name="sposob" placeholder="Sposb przyjmowania">
                                </div>
                                <div class="clearfix"></div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="zamow" value="Zamów">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>


@endsection