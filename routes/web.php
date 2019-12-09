<?php

Route::get('/', 'HospitalController@mainSite');
Route::get('/lista_lekarzy', 'HospitalController@doctorsList');
Route::get('/lista_pacjentow', 'PatientController@patientsList');

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

Route::get('/panel/ustawienia', 'UserSettingsController@mainSite');

Route::get('/rodo', 'PrivacyClauseController@mainSite');
Route::get('/poradnie', 'ClinicsController@mainSite');
