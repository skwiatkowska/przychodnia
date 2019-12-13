@extends('layouts.layout-recepcja') @section('title', 'Zarządzanie kontem pacjenta') @section('content')



<div class="container">
    <div class="row">
        <div class="box"><br/>
		<div class="row">
                    <hr>
                    <h4 class="intro-text text-center">Pacjent {{$patientData['pacjent']['imie']}} {{$patientData['pacjent']['nazwisko']}}</h4>
                    <hr><br/>
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
                </div></div>
             </div><br/>
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
                                </td><td class="col-sm-1"></td>
                                <td>
								{{$patientData['pacjent']['imie']}}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="col-sm-4 col-sm-offset-3 text-right"><strong>Nazwisko</strong>
                                </td><td class="col-sm-1"></td>
                                <td>
								{{$patientData['pacjent']['nazwisko']}}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="col-sm-4 col-sm-offset-3 text-right"><strong>E-mail</strong>
                                </td><td class="col-sm-1"></td>
                                <td>
								{{$patientData['pacjent']['email']}}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="col-sm-4 col-sm-offset-3 text-right"><strong>Telefon</strong>
                                </td><td class="col-sm-1"></td>
                                <td>
								{{$patientData['pacjent']['telefon']}}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="col-sm-4 col-sm-offset-3 text-right"><strong>Data urodzenia</strong>
                                </td><td class="col-sm-1"></td>
                                <td>
								{{$patientData['pacjent']['data_urodzenia']}}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="col-sm-4 col-sm-offset-3 text-right"><strong>Pesel</strong>
                                </td><td class="col-sm-1"></td>
                                <td>
								{{$patientData['pacjent']['pesel']}}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="col-sm-4 col-sm-offset-3 text-right"><strong>Adres</strong>
                                </td><td class="col-sm-1"></td>
                                <td>
								{{$patientData['pacjent']['adres']}}
                                </td>
                            </tr>
                        </table><div class="col-sm-3 col-sm-offset-1 pull-left">
                         <a type="button" class="btn btn-gray" role="button" href="#">Ustawienia</a>
						 <br/><br/>
                    </div>
                    </div>
                </div> 
                        </div>
                    </div>
                    <div class="tab-pane" id="wizyty">
                        <br>
                        <div class="row">
                                <p>{{$patientData['wizyty']}}</p>
                        </div>
                    </div>
				</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection