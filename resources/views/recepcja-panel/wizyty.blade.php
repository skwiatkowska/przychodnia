@extends('layouts.layout-recepcja') 
@section('title', 'Lista lekarzy') 
@section('content')

<div class="container">

    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <div class="row">
                    <hr>
                    <h2 class="intro-text text-center">Wizyty - <b>{{$doctorData['lekarz']['tytul']}} {{$doctorData['lekarz']['imie']}} {{$doctorData['lekarz']['nazwisko']}}</b>
                    </h2>
                    <hr>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <ul class="nav nav-pills nav-stacked Fixed">
                            @foreach($doctors as $doctor)
                            @if($doctorData['lekarz']['id'] == $doctor['id'])
                                <li class=""><a class="btn btn-info btn-blue-hover-active" href="{{$doctor['id']}}">{{$doctor['tytul']}} {{$doctor['imie']}} {{$doctor['nazwisko']}} </a></li>
                            @else
                            <li class=""><a class="btn btn-info btn-blue-hover" href="{{$doctor['id']}}">{{$doctor['tytul']}} {{$doctor['imie']}} {{$doctor['nazwisko']}} </a></li>

                            @endif
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-md-9">
                    <div class="row"> 
                    </br>
            @foreach($doctorVisits['terminy'] as $date => $hours)
                <div class="border">

                    <div class="row">
                        <div class="form-group text-center font">
                            <label class="control-label">{{$date}}</label>
                        </div>
                        <div class="form-group">
                            <table class="table table-striped">
                                @foreach($hours as $hour )
                                <tr>
                                    <td>
                                        {{$hour}}
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    @endsection