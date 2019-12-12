@extends('layouts.layout')

@section('content')


    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Twoje wizyty
                    </h2>
                    <hr>
                    <br/>

                    <div class="table-responsive">
                        @if($wizyty->count()==0)
                            <h2 class="intro-text text-center">Brak wizyt <br><br><br>
                            <a class="btn btn-primary" href="/lista_lekarzy">Umów wizytę</a>
                            </h2>
                        @else
                            <table class="table table-striped">
                                <tr>
                                    <th>Imie i nazwisko</th>
                                    <th>Dzień</th>
                                    <th>Godzina</th>
                                    <th>Odwołaj</th>
                                </tr>
                                @foreach($wizyty as $wizyta)
                                    <tr>
                                        <td>
                                            {{$wizyta['lekarz']}}
                                        </td>
                                        <td>
                                            {{$wizyta['rok_miesiac_dzien']}}
                                        </td>
                                        <td>
                                            {{$wizyta['godzina_minuta']}}
                                        </td>
                                        <td>
                                            <form method="post" action="wizyty/usun">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id_wizyty" value="{{$wizyta['id']}}">
                                                <input type="submit" class="btn btn-sm btn-primary" role="button"
                                                       value="odwołaj"/>
                                            </form>
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