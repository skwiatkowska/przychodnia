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
Route::get('/panel/dane', 'PatientController@patientInfo');

Route::get('/panel/ustawienia', 'PatientController@settings');
Route::post('/panel/ustawienia/zmien_dane', 'PatientController@changeData');
Route::post('/panel/ustawienia/zmien_haslo', 'PatientController@changePassword');
Route::post('/panel/ustawienia/dezaktywuj', 'PatientController@disableAccount');


Route::get('/panel/wizyty', 'VisitController@visitsView');
Route::get('/panel/wizyty/dodaj', 'VisitController@addVisit');
Route::post('/panel/wizyty/usun', 'VisitController@deleteVisit');


Route::get('/panel_lekarza', 'DoctorController@mainSite');
Route::get('/panel_lekarza/lista_pacjentow', 'DoctorController@patientsList');
Route::get('/panel_lekarza/dane', 'DoctorController@doctorInfo');
Route::get('/panel_lekarza/pacjent/{id}', 'DoctorController@patientData');
Route::get('/panel_lekarza/wizyty', 'DoctorController@visits');


Route::get('/recepcja', 'ReceptionController@mainSite');
Route::get('/recepcja/lista_pacjentow', 'ReceptionController@patientsList');
Route::get('/recepcja/lista_lekarzy', 'ReceptionController@doctorsList');


Route::get('/recepcja/pacjent/{id}', 'ReceptionController@patientData');
//Route::get('/recepcja/pacjent/{id}/dodaj_wizyte', 'ReceptionController@addVisit');
Route::post('/recepcja/pacjent/{id}/usun_wizyte', 'ReceptionController@deleteVisit');
Route::get('/recepcja/pacjent/{id}/nowa_wizyta', 'ReceptionController@doctorsListForAPatient');
Route::get('/recepcja/pacjent/{id}/terminy/{doctor_id}', 'ReceptionController@doctorsDeadlinesForAPatient');

//Route::get('/recepcja/pacjent/{id}', 'ReceptionController@addVisit');
Route::get('/recepcja/pacjent/{id}/terminy/{id_lekarza}/dodaj_wizyte', 'ReceptionController@addVisit');


Route::get('/recepcja/pacjent/{id}/ustawienia', 'ReceptionController@patientSettings');
Route::post('/recepcja/pacjent/{id}/ustawienia/zmien_dane', 'ReceptionController@changePatientData');
Route::post('/recepcja/pacjent/{id}/ustawienia/zmien_haslo', 'ReceptionController@changePatientPassword');
Route::post('/recepcja/pacjent/{id}/ustawienia/dezaktywuj', 'ReceptionController@disablePatientAccount');


//Route::get('/recepcja/lekarz/{id}', 'ReceptionController@doctorsDeadlines');
Route::get('/recepcja/lekarz/{id}', 'ReceptionController@doctorData');


Route::get('/recepcja/dodaj_pacjenta', 'ReceptionController@patientRegisterFormView');
Route::post('/recepcja/dodaj_pacjenta', 'ReceptionController@patientRegister');


Route::get('/recepcja/dodaj_lekarza', 'ReceptionController@doctorRegisterFormView');
Route::post('/recepcja/dodaj_lekarza', 'ReceptionController@doctorRegister');

Route::get('/recepcja/wizyty', 'ReceptionController@allVisits');

