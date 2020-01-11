@extends('layouts.layout-recepcja') 
@section('title', 'Zarządzanie kontem lekarza') 
@section('content')



<div class="container">
    <div class="row">
        <div class="box"><br/>
		<div class="row">
                    <hr>
                    <h4 class="intro-text text-center">Lekarz {{$doctorData['lekarz']['tytul']}} <strong>{{$doctorData['lekarz']['imie']}} {{$doctorData['lekarz']['nazwisko']}}</strong></h4>
                    <hr><br/>
                    </div>

                    <div class="row">
                    <div class="col-md-4 pull-right">
                         <a type="button" class="col-sm-3 btn btn-info" role="button" target="_blank" href="/recepcja/wizyty/{{$doctorData['lekarz']['id']}}">Terminarz</a>
                    </div>
                </div>
            
           
			 <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                @if($doctorData['lekarz']['status'] == 'inactive')
                <div class="row">
                <h2 class="text-center"><span class="blink">KONTO DEZAKTYWOWANE</span></strong></h2>
            </div>
            @endif
                        <br>
                        <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                    <div class="table-responsive col-md-10 col-md-offset-1">
                        <table class="table table-striped">
                            <tr>
                                <td></td>
                                <td class="col-sm-4 col-sm-offset-3 text-right"><strong>Tytuł naukowy</strong>
                                </td><td class="col-sm-1"></td>
                                <td>
                                    {{$doctorData['lekarz']['tytul']}}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="col-sm-4 col-sm-offset-3 text-right"><strong>Imię</strong>
                                </td><td class="col-sm-1"></td>
                                <td>
                                    {{$doctorData['lekarz']['imie']}}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="col-sm-4 col-sm-offset-3 text-right"><strong>Nazwisko</strong>
                                </td><td class="col-sm-1"></td>
                                <td>
                                    {{$doctorData['lekarz']['nazwisko']}}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="col-sm-4 col-sm-offset-3 text-right"><strong>Specjalizacja</strong>
                                </td><td class="col-sm-1"></td>
                                <td>
                                    {{$doctorData['lekarz']['specjalizacja']}}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="col-sm-4 col-sm-offset-3 text-right"><strong>Gabinet</strong>
                                </td><td class="col-sm-1"></td>
                                <td>
                                    {{$doctorData['lekarz']['gabinet']}}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="col-sm-4 col-sm-offset-3 text-right"><strong>E-mail</strong>
                                </td><td class="col-sm-1"></td>
                                <td>
                                    {{$doctorData['lekarz']['email']}}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="col-sm-4 col-sm-offset-3 text-right"><strong>Telefon</strong>
                                </td><td class="col-sm-1"></td>
                                <td>
                                    {{$doctorData['lekarz']['telefon']}}
                                </td>
                            </tr>
                        </table>
                        @if($doctorData['lekarz']['status'] != 'inactive')
                                        <div class="col-sm-3 col-sm-offset-1 pull-left">
                                            <a type="button" class="btn btn-gray" role="button" href="{{$doctorData['lekarz']['id']}}/ustawienia">Ustawienia</a>
                                            <br/>
                                            <br/>
                                        </div>
                                        @else
                                        <div class="col-sm-2 col-sm-offset-1 pull-left">
                                            <form class="form-horizontal" method="post" action="{{$doctorData['lekarz']['id']}}/ustawienia/aktywuj" align="center">
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
            </div>
        </div>
    </div>
</div>

@endsection