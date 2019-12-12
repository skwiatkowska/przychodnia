@extends('layouts.layout-recepcja') 
@section('title', 'Lista lekarzy')
@section('content')

<div class="container">

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <div class="row">
                    <hr>
                    <h2 class="intro-text text-center">Lista lekarzy
                    </h2>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-sm-3 pull-right">
                         <a type="button" class="btn btn-info" role="button" href="#">Dodaj nowego lekarza</a>
                    </div>
                </div><br/>
                <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="table-responsive">
                    <table class="table table-striped umow">
                    <thead>
                        <tr><th>Nr</th>
                                <th>Imię i nazwisko</th>
                                <th>Specjalizacja</th>
                                <th>Gabinet</th>
                                <th></th>
                            </tr></thead>
                            @foreach($doctors as $doctor)
                                <tr><td></td>
                                    <td>
                                    {{$doctor['tytul']}} {{$doctor['imie']}} {{$doctor['nazwisko']}} 
                                    </td>
                                    <td>
                                        {{$doctor['specjalizacja']}}
                                    </td>
                                    <td>
                                        {{$doctor['gabinet']}}
                                    </td>
                                    <td>
                                <a href="lekarz/{{$doctor['id']}}">wybierz</a>
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