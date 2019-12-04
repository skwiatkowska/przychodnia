@extends('layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Panel administracyjny
                    </h2>
                    <hr>
                    <p class="text-center">Witamy w Panelu Administracyjnym</p>
                    <br/>

                    <div class="text-center">
                        <div class="link">
                            <a class="btn btn-large btn-primary" role="button" href="panel/wizyty">Twoje wizyty</a>
                        </div>
                        <div class="link">
                            <a class="btn btn-large btn-info" role="button" href="panel/recepty">Twoje recepty</a>
                        </div>
                    </div>
                    <br/>
                    <hr>

                    <p>
                        Panel administracyjny zaprojektowaliśmy z myślą o każdym pacjenie, dzięki czemu administracja kontem jest prosta w obsłudze i nawet niedoświadczony użytkownik poradzi sobie z jego obsługą.

                        Funkcje panelu podzielone są na logiczne działy i grupy dzięki czemu w łatwy sposób odnajdziesz każdą interesującą Cię informację.
                        Panel administracyjny pozwoli Państwu na kontrolowanie wizyt oraz zamawianie recept bez konieczności wychodzenia z domu.
                        W każdej chwili mają Państwo możliwość odwołania wizyty, przełożenia jej, bądź zamówienia recepty na niezbędne leki przyjmowane na stałe.
                    </p>
                </div>
            </div>
        </div>
    </div>



@endsection