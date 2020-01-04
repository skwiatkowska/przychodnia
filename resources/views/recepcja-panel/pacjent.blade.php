@extends('layouts.layout-recepcja') @section('title', 'Zarządzanie kontem pacjenta') @section('content')

<div class="container">
    <div class="row">
        <div class="box">
            <br/>
            <div class="row">
                <hr>
                <h4 class="intro-text text-center">Pacjent  {{$patientData['pacjent']['imie']}} <strong>{{$patientData['pacjent']['imie']}} {{$patientData['pacjent']['nazwisko']}}</strong></h4>
                <hr>
                <br/>
            </div>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-3">
                    <div id="tab" data-toggle="buttons-radio">
                        <div class="col-md-4 col-md-4-offset-1">
                            <a href="#dane" class="col-sm-8 btn btn-large btn-info active" data-toggle="tab">Dane osobowe</a>
                        </div>
                        <div class="col-md-4 col-md-4-offset-1">
                            <a href="#wizyty" class="col-sm-8 btn btn-large btn-info" data-toggle="tab">Wizyty</a>
                        </div>
                    </div>
                </div>
            </div><br/>
            @if($patientData['pacjent']['status'] == 'inactive')
            <div class="row">
                <h2 class="text-center"><span class="blink">KONTO DEZAKTYWOWANE</span></strong></h2>
            </div>
            @endif
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="tab-content">
                        <div class="tab-pane active" id="dane">
                            <br>
                            <div class="row">
                                <div class="col-lg-10 col-lg-offset-1">
                                    <div class="table-responsive col-md-10 col-md-offset-1">
                                        <table class="table table-striped">
                                            <tr>
                                                <td></td>
                                                <td class="col-sm-4 col-sm-offset-3 text-right"><strong>Imię</strong>
                                                </td>
                                                <td class="col-sm-1"></td>
                                                <td>
                                                    {{$patientData['pacjent']['imie']}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class="col-sm-4 col-sm-offset-3 text-right"><strong>Nazwisko</strong>
                                                </td>
                                                <td class="col-sm-1"></td>
                                                <td>
                                                    {{$patientData['pacjent']['nazwisko']}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class="col-sm-4 col-sm-offset-3 text-right"><strong>E-mail</strong>
                                                </td>
                                                <td class="col-sm-1"></td>
                                                <td>
                                                    {{$patientData['pacjent']['email']}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class="col-sm-4 col-sm-offset-3 text-right"><strong>Telefon</strong>
                                                </td>
                                                <td class="col-sm-1"></td>
                                                <td>
                                                    {{$patientData['pacjent']['telefon']}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class="col-sm-4 col-sm-offset-3 text-right"><strong>Data urodzenia</strong>
                                                </td>
                                                <td class="col-sm-1"></td>
                                                <td>
                                                    {{$patientData['pacjent']['data_urodzenia']}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class="col-sm-4 col-sm-offset-3 text-right"><strong>Pesel</strong>
                                                </td>
                                                <td class="col-sm-1"></td>
                                                <td>
                                                    {{$patientData['pacjent']['pesel']}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td class="col-sm-4 col-sm-offset-3 text-right"><strong>Adres</strong>
                                                </td>
                                                <td class="col-sm-1"></td>
                                                <td>
                                                    {{$patientData['pacjent']['adres']}}
                                                </td>
                                            </tr>
                                        </table>
                                        @if($patientData['pacjent']['status'] != 'inactive')
                                        <div class="col-sm-3 col-sm-offset-1 pull-left">
                                            <a type="button" class="btn btn-gray" role="button" href="{{$patientData['pacjent']['id']}}/ustawienia">Ustawienia</a>
                                            <br/>
                                            <br/>
                                        </div>
                                        @else
                                        <div class="col-sm-2 col-sm-offset-1 pull-left">
                                        <form class="form-horizontal" method="post" action="{{$patientData['pacjent']['id']}}/ustawienia/aktywuj" align="center">
                        <div class="row">
                            {{ csrf_field() }}
                            <fieldset>
                                <div class="form-group">
                                        <button type="submit" class="btn btn-danger form-control">Aktywuj</button>
                                </div>

                            </fieldset>
                        </div>
                    </form>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="wizyty">
                            <br>
                            @if($patientData['pacjent']['status'] != 'inactive')
                            <div class="row">
                                <div class="col-sm-3 pull-right">
                                    <a type="button" class="btn btn-info" role="button" href="{{$patientData['pacjent']['id']}}/nowa_wizyta">Nowa wizyta</a>
                                </div>
                            </div>
                            @endif
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    </br>

                                    <div class="table-responsive">
                                        @if($patientData['wizytyPrzeszle']->count()==0 && $patientData['wizytyDzis']->count()==0 && $patientData['wizytyNadchodzace']->count()==0)
                                        <h2 class="intro-text text-center">Brak wizyt <br><br><br>
                            </h2> @else @if ($patientData['wizytyDzis']->count() != 0)
                                        <div class="container col-md-12">
                                            <div class="panel-group">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h2 class="panel-title text-center">
          <a class="glyphicon glyphicon-menu-down" data-toggle="collapse" href="#today"> <b>Dziś</b></a>
        </h2>
                                                    </div>
                                                    <div id="today" class="panel-collapse collapse in">
                                                        <table class="table table-striped">
                                                            <tr>
                                                                <th>Lekarz</th>
                                                                <th>Gabinet</th>
                                                                <th>Dzień</th>
                                                                <th>Godzina</th>
                                                                <th>Odwołaj</th>
                                                            </tr>
                                                            @foreach($patientData['wizytyDzis'] as $wizyta)
                                                            <tr>
                                                                <td>
                                                                    {{$wizyta['lekarz']}}
                                                                </td>
                                                                <td>
                                                                    {{$wizyta['gabinet']}}
                                                                </td>
                                                                <td>
                                                                    {{$wizyta['rok_miesiac_dzien']}}
                                                                </td>
                                                                <td>
                                                                    {{$wizyta['godzina_minuta']}}
                                                                </td>
                                                                <td>
                                                                    <form method="post" action="wizyty/usun">
                                                                        {{ csrf_field() }}
                                                                        <input type="hidden" name="id_wizyty" value="{{$wizyta['id']}}">
                                                                        <input type="submit" class="btn btn-sm btn-gray" role="button" value="odwołaj" />
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                        </div>
                                        @endif @if ($patientData['wizytyNadchodzace']->count() != 0)
                                        <div class="container col-md-12">
                                            <div class="panel-group">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h2 class="panel-title text-center">
          <a class="glyphicon glyphicon-menu-down" data-toggle="collapse" href="#future"> <b>Nadchodzące</b></a>
        </h2>
                                                    </div>
                                                    <div id="future" class="panel-collapse collapse">
                                                        <table class="table table-striped">
                                                            <tr>
                                                                <th>Lekarz</th>
                                                                <th>Gabinet</th>
                                                                <th>Dzień</th>
                                                                <th>Godzina</th>
                                                                <th>Odwołaj</th>
                                                            </tr>
                                                            @foreach($patientData['wizytyNadchodzace'] as $wizyta)
                                                            <tr>
                                                                <td>
                                                                    {{$wizyta['lekarz']}}
                                                                </td>
                                                                <td>
                                                                    {{$wizyta['gabinet']}}
                                                                </td>
                                                                <td>
                                                                    {{$wizyta['rok_miesiac_dzien']}}
                                                                </td>
                                                                <td>
                                                                    {{$wizyta['godzina_minuta']}}
                                                                </td>
                                                                <td>
                                                                    <form method="post" action="wizyty/usun">
                                                                        {{ csrf_field() }}
                                                                        <input type="hidden" name="id_wizyty" value="{{$wizyta['id']}}">
                                                                        <input type="submit" class="btn btn-sm btn-gray" role="button" value="odwołaj" />
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                        </div>
                                        @endif
                                        <br>
                                        <br> @if ($patientData['wizytyPrzeszle']->count() != 0)

                                        <div class="container col-md-12">
                                            <div class="panel-group">
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">
                                                        <h2 class="panel-title text-center">
          <a class="glyphicon glyphicon-menu-down" data-toggle="collapse" href="#past"> <b>Minione</b></a>
        </h2>
                                                    </div>
                                                    <div id="past" class="panel-collapse collapse">
                                                        <table class="table table-striped">
                                                            <tr>
                                                                <th class="col-md-4">Lekarz</th>
                                                                <th class="col-md-3">Gabinet</th>
                                                                <th class="col-md-3">Dzień</th>
                                                                <th class="col-md-3">Godzina</th>
                                                                <th></th>
                                                            </tr>
                                                            @foreach($patientData['wizytyPrzeszle'] as $wizyta)
                                                            <tr>
                                                                <td>
                                                                    {{$wizyta['lekarz']}}
                                                                </td>
                                                                <td>
                                                                    {{$wizyta['gabinet']}}
                                                                </td>
                                                                <td>
                                                                    {{$wizyta['rok_miesiac_dzien']}}
                                                                </td>
                                                                <td>
                                                                    {{$wizyta['godzina_minuta']}}
                                                                </td>
                                                                <td>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <br>
                                            <br>
                                        </div>

                                        @endif @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection