@extends('layouts.layout-lekarz')
@section('title', 'Moje konto')

 @section('content')

<div class="container">

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                    <div class="row">
                    <hr>
                    <h4 class="intro-text text-center">Twoje dane osobowe</h4>
                    <hr>
                    </div>
               <br/></div>
                    <div class="col-lg-8 col-lg-offset-2">
                    <div class="table-responsive col-md-10 col-md-offset-1">
                        <table class="table table-striped">
                            <tr>
                                <td></td>
                                <td class="col-sm-4 col-sm-offset-3 text-right"><strong>Tytuł naukowy</strong>
                                </td><td class="col-sm-1"></td>
                                <td>
                                    {{$data['tytul']}}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="col-sm-4 col-sm-offset-3 text-right"><strong>Imię</strong>
                                </td><td class="col-sm-1"></td>
                                <td>
                                    {{$data['imie']}}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="col-sm-4 col-sm-offset-3 text-right"><strong>Nazwisko</strong>
                                </td><td class="col-sm-1"></td>
                                <td>
                                    {{$data['nazwisko']}}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="col-sm-4 col-sm-offset-3 text-right"><strong>Specjalizacja</strong>
                                </td><td class="col-sm-1"></td>
                                <td>
                                    {{$data['specjalizacja']}}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="col-sm-4 col-sm-offset-3 text-right"><strong>Gabinet</strong>
                                </td><td class="col-sm-1"></td>
                                <td>
                                    {{$data['gabinet']}}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="col-sm-4 col-sm-offset-3 text-right"><strong>E-mail</strong>
                                </td><td class="col-sm-1"></td>
                                <td>
                                    {{$data['email']}}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="col-sm-4 col-sm-offset-3 text-right"><strong>Telefon</strong>
                                </td><td class="col-sm-1"></td>
                                <td>
                                    {{$data['telefon']}}
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection