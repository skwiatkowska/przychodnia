@extends('layouts.layout-lekarz') @section('title', 'Harmonogram') @section('content')

<div class="container">

    <div class="row">
        <div class="box">
            <div class="row">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Zaplanowane wizyty</h2>
                    <hr>
                    <br/>

                </div>
            </div>
            <div class="row">
                            <div class="form-group">
                                <div class="col-md-2 col-md-offset-2">
                                <input type="date" class="form-control" id="wybierzDzienInput" required value="<?php echo date('Y-m-d'); ?>" onchange="getExactDate()">
                            <br><br></div>
                        </div>

                        <div class="row text-center" id="brakWizytDanegoDnia">
                            <p><br><br><br><br><br>Brak terminów w tym dniu.<br><br><br><br><br><br></p>
                        </div>

            <div class="row  col-md-8 col-md-offset-2"> 
            @foreach($data['terminy'] as $date => $hours)
                            <div class="border data">

                                <div class="row">
                                    <div class="form-group text-center font">
                                        <label class="control-label">{{$date}}</label>
                                    </div>
                                    <div class="form-group">
                                        <table class="table table-striped table-numbered">
                                            @foreach($hours as $hour )
                                                <tr>
                                                    <td class="col-md-1"></td>
                                                    <td id="oneRow" class="col-md-2">
                                                    {{substr($hour, 0, 5)}}

                                                    </td>
                                                    <td id="oneRow" class="col-md-3 col-md-offset-1">
                                                    @if(substr($hour, 6, -3) == "")
                                                    -
                                                    @else
                                                    {{substr($hour, 6, -2)}}
                                                    @endif
                                                    </td>
                                                    <td class="col-md-2 text-right">
                                                        <button class="btn btn-gray col-sm-10 redirectBtn" onclick="goToAPatientProfile({{substr($hour, -2)}})" type="btn" name="{{$hour}}">ds</button>
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

@endsection