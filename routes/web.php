<?php
Route::get('/', 'WebsiteController@mainSite');
Route::get('/rodo', 'WebsiteController@rodo');
Route::get('/poradnie', 'WebsiteController@clinicList');

Route::get('/login', 'AuthController@formView')->name('formularz-logowania');
Route::post('/login', 'AuthController@login');
Route::get('/logout', 'AuthController@logout');

Route::get('/rejestracja', 'RegisterController@formView');
Route::post('/rejestracja', 'RegisterController@register');

Route::get('/terminy/{id}', 'DoctorController@doctorsDeadlines');
Route::get('/lista_lekarzy', 'DoctorController@doctorsList');

Route::get('/panel', 'PatientController@mainSite');
Route::get('/panel/ustawienia', 'PatientController@settings');

Route::get('/panel/wizyty', 'VisitController@visitsView');
Route::get('/panel/wizyty/dodaj', 'VisitController@addVisit');
Route::post('/panel/wizyty/usun', 'VisitController@deleteVisit');

Route::get('/recepcja', 'ReceptionController@mainSite');
Route::get('/recepcja/lista_pacjentow', 'ReceptionController@patientsList');



