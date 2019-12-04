@extends('layout')

@section('content')


    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Twoje recepty
                    </h2>
                    <hr>
                    <br/>

                    <div class="table-responsive">
                        @if($recepty->count()==0)
                            <h2 class="intro-text text-center">Brak recept
                            </h2>
                        @else
                            <table class="table table-striped ania-center umow">
                                <tr>
                                    <th>Lekarz wystawiający</th>
                                    <th>Nazwa leku</th>
                                    <th>Dawka</th>
                                    <th>Ilość opakowań</th>
                                    <th>Sposób przyjmowania</th>
                                </tr>
                                @foreach($recepty as $dane)
                                    <tr>
                                        <td>
                                            {{$dane['lekarz']}}
                                        </td>
                                        <td>
                                            {{$dane['nazwa_leku']}}
                                        </td>
                                        <td>
                                            {{$dane['dawka']}}
                                        </td>
                                        <td>
                                            {{$dane['ilosc_opakowan']}}
                                        </td>
                                        <td>
                                            {{$dane['sposob_przyjmowania']}}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection