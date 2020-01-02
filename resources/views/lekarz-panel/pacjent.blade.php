@extends('layouts.layout-lekarz') 
@section('title', 'Pacjent') 
@section('content')

<div class="container">
    <div class="row">
        <div class="box">
            <br/>
            <div class="row">
                <hr>
                <h4 class="intro-text text-center">Pacjent <strong>{{$patientData['pacjent']['imie']}} {{$patientData['pacjent']['nazwisko']}}</strong></h4>
                <hr>
                <br/>
            </div>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-3">
                    <div id="tab" data-toggle="buttons-radio">
                        <div class="col-md-4 col-md-4-offset-1">
                            <a href="#dane" class="col-sm-8 btn btn-large btn-info " data-toggle="tab">Dane osobowe</a>
                        </div>
                        <div class="col-md-4 col-md-4-offset-1">
                            <a href="#wizyty" class="col-sm-8 btn btn-large btn-info active" data-toggle="tab">Wizyty</a>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="tab-content">
                        <div class="tab-pane" id="dane">
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
                                        <div class="col-sm-3 col-sm-offset-1 pull-left">
                                            <br/>
                                            <br/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane active" id="wizyty">
                            <br>
                            <div class="row">
                                <div class="col-md-8 col-md-offset-2">
                                    </br>
                                    <h2 class="text-center">W BUDOWIE (trzeba rozdzielic wizyty w zaleznosci od daty)</h2>
                                    <div class="table-responsive">
                                        @if($patientData['wizyty']->count()==0)
                                        <h2 class="intro-text text-center">Brak wizyt <br><br><br>
                                        </h2> 
                                        @else
                <hr>
                <h4 class="intro-text text-center">Nadchodzące</h4>
                <hr>
                                        <table class="table table-striped table-condensed">
                                            <tr class="text-center">
                                                <th>Dzień</th>
                                                <th>Godzina</th>
                                                <th>Lekarz</th>
                                                <th>Przebieg wizyty</th>
                                            </tr>
                                            @foreach($patientData['wizyty'] as $wizyta)
                                            <tbody>
                                                <tr data-toggle="collapse" data-target="#{{$wizyta['id']}}" class="accordion-toggle">

                                                    <td>
                                                        {{$wizyta['rok_miesiac_dzien']}}
                                                    </td>
                                                    <td>
                                                        {{$wizyta['godzina_minuta']}}
                                                    </td>
                                                    <td>
                                                        {{$wizyta['lekarz']}}
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-gray btn-sm">dodaj</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" class="hiddenRow">
                                                        <div id="{{$wizyta['id']}}" class=" accordian-body collapse">
                                                        <br><div class="border">
                            <form role="form" class="visit-center form-horizontal" method="get"
                                  action="">
                                <div class="row">
                                    {{ csrf_field() }}
                                    <div class="form-group text-center font">
                                        <label class="control-label">Objawy</label>
                                        <textarea class="form-control" id="opis" row="5"></textarea>

                                    </div>
                                    <div class="form-group text-center font">
                                        <label class="control-label">Zalecenia</label>
                                        <textarea class="form-control" id="zalecenia" row="5"></textarea>

                                    </div>
                                  
                                    <div class="form-group text-center">
                                        <input class="btn btn-info" type="submit" value="Zatwierdź">
                                    </div>
                                    {{--<div class="clearfix"></div>--}}
                                </div>
                               
                            </form>
                        </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>

                                            @endforeach
                                            @foreach($patientData['wizyty'] as $wizyta)
                                            <tbody>
                                                <tr data-toggle="collapse" data-target="#{{$wizyta['id']}}" class="accordion-toggle">

                                                    <td>
                                                        {{$wizyta['rok_miesiac_dzien']}}
                                                    </td>
                                                    <td>
                                                        {{$wizyta['godzina_minuta']}}
                                                    </td>
                                                    <td>
                                                        {{$wizyta['lekarz']}}
                                                    </td>
                                                    <td>
                                                        <i>niedostępne</i>
                                                    </td>
                                                </tr>

                                            </tbody>

                                            @endforeach


                                        </table>



                                    <br><br><br>
                                    <hr>
                                    <h4 class="intro-text text-center">Minione</h4>
                                    <hr>
                                        <table class="table table-striped table-condensed">
                                            <tr class="text-center">
                                                <th>Dzień</th>
                                                <th>Godzina</th>
                                                <th>Lekarz</th>
                                                <th>Przebieg wizyty</th>
                                            </tr>
                                            @foreach($patientData['wizyty'] as $wizyta)
                                            <tbody>
                                                <tr data-toggle="collapse" data-target="#{{$wizyta['id']}}min" class="accordion-toggle">

                                                    <td>
                                                        {{$wizyta['rok_miesiac_dzien']}}
                                                    </td>
                                                    <td>
                                                        {{$wizyta['godzina_minuta']}}
                                                    </td>
                                                    <td>
                                                        {{$wizyta['lekarz']}}
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-default btn-xs"><span class="glyphicon glyphicon-eye-open"></span></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="6" class="hiddenRow">
                                                        <div id="{{$wizyta['id']}}min" class="col-md-10 col-md-offset-1 accordian-body collapse">
                                                            <table class="table table-striped text-center">
                                                                <tr>
                                                                    <td colspan="6"><b>Objawy</br>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="6">{{$wizyta['opis']}}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="6"><b>Zalecenia</b>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="6">{{$wizyta['zalecenia']}}
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>

                                            @endforeach

                                        </table>

                                        @endif

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