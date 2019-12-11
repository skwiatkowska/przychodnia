@extends('layouts.layout-lekarz')

@section('title', 'Lista pacjentów')


@section('content')


    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Lista pacjentów
                    </h2>
                    <hr>
                    <br/>

                    <div class="table-responsive">
                        <table class="table table-striped umow">
                        <tr>
                                <th>Imię i nazwisko</th>
                                <th>Adres</th>
                                <th>Pesel</th>
                            </tr>
                            @foreach($patients as $patient)
                                <tr>
                                    <td>
                                        {{$patient['imie']}} {{$patient['nazwisko']}} 
                                    </td>
                                    <td>
                                        {{$patient['adres']}} 
                                    </td>
                                    <td>
                                        {{$patient['pesel']}}
                                    </td>
                         
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>



    </div>


@endsection