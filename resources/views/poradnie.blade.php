@extends('layout')

@section('content')

<div class="container">
<hr>
                    <h4 class="text-center">Zakres działalności</h4>
                    <hr>
  <div class="row">
    <div class="col-sm-4">
    <div class="hovereffect">
        <img class="img-responsive img-full" src="{{PUBLIC_URL}}img/dermatolog.jpg" alt="">
        <div class="overlay">
           <h2>Dermatolog</h2>
           <a class="info" href="#"></a>
        </div>
    </div>
    </div>
    <div class="col-sm-4">
    <div class="hovereffect">
        <img class="img-responsive img-full" src="{{PUBLIC_URL}}img/pediatra.jpg" alt="">
        <div class="overlay">
           <h2>Pediatra</h2>
           <a class="info" href="#"></a>
        </div>
    </div>
    </div>
    <div class="col-sm-4">
    <div class="hovereffect">
        <img class="img-responsive img-full" src="{{PUBLIC_URL}}img/endokrynolog.jpg" alt="">
        <div class="overlay">
           <h2>Endokrynolog</h2>
           <a class="info" href="#"></a>
        </div>
    </div>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-sm-4">
    <div class="hovereffect">
        <img class="img-responsive img-full" src="{{PUBLIC_URL}}img/ortopeda.jpg" alt="">
        <div class="overlay">
           <h2>Ortopeda</h2>
           <a class="info" href="#"></a>
        </div>
    </div>
    </div>
    <div class="col-sm-4">
    <div class="hovereffect">
        <img class="img-responsive img-full" src="{{PUBLIC_URL}}img/neurolog.jpg" alt="">
        <div class="overlay">
           <h2>Neurolog</h2>
           <a class="info" href="#"></a>
        </div>
    </div>
    </div>
    <div class="col-sm-4">
    <div class="hovereffect">
        <img class="img-responsive img-full" src="{{PUBLIC_URL}}img/kardiolog.jpg" alt="">
        <div class="overlay">
           <h2>Kardiolog</h2>
           <a class="info" href="#"></a>
        </div>
    </div>
    </div>
  </div>
</div>




@endsection