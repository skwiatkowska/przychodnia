@extends('layouts.layout-recepcja') @section('title', 'Lista lekarzy') @section('content')

<div class="container">

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <div class="row">
                    <hr>
                    <h2 class="intro-text text-center">Wizyty - <b>{{$doctorData['lekarz']['tytul']}} {{$doctorData['lekarz']['imie']}} {{$doctorData['lekarz']['nazwisko']}}</b>
                    </h2>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <ul class="nav nav-pills nav-stacked Fixed">
                            @foreach($doctors as $doctor) @if($doctorData['lekarz']['id'] == $doctor['id'])
                            <li><a class="btn btn-info btn-blue-hover-active" href="{{$doctor['id']}}">{{$doctor['tytul']}} {{$doctor['imie']}} {{$doctor['nazwisko']}} </a></li>
                            @else
                            <li><a class="btn btn-info btn-blue-hover" href="{{$doctor['id']}}">{{$doctor['tytul']}} {{$doctor['imie']}} {{$doctor['nazwisko']}} </a></li>
                            @endif @endforeach
                        </ul>
                    </div>

                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-sm-3 pull-right">
                                <button type="button" class="btn btn-info info accordion-toggle" data-toggle="collapse" data-target="#nowy_termin" role="button">Nowy termin</button>
                            </div>
                        </div>

                        <div class="row hiddenRow">

                            <div id="nowy_termin" class=" accordian-body collapse">
                                <br>
                                <div class="border">
                                    <form role="form" class="form-horizontal" method="get" action="dodaj_opis_wizyty">
                                        <div class="row">
                                            <div class="form-group text-center">
                                                <label class="control-label">Dodaj nowe terminy dla lekarza</label>
                                                <br/>
                                                <br/>
                                                <div class="row col-md-10 col-md-offset-1">
                    
                                                    <table id="newDeadlinesTable" class="table table-striped table-numbered ">
                                                        <tr class="text-center">
                                                            <th>Lp</th>
                                                            <th>Dzień</th>
                                                            <th>Godzina rozpoczęcia</th>
                                                            <th>Godzina zakończenia</th>
                                                        </tr>
                                                        <tr class="text-center">
                                                            <td></td>
                                                            <td>
                                                                <input type="date" class="form-control" id="data" name="data" min="<?php echo date('Y-m-d'); ?>" required>
                                                            </td>
                                                            <td>
                                                                <input type="time" class="form-control" id="godzina_od" name="godzina_od" min="07:00" max="20:00" step="1800" value="09:00" required>
                                                            </td>
                                                            <td>
                                                                <input type="time" class="form-control" id="godzina_do" name="godzina_do" min="07:00" max="20:00" step="1800" value="16:00" required>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                           
                                            <div class="form-group text-center">
                                                <input class="btn btn-info" type="submit" value="Dodaj">
                                            </div>
                                            {{--
                                            <div class="clearfix"></div>--}}
                                            <input type="hidden" name="id_lekarza" value="{{$doctor['id']}}" />
                                        </div>

                                    </form>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            </br>
                            @foreach($doctorVisits['terminy'] as $date => $hours)
                            <div class="border">

                                <div class="row">
                                    <div class="form-group text-center font">
                                        <label class="control-label">{{$date}}</label>
                                    </div>
                                    <div class="form-group">
                                        <table class="table table-striped">
                                            @foreach($hours as $hour )
                                            <tr>
                                                <td>
                                                    {{$hour}}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    @endsection