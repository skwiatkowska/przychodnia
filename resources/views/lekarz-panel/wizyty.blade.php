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
            @foreach($data['terminy'] as $date => $hours)
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

@endsection