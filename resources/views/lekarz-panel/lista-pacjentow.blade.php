@extends('layouts.layout-lekarz')

@section('title', 'Lista pacjentów')


@section('content')


    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-8 col-lg-offset-2">
                    <hr>
                    <h2 class="intro-text text-center">Lista pacjentów
                    </h2>
                    <hr>
                    <br/>

                    <div class="table-responsive">
                    <table class="table table-striped  table-numbered">
                        <thead>
                            <tr>
                            <th>Nr</th>
                            <th>Imię i nazwisko</th>
                            <th>Pesel</th><th></th>
                            </tr></thead>
                            @foreach($patients as $patient)
                            <tr>
                            <td>
                            </td>
                                <td>
                                    {{$patient['imie']}} {{$patient['nazwisko']}}
                                </td>
                            
                                <td>
                                    {{$patient['pesel']}}
                                </td>
                                <td>
                                <a href="pacjent/{{$patient['id']}}">wybierz</a>
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