@extends('layouts.layout-recepcja')

@section('title', 'Lista pacjentów')


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
                        <tr><th>Nr</th>
                                <th>Imię i nazwisko</th>
                            </tr>
                            @foreach($doctors as $doctor)
                                <tr><td></td>
                                    <td>
                             
                                        {{$doctor['imie']}} {{$doctor['nazwisko']}} 
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