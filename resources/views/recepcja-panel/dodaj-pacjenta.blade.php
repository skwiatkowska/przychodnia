@extends('layouts.layout-recepcja')

@section('title', 'Dodaj nowego pacjenta')


@section('content')

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">{{$doctorsDeadlines['lekarz']['imie']}} {{$doctorsDeadlines['lekarz']['nazwisko']}}
                    </h2>
                    <hr>
                    <h4 class="text-center">Tfdcdvderminarz</h4>
                    <hr>
                    <br/>

                    @foreach($doctorsDeadlines['terminy'] as $date => $hours)
                        <div class="border">
                            <form role="form" class="visit-center form-horizontal" method="get"
                                  action="../panel/wizyty/dodaj">
                                <div class="row">
                                    {{ csrf_field() }}
                                    <div class="form-group text-center font">
                                        <label class="control-label">{{$date}}</label>
                                    </div>
                                    <div class="form-group">
                                        <select name="godzina" class="form-control">
                                            @foreach($hours as $hour )
                                                <option value="{{$hour}}">{{$hour}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group text-center">
                                        <input class="btn btn-info" type="submit" value="Rezerwuj termin">
                                    </div>
                                    {{--<div class="clearfix"></div>--}}
                                </div>
                                <input type="hidden" name="id_lekarza" value="{{$doctorsDeadlines['lekarz']['id']}}"/>
                                <input type="hidden" name="data" value="{{$date}}">
                            </form>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>


@endsection
