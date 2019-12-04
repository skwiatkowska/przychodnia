<?php

Route::get('/', 'HospitalController@mainSite');
Route::get('/lista_lekarzy', 'HospitalController@doctorsList');
Route::get('/terminy/{id}', 'HospitalController@doctorsDeadlines');

Route::get('/login', 'AuthController@formView')->name('formularz-logowania');
Route::post('/login', 'AuthController@login');
Route::get('/logout', 'AuthController@logout');

Route::get('/rejestracja', 'RegisterController@formView');
Route::post('/rejestracja', 'RegisterController@register');

Route::get('/panel', 'PanelController@mainSite');

Route::get('/panel/wizyty', 'VisitsController@visitsView');
Route::get('/panel/wizyty/dodaj', 'VisitsController@addVisit');
Route::post('/panel/wizyty/usun', 'VisitsController@deleteVisit');

//Route::get('/recepty', 'PrescriptionsController@mainSite');
//Route::get('/panel/recepty', 'PrescriptionsController@userPrescriptions');
//Route::post('/panel/recepty/dodaj', 'PrescriptionsController@addPrescription');
