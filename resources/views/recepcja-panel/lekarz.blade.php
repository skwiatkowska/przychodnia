@extends('layouts.layout-recepcja') 
@section('title', 'Zarządzanie kontem lekarza') 
@section('content')



<div class="container">
    <div class="row">
        <div class="box"><br/>
		<div class="row">
                    <hr>
                    <h4 class="intro-text text-center">Lekarz {{$doctorData['lekarz']['tytul']}} {{$doctorData['lekarz']['imie']}} {{$doctorData['lekarz']['nazwisko']}}</h4>
                    <hr><br/>
                    </div>
		<div class="row">
            <div class="col-lg-10 col-lg-offset-3">
                <div id="tab" data-toggle="buttons-radio">
                <div class="col-md-4 col-md-4-offset-1">
                         <a href="#dane" class="col-sm-8 btn btn-large btn-info active" data-toggle="tab">Dane osobowe</a>
                   </div>
                   <div class="col-md-4 col-md-4-offset-1">
                    <a href="#terminarz" class="col-sm-8 btn btn-large btn-info" data-toggle="tab">Terminarz</a>
                </div>
                </div></div>
             </div><br/>
			 <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                <div class="tab-content">
                    <div class="tab-pane active" id="dane">
                        <br>
                        <div class="row">
						<div class="col-lg-10 col-lg-offset-1">
                    
                </div> 
                        </div>
                    </div>
                    <div class="tab-pane" id="terminarz">
                        <br>
                        <div class="row">
                        </div>
                    </div>
				</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection