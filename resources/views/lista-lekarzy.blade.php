@extends('layout')

@section('title', 'Przychodnia')


@section('content')


    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Rejestracja on-line
                        <strong>bez kolejek!</strong>
                    </h2>
                    <hr>
                    <h2 class="text-center">Lista lekarzy</h2>
                    <br/>

                    <div class="table-responsive">
                        <table class="table table-striped ania-center umow">
                            <tr>
                                <th>Imie i nazwisko</th>
                                <th>Gabinet</th>
                                <th>Telefon</th>
                                <th>Rejestracja on-line</th>
                            </tr>
                            @foreach($doctors as $doctor)
                                <tr>
                                    <td>
                                        {{$doctor['imie']}} {{$doctor['nazwisko']}}
                                    </td>
                                    <td>
                                        {{$doctor['gabinet']}}
                                    </td>
                                    <td>
                                        {{$doctor['telefon']}}
                                    </td>
                                    <td>
                                        <a href="terminy/{{$doctor['id']}}">umów wizyte</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                  <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Oto
                        <strong>Nasz zespol</strong>
                    </h2>
                    <hr>
                </div>
                <div class="col-sm-4 text-center">
                    <img class="img-responsive" src="{{PUBLIC_URL}}img/surgery.jpg" alt="">

                    <h3>Piotr Skalpel
                        <small>Chirurg</small>
                    </h3>
                </div>
                <div class="col-sm-4 text-center">
                    <img class="img-responsive" src="{{PUBLIC_URL}}img/profesor.jpg" alt="">

                    <h3>Marek Kowalski
                        <small>Internista</small>
                    </h3>
                </div>
                <div class="col-sm-4 text-center">
                    <img class="img-responsive" src="{{PUBLIC_URL}}img/internist.jpg" alt="">

                    <h3>Szymon Nowak
                        <small>Ortopeda</small>
                    </h3>
                </div>
                <div class="col-sm-offset-2 col-sm-4 text-center">
                    <img class="img-responsive" src="{{PUBLIC_URL}}img/family.jpg" alt="">

                    <h3>Agnieszka Mirkowska
                        <small>Internista</small>
                    </h3>
                </div>
                <div class="col-sm-4 text-center">
                    <img class="img-responsive" src="{{PUBLIC_URL}}img/dentist.jpg" alt="">

                    <h3>Izabela Szczydło
                        <small>Dermatolog</small>
                    </h3>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>


    </div>


@endsection