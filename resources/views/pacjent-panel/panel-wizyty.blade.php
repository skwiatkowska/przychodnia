@extends('layouts.layout') @section('title', 'Wizyty') @section('content')

<div class="container">
    <div class="row">
        <div class="box">
            <div class="col-lg-12">
                <hr>
                <h2 class="intro-text text-center">Twoje wizyty
                    </h2>
                <hr>
                <br/>
                <div class="row">
                    <div class="col-sm-3 pull-right">
                        <a type="button" class="btn btn-info" role="button" href="/lista_lekarzy">Nowa wizyta</a>
                    </div>
                </div>
                <br>
                <br>
                <div class="col-md-8 col-md-offset-2">

                    <div class="table-responsive">
                        @if($wizytyPrzeszle->count()==0 && $wizytyDzis->count()==0 && $wizytyNadchodzace->count()==0)
                        <h2 class="intro-text text-center">Brak wizyt <br><br><br>
                            </h2> @else @if ($wizytyDzis->count() != 0)
                        <div class="container col-md-12">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h2 class="panel-title text-center">
          <a class="glyphicon glyphicon-menu-down" data-toggle="collapse" href="#today"> <b>Dziś</b></a>
        </h2>
                                    </div>
                                    <div id="today" class="panel-collapse collapse in">
                                        <table class="table table-striped">
                                            <tr>
                                                <th>Lekarz</th>
                                                <th>Dzień</th>
                                                <th>Godzina</th>
                                                <th>Odwołaj</th>
                                            </tr>
                                            @foreach($wizytyDzis as $wizyta)
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
                                                        <input type="submit" class="btn btn-sm btn-gray" role="button" value="odwołaj" />
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                        </div>
                        @endif @if ($wizytyNadchodzace->count() != 0)
                        <div class="container col-md-12">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h2 class="panel-title text-center">
          <a class="glyphicon glyphicon-menu-down" data-toggle="collapse" href="#future"> <b>Nadchodzące</b></a>
        </h2>
                                    </div>
                                    <div id="future" class="panel-collapse collapse">
                                        <table class="table table-striped">
                                            <tr>
                                                <th>Lekarz</th>
                                                <th>Dzień</th>
                                                <th>Godzina</th>
                                                <th>Odwołaj</th>
                                            </tr>
                                            @foreach($wizytyNadchodzace as $wizyta)
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
                                                        <input type="submit" class="btn btn-sm btn-gray" role="button" value="odwołaj" />
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                        </div>
                        @endif
                        <br>
                        <br> @if ($wizytyPrzeszle->count() != 0)

                        <div class="container col-md-12">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h2 class="panel-title text-center">
          <a class="glyphicon glyphicon-menu-down" data-toggle="collapse" href="#past"> <b>Minione</b></a>
        </h2>
                                    </div>
                                    <div id="past" class="panel-collapse collapse">
                                        <table class="table table-striped">
                                            <tr>
                                                <th class="col-md-6">Lekarz</th>
                                                <th class="col-md-3">Dzień</th>
                                                <th class="col-md-3">Godzina</th>
                                                <th></th>
                                            </tr>
                                            @foreach($wizytyPrzeszle as $wizyta)
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
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <br>
                        </div>

                        @endif @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection