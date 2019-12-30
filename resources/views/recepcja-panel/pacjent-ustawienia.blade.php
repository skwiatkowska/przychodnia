@extends('layouts.layout-recepcja') @section('title', 'Zarządzanie danymi pacjenta') @section('content')



<div class="container">
    <div class="row">
        <div class="box"><br/>
		<div class="row">
                    <hr>
                    <h4 class="intro-text text-center">Pacjent <strong>{{$patientData['pacjent']['imie']}} {{$patientData['pacjent']['nazwisko']}}</strong></h4>
                    <hr><br/>
        </div>
		
        <div class="col-lg-6 col-lg-offset-3">
             <div class="row">
                    <hr>
                    <h4 class="intro-text text-center">Zmiana danych osobowych</h4>
                    <hr>
                    <form class="form-horizontal" method="post" action="ustawienia/zmien_dane" align="center">
                        <div class="row">
                            {{ csrf_field() }}
                            <fieldset>

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
                                    <label for="data_urodzenia" class="col-sm-3 control-label">Data urodzenia</label>

                                    <div class="col-sm-8">
                                        <input type="date" class="form-control" id="data_urodzenia" name="data_urodzenia"
                                               placeholder="Data urodzenia">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="pesel" class="col-sm-3 control-label">Pesel</label>

                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" id="pesel" name="pesel"
                                               placeholder="Pesel">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-sm-3 control-label">Adres</label>

                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="adres" name="adres"
                                               placeholder="Adres">
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
                    <h4 class="intro-text text-center">Zmiana hasła</h4>
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
                                        <input type="password" class="form-control" id="haslo1" name="haslo1"
                                               placeholder="Nowe hasło">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="haslo" class="col-sm-3 control-label">Powtórz<br/> nowe hasło</label>

                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="haslo2" name="haslo2"
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
                <br>
                <div class="row">
                    <hr>
                    <h4 class="intro-text text-center">Dezaktywacja konta</h4>
                    <hr>
                    <div class="text-justify small">
                    <p class="text-center">Dostęp do konta zostanie zablokowany, ale wszystkie dane zostaną zarchiwizowane w bazie danych Przychodni na wypadek ponownej potrzeby aktywacji konta.</p>
                    </div>
                    <form class="form-horizontal" method="post" action="ustawienia/dezaktywuj" align="center">
                        <div class="row">
                            {{ csrf_field() }}
                            <fieldset>

                            <div class="form-group">
                                    <label for="haslo" class="col-sm-3 control-label">Hasło</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control" id="haslo" name="haslo"
                                               placeholder="Hasło">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-3 col-sm-offset-2">
                                        <button type="submit" class="btn btn-danger form-control">Dezaktywuj</button>
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
</div>

@endsection