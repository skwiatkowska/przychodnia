@extends('layouts.layout') @section('content')

<div class="container">

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                    <div class="row">
                    <hr>
                    <h4 class="intro-text text-center">Twoje dane osobowe</h4>
                    <hr>
                    </div>
                    <div class="row">
                    <div class="col-sm-3 pull-right">
                         <a type="button" class="btn btn-info" role="button" href="/panel/ustawienia">Zmień ustawienia</a>
                    </div>
                    </div><br/></div>
                    <div class="col-lg-6 col-lg-offset-3">
                    <div class="table-responsive col-md-10 col-md-offset-1">
                        <table class="table table-striped">
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
                            <tr>
                                <td></td>
                                <td class="col-sm-4 col-sm-offset-3 text-right"><strong>Data urodzenia</strong>
                                </td><td class="col-sm-1"></td>
                                <td>
                                    {{$data['data_urodzenia']}}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="col-sm-4 col-sm-offset-3 text-right"><strong>Pesel</strong>
                                </td><td class="col-sm-1"></td>
                                <td>
                                    {{$data['pesel']}}
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="col-sm-4 col-sm-offset-3 text-right"><strong>Adres</strong>
                                </td><td class="col-sm-1"></td>
                                <td>
                                    {{$data['adres']}}
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