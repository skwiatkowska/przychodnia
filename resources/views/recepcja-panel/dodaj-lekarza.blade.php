@extends('layouts.layout-recepcja')

@section('title', 'Rejestracja nowego Lekarza')

@section('content')

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Rejestracja konta Lekarza</strong>
                    </h2>
                    <hr>
                    <div class="col-md-6 col-md-offset-3">
                    <form class="form-horizontal" method="post" align="center">
                        <div class="row">
                            {{ csrf_field() }}
                            <fieldset>
                            <div class="form-group">
                                    <label for="tytul" class="col-sm-2 control-label">Tytuł naukowy</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="tytul" name="tytul"
                                               placeholder="Tytuł naukowy">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="imie" class="col-sm-2 control-label">Imię</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="imie" name="imie"
                                               placeholder="Imię">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="nazwisko" class="col-sm-2 control-label">Nazwisko</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nazwisko" name="nazwisko"
                                               placeholder="Nazwisko">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="specjalizacja" class="col-sm-2 control-label">Specjalizacja</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="specjalizacja" name="specjalizacja"
                                               placeholder="Specjalizacja">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">E-mail</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="emaill" name="email"
                                               placeholder="E-mail">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-2 control-label">Telefon</label>

                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="phone" name="phone"
                                               placeholder="Telefon">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="gabinet" class="col-sm-2 control-label">Gabinet</label>

                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="gabinet" name="gabinet"
                                               placeholder="Pesel">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="haslo" class="col-sm-2 control-label">Hasło</label>

                                    <div class="col-sm-10">
                                        <input type="password" class="form-control" id="haslo" name="haslo"
                                               placeholder="Hasło">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3 col-sm-offset-2">
                                        <button type="submit" class="btn btn-primary form-control">Załóż konto</button>
                                    </div>
                                </div>

                            </fieldset>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection