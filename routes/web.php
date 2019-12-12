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


Route::get('/panel_lekarza', 'DoctorController@mainSite');
Route::get('/panel_lekarza/lista_pacjentow', 'DoctorController@patientsList');
Route::get('/panel_lekarza/lista_pacjentow', 'DoctorController@patientsList');


Route::get('/recepcja', 'ReceptionController@mainSite');
Route::get('/recepcja/lista_pacjentow', 'ReceptionController@patientsList');
Route::get('/recepcja/lista_lekarzy', 'ReceptionController@doctorsList');


Route::get('/recepcja/pacjent/{id}', 'ReceptionController@patientData');
Route::get('/recepcja/lekarz/{id}', 'ReceptionController@doctorsDeadlines');


Route::get('/recepcja/dodaj_pacjenta', 'ReceptionController@patientRegisterFormView');
Route::post('/recepcja/dodaj_pacjenta', 'ReceptionController@patientRegister');


Route::get('/recepcja/dodaj_lekarza', 'ReceptionController@doctorRegisterFormView');
Route::post('/recepcja/dodaj_lekarza', 'ReceptionController@doctorRegister');
