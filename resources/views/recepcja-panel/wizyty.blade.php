@extends('layouts.layout-recepcja') @section('title', 'Terminarz lekarza') @section('content')

<div class="container">

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <div class="row">
                    <hr>
                    <h2 class="intro-text text-center">Terminarz - <b>{{$doctorData['lekarz']['tytul']}} {{$doctorData['lekarz']['imie']}} {{$doctorData['lekarz']['nazwisko']}}</b>
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
                                <button type="button" onclick="showOrHideVisitDescriptionForm()" class="btn btn-info info" role="button">Nowy termin</button>
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-3 col-md-offset-1">
                                <input type="date" class="form-control" id="wybierzDzienInput" required value="<?php echo date('Y-m-d'); ?>" onchange="getExactDate()">
                            </div>
                        </div>

                        </div>

                        <div id="noweTerminy">
                            <br>
                            <div class="border">
                                <form role="form" class="form-horizontal" method="get" action="{{$doctorData['lekarz']['id']}}/dodaj_termin">
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
                                        <input type="hidden" name="id_lekarza" value="{{$doctorData['lekarz']['id']}}" />
                                    </div>

                                </form>
                            </div>

                        </div>

                        <div class="row text-center" id="brakWizytDanegoDnia">
                            <p><br><br><br><br><br><br><br>Brak terminów w tym dniu.</p>
                        </div>

                            <div class="row col-md-12 col-md-offset-0">
                                <br><br>
                                @foreach($doctorVisits['terminy'] as $date => $hours)
                                <div class="border data">

                                    <div class="row">
                                        <div class="form-group text-center font">
                                            <label class="control-label data-label">{{$date}}</label>
                                        </div>
                                        <div class="form-group">
                                            <table class="table table-striped">
                                                @foreach($hours as $hour )
                                                <form role="form" method="post" action="usun_termin" id="deletingVisitsForm">

                                                <tr>
                                                    <td class="col-md-1">
                                                        <input type="submit" value="Usuń" class="btn btn-primary form-control"/>
                                                        <input type="hidden" name="date" value="{{$date}}" />
                                                        <input type="hidden" name="hour" value="{{substr($hour, 0, 5)}}" />
                                                        <input type="hidden" name="doctorId" value="{{$doctorData['lekarz']['id']}}" />


                                                    </td></form>
                                                    <td id="oneRow" class="col-md-2">
                                                        {{substr($hour, 0, 5)}}

                                                    </td>
                                                    <td id="oneRow" class="col-md-3 col-md-offset-1">
                                                        @if(substr($hour, 6, -3) == "") 
                                                            - 
                                                        @else 
                                                            {{substr($hour, 6, -2)}} 
                                                        @endif
                                                    </td>
                                                    <td class="col-md-2 text-right">
                                                        <button class="btn btn-gray col-sm-10 redirectBtn" onclick="goToAPatientProfile({{substr($hour, -2)}})" type="btn" name="{{$hour}}">ds</button>
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