@extends('layouts.layout-recepcja') 
@section('title', 'Lista pacjentów')
@section('content')

<div class="container">

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <div class="row">
                    <hr>
                    <h2 class="intro-text text-center">Lista pacjentów
                    </h2>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-sm-3 pull-right">
                         <a type="button" class="btn btn-info" role="button" href="#">Dodaj nowego pacjenta</a>
                    </div>
                </div><br/>
                <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="table-responsive">
                        <table class="table table-striped">
                        <thead>
                            <tr>
                            <th>Nr</th>
                            <th>Imię i nazwisko</th>
                            <th>Pesel</th><th></th><th></th>
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
    </div>
</div>



@endsection