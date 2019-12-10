@extends('layouts.layout')

@section('title', 'Nasi lekarze')


@section('content')


    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Lista lekarzy
                    </h2>
                    <hr>
                    <br/>

                    <div class="table-responsive">
                        <table class="table table-striped umow">
                            @foreach($doctors as $doctor)
                                <tr>
                                    <td>
                                        <strong>{{$doctor['imie']}} {{$doctor['nazwisko']}}</strong>
                                        <br>{{$doctor['specjalizacja']}}
                                    </td>
                                    <td>
                                        <a href="terminy/{{$doctor['id']}}">umów wizytę</a>
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