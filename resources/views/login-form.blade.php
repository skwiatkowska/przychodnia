@extends('layouts.layout')

@section('content')

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h4 class="text-center">Masz konto?</h4>
                    <h4 class="text-center">Zaloguj się do Portalu</h4>
                    <hr>
                    <h6 class="text-center">Podaj swoje dane do logowania:</h6>
                    <form method="post" role="form" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3">
                                <input type="email" class="form-control" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3">
                                <input type="password" class="form-control" name="password" placeholder="Haslo">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3 text-center">
                            Loguj jako:
                            <input type="radio" name="user_type" value="patient" checked > Pacjent
                            <input type="radio" name="user_type" value="doctor"> Lekarz
                            <input type="radio" name="user_type" value="reception"> Recepcja
                            </div>
                        </div>
                        <hr>

                        <div class="form-group">
                            <div class="text-center">
                                <input class="btn btn-primary" type="submit" value="Zaloguj"/>
                            </div>
                        </div>
                    </form>
                    <div class="text-center">
                    <a href="/rejestracja">Nie masz konta pacjenta? Załóż je w 30 sekund</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection