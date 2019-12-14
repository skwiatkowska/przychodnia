@extends('layouts.layout')

@section('title', 'Zarządzaj kontem')

@section('content')

    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-6 col-lg-offset-3">
                <div class="row">
                    <hr>
                    <h4 class="intro-text text-center">Zmień swoje dane osobowe</h4>
                    <hr>
                    <form class="form-horizontal" method="post" action="ustawienia/zmien_dane" align="center">
                        <div class="row">
                            {{ csrf_field() }}
                            <fieldset>
                            <div class="form-group">
                                    <label for="tytul" class="col-sm-3 control-label">Tytuł naukowy</label>

                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="tytul" name="tytul"
                                               placeholder="Tytuł naukowy">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="imie" class="col-sm-3 control-label">Imię</label>

                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="imie" name="imie"
                                               placeholder="Imię">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="nazwisko" class="col-sm-3 control-label">Nazwisko</label>

                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="nazwisko" name="nazwisko"
                                               placeholder="Nazwisko">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="specjalizacja" class="col-sm-3 control-label">Specjalizacja</label>

                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="specjalizacja" name="specjalizacja"
                                               placeholder="Specjalizacja">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-3 control-label">E-mail</label>

                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="emaill" name="email"
                                               placeholder="E-mail">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="phone" class="col-sm-3 control-label">Telefon</label>

                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="phone" name="phone"
                                               placeholder="Telefon">
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3 col-sm-offset-2">
                                        <button type="submit" class="btn btn-primary form-control">Zatwierdź</button>
                                    </div>
                                </div>

                            </fieldset>
                        </div>
                    </form>
                </div>
                <br>
                <div class="row">
                    <hr>
                    <h4 class="intro-text text-center">Zmień hasło</h4>
                    <hr>
                    <form class="form-horizontal" method="post" action="ustawienia/zmien_haslo" align="center">
                        <div class="row">
                            {{ csrf_field() }}
                            <fieldset>

                            <div class="form-group">
                                    <label for="haslo" class="col-sm-3 control-label">Stare hasło</label>

                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="haslo" name="haslo"
                                               placeholder="Stare hasło">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="haslo" class="col-sm-3 control-label">Nowe hasło</label>

                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="haslo" name="haslo"
                                               placeholder="Nowe hasło">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="haslo" class="col-sm-3 control-label">Powtórz<br/> nowe hasło</label>

                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="haslo" name="haslo"
                                               placeholder="Nowe hasło">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-3 col-sm-offset-2">
                                        <button type="submit" class="btn btn-primary form-control">Zmień hasło</button>
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
