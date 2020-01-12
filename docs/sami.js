
window.projectVersion = 'master';

(function(root) {

    var bhIndex = null;
    var rootPath = '';
    var treeHtml = '        <ul>                <li data-name="namespace:App" class="opened">                    <div style="padding-left:0px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App.html">App</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:App_Console" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Console.html">Console</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Console_Kernel" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Console/Kernel.html">Kernel</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Exceptions" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Exceptions.html">Exceptions</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Exceptions_Handler" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Exceptions/Handler.html">Handler</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Http" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http.html">Http</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:App_Http_Controllers" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http/Controllers.html">Controllers</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="namespace:App_Http_Controllers_Auth" >                    <div style="padding-left:54px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http/Controllers/Auth.html">Auth</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Http_Controllers_Auth_ForgotPasswordController" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="App/Http/Controllers/Auth/ForgotPasswordController.html">ForgotPasswordController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_Auth_LoginController" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="App/Http/Controllers/Auth/LoginController.html">LoginController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_Auth_RegisterController" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="App/Http/Controllers/Auth/RegisterController.html">RegisterController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_Auth_ResetPasswordController" >                    <div style="padding-left:80px" class="hd leaf">                        <a href="App/Http/Controllers/Auth/ResetPasswordController.html">ResetPasswordController</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:App_Http_Controllers_AuthController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/AuthController.html">AuthController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_Controller" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/Controller.html">Controller</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_DoctorController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/DoctorController.html">DoctorController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_HomeController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/HomeController.html">HomeController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_PatientController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/PatientController.html">PatientController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_ReceptionController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/ReceptionController.html">ReceptionController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_RegisterController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/RegisterController.html">RegisterController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_VisitController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/VisitController.html">VisitController</a>                    </div>                </li>                            <li data-name="class:App_Http_Controllers_WebsiteController" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Controllers/WebsiteController.html">WebsiteController</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Http_Middleware" >                    <div style="padding-left:36px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Http/Middleware.html">Middleware</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Http_Middleware_EncryptCookies" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/EncryptCookies.html">EncryptCookies</a>                    </div>                </li>                            <li data-name="class:App_Http_Middleware_RedirectIfAuthenticated" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/RedirectIfAuthenticated.html">RedirectIfAuthenticated</a>                    </div>                </li>                            <li data-name="class:App_Http_Middleware_RevalidateBackHistory" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/RevalidateBackHistory.html">RevalidateBackHistory</a>                    </div>                </li>                            <li data-name="class:App_Http_Middleware_TrimStrings" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/TrimStrings.html">TrimStrings</a>                    </div>                </li>                            <li data-name="class:App_Http_Middleware_VerifyCsrfToken" >                    <div style="padding-left:62px" class="hd leaf">                        <a href="App/Http/Middleware/VerifyCsrfToken.html">VerifyCsrfToken</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:App_Http_Kernel" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Http/Kernel.html">Kernel</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="namespace:App_Providers" class="opened">                    <div style="padding-left:18px" class="hd">                        <span class="glyphicon glyphicon-play"></span><a href="App/Providers.html">Providers</a>                    </div>                    <div class="bd">                                <ul>                <li data-name="class:App_Providers_AppServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/AppServiceProvider.html">AppServiceProvider</a>                    </div>                </li>                            <li data-name="class:App_Providers_AuthServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/AuthServiceProvider.html">AuthServiceProvider</a>                    </div>                </li>                            <li data-name="class:App_Providers_BroadcastServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/BroadcastServiceProvider.html">BroadcastServiceProvider</a>                    </div>                </li>                            <li data-name="class:App_Providers_EventServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/EventServiceProvider.html">EventServiceProvider</a>                    </div>                </li>                            <li data-name="class:App_Providers_RouteServiceProvider" >                    <div style="padding-left:44px" class="hd leaf">                        <a href="App/Providers/RouteServiceProvider.html">RouteServiceProvider</a>                    </div>                </li>                </ul></div>                </li>                            <li data-name="class:App_Deadline" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/Deadline.html">Deadline</a>                    </div>                </li>                            <li data-name="class:App_Doctor" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/Doctor.html">Doctor</a>                    </div>                </li>                            <li data-name="class:App_History" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/History.html">History</a>                    </div>                </li>                            <li data-name="class:App_Patient" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/Patient.html">Patient</a>                    </div>                </li>                            <li data-name="class:App_User" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/User.html">User</a>                    </div>                </li>                            <li data-name="class:App_Visit" class="opened">                    <div style="padding-left:26px" class="hd leaf">                        <a href="App/Visit.html">Visit</a>                    </div>                </li>                </ul></div>                </li>                </ul>';

    var searchTypeClasses = {
        'Namespace': 'label-default',
        'Class': 'label-info',
        'Interface': 'label-primary',
        'Trait': 'label-success',
        'Method': 'label-danger',
        '_': 'label-warning'
    };

    var searchIndex = [
                    
            {"type": "Namespace", "link": "App.html", "name": "App", "doc": "Namespace App"},{"type": "Namespace", "link": "App/Console.html", "name": "App\\Console", "doc": "Namespace App\\Console"},{"type": "Namespace", "link": "App/Exceptions.html", "name": "App\\Exceptions", "doc": "Namespace App\\Exceptions"},{"type": "Namespace", "link": "App/Http.html", "name": "App\\Http", "doc": "Namespace App\\Http"},{"type": "Namespace", "link": "App/Http/Controllers.html", "name": "App\\Http\\Controllers", "doc": "Namespace App\\Http\\Controllers"},{"type": "Namespace", "link": "App/Http/Controllers/Auth.html", "name": "App\\Http\\Controllers\\Auth", "doc": "Namespace App\\Http\\Controllers\\Auth"},{"type": "Namespace", "link": "App/Http/Middleware.html", "name": "App\\Http\\Middleware", "doc": "Namespace App\\Http\\Middleware"},{"type": "Namespace", "link": "App/Providers.html", "name": "App\\Providers", "doc": "Namespace App\\Providers"},
            
            {"type": "Class", "fromName": "App\\Console", "fromLink": "App/Console.html", "link": "App/Console/Kernel.html", "name": "App\\Console\\Kernel", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Console\\Kernel", "fromLink": "App/Console/Kernel.html", "link": "App/Console/Kernel.html#method_schedule", "name": "App\\Console\\Kernel::schedule", "doc": "&quot;Define the application&#039;s command schedule.&quot;"},
                    {"type": "Method", "fromName": "App\\Console\\Kernel", "fromLink": "App/Console/Kernel.html", "link": "App/Console/Kernel.html#method_commands", "name": "App\\Console\\Kernel::commands", "doc": "&quot;Register the Closure based commands for the application.&quot;"},
            
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/Deadline.html", "name": "App\\Deadline", "doc": "&quot;Klasa odpowiedzialna za terminarz danego lekarza.&quot;"},
                                                        {"type": "Method", "fromName": "App\\Deadline", "fromLink": "App/Deadline.html", "link": "App/Deadline.html#method_findDoctorFreeDeadlines", "name": "App\\Deadline::findDoctorFreeDeadlines", "doc": "&quot;Funkcja znajduje wolne terminy danego lekarza.&quot;"},
                    {"type": "Method", "fromName": "App\\Deadline", "fromLink": "App/Deadline.html", "link": "App/Deadline.html#method_findDoctorAllDeadlines", "name": "App\\Deadline::findDoctorAllDeadlines", "doc": "&quot;Funkcja znajduje wszystkie terminy danego lekarza.&quot;"},
            
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/Doctor.html", "name": "App\\Doctor", "doc": "&quot;Klasa odpowiedzialna za lekarza.&quot;"},
                                                        {"type": "Method", "fromName": "App\\Doctor", "fromLink": "App/Doctor.html", "link": "App/Doctor.html#method_addNewUser", "name": "App\\Doctor::addNewUser", "doc": "&quot;Funkcja dodaje nowego lekarza do bazy.&quot;"},
                    {"type": "Method", "fromName": "App\\Doctor", "fromLink": "App/Doctor.html", "link": "App/Doctor.html#method_getErrors", "name": "App\\Doctor::getErrors", "doc": "&quot;Funkcja zwraca b\u0142\u0119dy.&quot;"},
                    {"type": "Method", "fromName": "App\\Doctor", "fromLink": "App/Doctor.html", "link": "App/Doctor.html#method_getData", "name": "App\\Doctor::getData", "doc": "&quot;Funkcja zwraca wszystkie dane lekarza.&quot;"},
            
            {"type": "Class", "fromName": "App\\Exceptions", "fromLink": "App/Exceptions.html", "link": "App/Exceptions/Handler.html", "name": "App\\Exceptions\\Handler", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Exceptions\\Handler", "fromLink": "App/Exceptions/Handler.html", "link": "App/Exceptions/Handler.html#method_report", "name": "App\\Exceptions\\Handler::report", "doc": "&quot;Report or log an exception.&quot;"},
                    {"type": "Method", "fromName": "App\\Exceptions\\Handler", "fromLink": "App/Exceptions/Handler.html", "link": "App/Exceptions/Handler.html#method_render", "name": "App\\Exceptions\\Handler::render", "doc": "&quot;Render an exception into an HTTP response.&quot;"},
                    {"type": "Method", "fromName": "App\\Exceptions\\Handler", "fromLink": "App/Exceptions/Handler.html", "link": "App/Exceptions/Handler.html#method_unauthenticated", "name": "App\\Exceptions\\Handler::unauthenticated", "doc": "&quot;Convert an authentication exception into an unauthenticated response.&quot;"},
            
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/History.html", "name": "App\\History", "doc": "&quot;Klasa odpowiedzialna za histori\u0119 wizyt pacjenta.&quot;"},
                                                        {"type": "Method", "fromName": "App\\History", "fromLink": "App/History.html", "link": "App/History.html#method_addNewHistory", "name": "App\\History::addNewHistory", "doc": "&quot;Funkcja dodaje now\u0105 histori\u0119 wizyty do bazy.&quot;"},
                    {"type": "Method", "fromName": "App\\History", "fromLink": "App/History.html", "link": "App/History.html#method_getHistory", "name": "App\\History::getHistory", "doc": "&quot;Funkcja zwraca wszystkie historie wizyt pacjenta.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/AuthController.html", "name": "App\\Http\\Controllers\\AuthController", "doc": "&quot;Kontroler autoryzacji.&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\AuthController", "fromLink": "App/Http/Controllers/AuthController.html", "link": "App/Http/Controllers/AuthController.html#method_formView", "name": "App\\Http\\Controllers\\AuthController::formView", "doc": "&quot;Funkcja odpowiada za wy\u015bwietlenie formularza logowania.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\AuthController", "fromLink": "App/Http/Controllers/AuthController.html", "link": "App/Http/Controllers/AuthController.html#method_login", "name": "App\\Http\\Controllers\\AuthController::login", "doc": "&quot;Funkcja odpowiada za przes\u0142anie danych logowania.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\AuthController", "fromLink": "App/Http/Controllers/AuthController.html", "link": "App/Http/Controllers/AuthController.html#method_logout", "name": "App\\Http\\Controllers\\AuthController::logout", "doc": "&quot;Funkcja odpowiada za wylogowywanie.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\AuthController", "fromLink": "App/Http/Controllers/AuthController.html", "link": "App/Http/Controllers/AuthController.html#method_authenticated", "name": "App\\Http\\Controllers\\AuthController::authenticated", "doc": "&quot;?????Funkcja odpowiada za wylogowywanie.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers\\Auth", "fromLink": "App/Http/Controllers/Auth.html", "link": "App/Http/Controllers/Auth/ForgotPasswordController.html", "name": "App\\Http\\Controllers\\Auth\\ForgotPasswordController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\Auth\\ForgotPasswordController", "fromLink": "App/Http/Controllers/Auth/ForgotPasswordController.html", "link": "App/Http/Controllers/Auth/ForgotPasswordController.html#method___construct", "name": "App\\Http\\Controllers\\Auth\\ForgotPasswordController::__construct", "doc": "&quot;Create a new controller instance.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers\\Auth", "fromLink": "App/Http/Controllers/Auth.html", "link": "App/Http/Controllers/Auth/LoginController.html", "name": "App\\Http\\Controllers\\Auth\\LoginController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\Auth\\LoginController", "fromLink": "App/Http/Controllers/Auth/LoginController.html", "link": "App/Http/Controllers/Auth/LoginController.html#method_authenticated", "name": "App\\Http\\Controllers\\Auth\\LoginController::authenticated", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\Auth\\LoginController", "fromLink": "App/Http/Controllers/Auth/LoginController.html", "link": "App/Http/Controllers/Auth/LoginController.html#method___construct", "name": "App\\Http\\Controllers\\Auth\\LoginController::__construct", "doc": "&quot;Create a new controller instance.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers\\Auth", "fromLink": "App/Http/Controllers/Auth.html", "link": "App/Http/Controllers/Auth/RegisterController.html", "name": "App\\Http\\Controllers\\Auth\\RegisterController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\Auth\\RegisterController", "fromLink": "App/Http/Controllers/Auth/RegisterController.html", "link": "App/Http/Controllers/Auth/RegisterController.html#method___construct", "name": "App\\Http\\Controllers\\Auth\\RegisterController::__construct", "doc": "&quot;Create a new controller instance.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\Auth\\RegisterController", "fromLink": "App/Http/Controllers/Auth/RegisterController.html", "link": "App/Http/Controllers/Auth/RegisterController.html#method_validator", "name": "App\\Http\\Controllers\\Auth\\RegisterController::validator", "doc": "&quot;Get a validator for an incoming registration request.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\Auth\\RegisterController", "fromLink": "App/Http/Controllers/Auth/RegisterController.html", "link": "App/Http/Controllers/Auth/RegisterController.html#method_create", "name": "App\\Http\\Controllers\\Auth\\RegisterController::create", "doc": "&quot;Create a new user instance after a valid registration.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers\\Auth", "fromLink": "App/Http/Controllers/Auth.html", "link": "App/Http/Controllers/Auth/ResetPasswordController.html", "name": "App\\Http\\Controllers\\Auth\\ResetPasswordController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\Auth\\ResetPasswordController", "fromLink": "App/Http/Controllers/Auth/ResetPasswordController.html", "link": "App/Http/Controllers/Auth/ResetPasswordController.html#method___construct", "name": "App\\Http\\Controllers\\Auth\\ResetPasswordController::__construct", "doc": "&quot;Create a new controller instance.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/Controller.html", "name": "App\\Http\\Controllers\\Controller", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/DoctorController.html", "name": "App\\Http\\Controllers\\DoctorController", "doc": "&quot;Kontroler panelu lekarza.&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\DoctorController", "fromLink": "App/Http/Controllers/DoctorController.html", "link": "App/Http/Controllers/DoctorController.html#method_mainSite", "name": "App\\Http\\Controllers\\DoctorController::mainSite", "doc": "&quot;Funkcja odpowiada za wy\u015bwietlenie panelu lekarza.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\DoctorController", "fromLink": "App/Http/Controllers/DoctorController.html", "link": "App/Http/Controllers/DoctorController.html#method_doctorsList", "name": "App\\Http\\Controllers\\DoctorController::doctorsList", "doc": "&quot;Funkcja odpowiada za wy\u015bwietlenie listy lekarzy.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\DoctorController", "fromLink": "App/Http/Controllers/DoctorController.html", "link": "App/Http/Controllers/DoctorController.html#method_doctorsDeadlines", "name": "App\\Http\\Controllers\\DoctorController::doctorsDeadlines", "doc": "&quot;Funkcja odpowiada za wy\u015bwietlenie wolnych termin\u00f3w lekarza.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\DoctorController", "fromLink": "App/Http/Controllers/DoctorController.html", "link": "App/Http/Controllers/DoctorController.html#method_patientsList", "name": "App\\Http\\Controllers\\DoctorController::patientsList", "doc": "&quot;Funkcja odpowiada za wy\u015bwietlenie listy pacjent\u00f3w.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\DoctorController", "fromLink": "App/Http/Controllers/DoctorController.html", "link": "App/Http/Controllers/DoctorController.html#method_doctorInfo", "name": "App\\Http\\Controllers\\DoctorController::doctorInfo", "doc": "&quot;Funkcja odpowiada za wy\u015bwietlenie danych lekarza.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\DoctorController", "fromLink": "App/Http/Controllers/DoctorController.html", "link": "App/Http/Controllers/DoctorController.html#method_patientData", "name": "App\\Http\\Controllers\\DoctorController::patientData", "doc": "&quot;Funkcja odpowiada za wy\u015bwietlenie danych pacjenta.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\DoctorController", "fromLink": "App/Http/Controllers/DoctorController.html", "link": "App/Http/Controllers/DoctorController.html#method_visits", "name": "App\\Http\\Controllers\\DoctorController::visits", "doc": "&quot;Funkcja odpowiada za wy\u015bwietlenie wizyt u lekarza.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/HomeController.html", "name": "App\\Http\\Controllers\\HomeController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\HomeController", "fromLink": "App/Http/Controllers/HomeController.html", "link": "App/Http/Controllers/HomeController.html#method___construct", "name": "App\\Http\\Controllers\\HomeController::__construct", "doc": "&quot;Create a new controller instance.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\HomeController", "fromLink": "App/Http/Controllers/HomeController.html", "link": "App/Http/Controllers/HomeController.html#method_index", "name": "App\\Http\\Controllers\\HomeController::index", "doc": "&quot;Show the application dashboard.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/PatientController.html", "name": "App\\Http\\Controllers\\PatientController", "doc": "&quot;Kontroler panelu pacjenta.&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\PatientController", "fromLink": "App/Http/Controllers/PatientController.html", "link": "App/Http/Controllers/PatientController.html#method_mainSite", "name": "App\\Http\\Controllers\\PatientController::mainSite", "doc": "&quot;Funkcja odpowiada za wy\u015bwietlenie panelu pacjenta.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\PatientController", "fromLink": "App/Http/Controllers/PatientController.html", "link": "App/Http/Controllers/PatientController.html#method_settings", "name": "App\\Http\\Controllers\\PatientController::settings", "doc": "&quot;Funkcja odpowiada za wy\u015bwietlenie panelu ustawie\u0144.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\PatientController", "fromLink": "App/Http/Controllers/PatientController.html", "link": "App/Http/Controllers/PatientController.html#method_patientInfo", "name": "App\\Http\\Controllers\\PatientController::patientInfo", "doc": "&quot;Funkcja odpowiada za wy\u015bwietlenie danych pacjenta.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\PatientController", "fromLink": "App/Http/Controllers/PatientController.html", "link": "App/Http/Controllers/PatientController.html#method_changeData", "name": "App\\Http\\Controllers\\PatientController::changeData", "doc": "&quot;Funkcja odpowiada za przes\u0142anie danych do zmiany ustawie\u0144&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\PatientController", "fromLink": "App/Http/Controllers/PatientController.html", "link": "App/Http/Controllers/PatientController.html#method_changePassword", "name": "App\\Http\\Controllers\\PatientController::changePassword", "doc": "&quot;Funkcja odpowiada za przes\u0142anie danych do zmiany has\u0142a&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\PatientController", "fromLink": "App/Http/Controllers/PatientController.html", "link": "App/Http/Controllers/PatientController.html#method_disableAccount", "name": "App\\Http\\Controllers\\PatientController::disableAccount", "doc": "&quot;????Funkcja odpowiada za dezaktywacj\u0119 konta.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/ReceptionController.html", "name": "App\\Http\\Controllers\\ReceptionController", "doc": "&quot;Kontroler panelu recepcji.&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\ReceptionController", "fromLink": "App/Http/Controllers/ReceptionController.html", "link": "App/Http/Controllers/ReceptionController.html#method_mainSite", "name": "App\\Http\\Controllers\\ReceptionController::mainSite", "doc": "&quot;Funkcja odpowiada za wy\u015bwietlenie panelu recepcji.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ReceptionController", "fromLink": "App/Http/Controllers/ReceptionController.html", "link": "App/Http/Controllers/ReceptionController.html#method_patientRegisterFormView", "name": "App\\Http\\Controllers\\ReceptionController::patientRegisterFormView", "doc": "&quot;Funkcja odpowiada za wy\u015bwietlenie formularza rejestracji pacjenta.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ReceptionController", "fromLink": "App/Http/Controllers/ReceptionController.html", "link": "App/Http/Controllers/ReceptionController.html#method_disablePatientAccount", "name": "App\\Http\\Controllers\\ReceptionController::disablePatientAccount", "doc": "&quot;Funkcja odpowiada za dezaktywacj\u0119 konta pacjenta.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ReceptionController", "fromLink": "App/Http/Controllers/ReceptionController.html", "link": "App/Http/Controllers/ReceptionController.html#method_enablePatientAccount", "name": "App\\Http\\Controllers\\ReceptionController::enablePatientAccount", "doc": "&quot;Funkcja odpowiada za aktywacj\u0119 konta pacjenta.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ReceptionController", "fromLink": "App/Http/Controllers/ReceptionController.html", "link": "App/Http/Controllers/ReceptionController.html#method_patientRegister", "name": "App\\Http\\Controllers\\ReceptionController::patientRegister", "doc": "&quot;Funkcja odpowiada za przes\u0142anie danych rejestracji pacjenta.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ReceptionController", "fromLink": "App/Http/Controllers/ReceptionController.html", "link": "App/Http/Controllers/ReceptionController.html#method_doctorRegisterFormView", "name": "App\\Http\\Controllers\\ReceptionController::doctorRegisterFormView", "doc": "&quot;Funkcja odpowiada za wy\u015bwietlenie formularza rejestracji lekarza.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ReceptionController", "fromLink": "App/Http/Controllers/ReceptionController.html", "link": "App/Http/Controllers/ReceptionController.html#method_doctorRegister", "name": "App\\Http\\Controllers\\ReceptionController::doctorRegister", "doc": "&quot;Funkcja odpowiada za przes\u0142anie danych rejestracji lekarza.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ReceptionController", "fromLink": "App/Http/Controllers/ReceptionController.html", "link": "App/Http/Controllers/ReceptionController.html#method_doctorsList", "name": "App\\Http\\Controllers\\ReceptionController::doctorsList", "doc": "&quot;Funkcja odpowiada za wy\u015bwietlenie listy lekarzy.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ReceptionController", "fromLink": "App/Http/Controllers/ReceptionController.html", "link": "App/Http/Controllers/ReceptionController.html#method_doctorsListForVisits", "name": "App\\Http\\Controllers\\ReceptionController::doctorsListForVisits", "doc": "&quot;Funkcja odpowiada za wy\u015bwietlenie panelu wizyt.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ReceptionController", "fromLink": "App/Http/Controllers/ReceptionController.html", "link": "App/Http/Controllers/ReceptionController.html#method_doctorsListAndVisits", "name": "App\\Http\\Controllers\\ReceptionController::doctorsListAndVisits", "doc": "&quot;????Funkcja odpowiada za wy\u015bwietlenie listy lekarzy wraz z wizytami.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ReceptionController", "fromLink": "App/Http/Controllers/ReceptionController.html", "link": "App/Http/Controllers/ReceptionController.html#method_doctorsListForAPatient", "name": "App\\Http\\Controllers\\ReceptionController::doctorsListForAPatient", "doc": "&quot;Funkcja odpowiada za wy\u015bwietlenie panelu nowej wizyty.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ReceptionController", "fromLink": "App/Http/Controllers/ReceptionController.html", "link": "App/Http/Controllers/ReceptionController.html#method_doctorsDeadlinesForAPatient", "name": "App\\Http\\Controllers\\ReceptionController::doctorsDeadlinesForAPatient", "doc": "&quot;???Funkcja odpowiada za wy\u015bwietlenie mo\u017cliwych termin\u00f3w nowej wizyty.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ReceptionController", "fromLink": "App/Http/Controllers/ReceptionController.html", "link": "App/Http/Controllers/ReceptionController.html#method_doctorsDeadlines", "name": "App\\Http\\Controllers\\ReceptionController::doctorsDeadlines", "doc": "&quot;Funkcja odpowiada za wy\u015bwietlenie wolnych termin\u00f3w danego lekarza.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ReceptionController", "fromLink": "App/Http/Controllers/ReceptionController.html", "link": "App/Http/Controllers/ReceptionController.html#method_patientsList", "name": "App\\Http\\Controllers\\ReceptionController::patientsList", "doc": "&quot;Funkcja odpowiada za wy\u015bwietlenie listy pacjent\u00f3w.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ReceptionController", "fromLink": "App/Http/Controllers/ReceptionController.html", "link": "App/Http/Controllers/ReceptionController.html#method_patientData", "name": "App\\Http\\Controllers\\ReceptionController::patientData", "doc": "&quot;Funkcja odpowiada za wy\u015bwietlenie danych danego pacjenta.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ReceptionController", "fromLink": "App/Http/Controllers/ReceptionController.html", "link": "App/Http/Controllers/ReceptionController.html#method_allVisits", "name": "App\\Http\\Controllers\\ReceptionController::allVisits", "doc": "&quot;Funkcja odpowiada za wy\u015bwietlenie wszystkich wizyt&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ReceptionController", "fromLink": "App/Http/Controllers/ReceptionController.html", "link": "App/Http/Controllers/ReceptionController.html#method_patientSettings", "name": "App\\Http\\Controllers\\ReceptionController::patientSettings", "doc": "&quot;Funkcja odpowiada za wy\u015bwietlenie panelu ustawie\u0144 pacjenta.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ReceptionController", "fromLink": "App/Http/Controllers/ReceptionController.html", "link": "App/Http/Controllers/ReceptionController.html#method_doctorSettings", "name": "App\\Http\\Controllers\\ReceptionController::doctorSettings", "doc": "&quot;Funkcja odpowiada za wy\u015bwietlenie panelu ustawie\u0144 lekarza.&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ReceptionController", "fromLink": "App/Http/Controllers/ReceptionController.html", "link": "App/Http/Controllers/ReceptionController.html#method_addVisit", "name": "App\\Http\\Controllers\\ReceptionController::addVisit", "doc": "&quot;Funkcja odpowiada za przes\u0142anie danych um\u00f3wienia wizyty&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ReceptionController", "fromLink": "App/Http/Controllers/ReceptionController.html", "link": "App/Http/Controllers/ReceptionController.html#method_deleteVisit", "name": "App\\Http\\Controllers\\ReceptionController::deleteVisit", "doc": "&quot;Funkcja odpowiada za przes\u0142anie danych odwo\u0142ania wizyty&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\ReceptionController", "fromLink": "App/Http/Controllers/ReceptionController.html", "link": "App/Http/Controllers/ReceptionController.html#method_doctorData", "name": "App\\Http\\Controllers\\ReceptionController::doctorData", "doc": "&quot;Funkcja odpowiada za pwy\u015bwietlenie danych danego lekarza&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/RegisterController.html", "name": "App\\Http\\Controllers\\RegisterController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\RegisterController", "fromLink": "App/Http/Controllers/RegisterController.html", "link": "App/Http/Controllers/RegisterController.html#method_formView", "name": "App\\Http\\Controllers\\RegisterController::formView", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\RegisterController", "fromLink": "App/Http/Controllers/RegisterController.html", "link": "App/Http/Controllers/RegisterController.html#method_register", "name": "App\\Http\\Controllers\\RegisterController::register", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/VisitController.html", "name": "App\\Http\\Controllers\\VisitController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\VisitController", "fromLink": "App/Http/Controllers/VisitController.html", "link": "App/Http/Controllers/VisitController.html#method_visitsView", "name": "App\\Http\\Controllers\\VisitController::visitsView", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\VisitController", "fromLink": "App/Http/Controllers/VisitController.html", "link": "App/Http/Controllers/VisitController.html#method_addVisit", "name": "App\\Http\\Controllers\\VisitController::addVisit", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\VisitController", "fromLink": "App/Http/Controllers/VisitController.html", "link": "App/Http/Controllers/VisitController.html#method_deleteVisit", "name": "App\\Http\\Controllers\\VisitController::deleteVisit", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Controllers", "fromLink": "App/Http/Controllers.html", "link": "App/Http/Controllers/WebsiteController.html", "name": "App\\Http\\Controllers\\WebsiteController", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Controllers\\WebsiteController", "fromLink": "App/Http/Controllers/WebsiteController.html", "link": "App/Http/Controllers/WebsiteController.html#method_mainSite", "name": "App\\Http\\Controllers\\WebsiteController::mainSite", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\WebsiteController", "fromLink": "App/Http/Controllers/WebsiteController.html", "link": "App/Http/Controllers/WebsiteController.html#method_rodo", "name": "App\\Http\\Controllers\\WebsiteController::rodo", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Http\\Controllers\\WebsiteController", "fromLink": "App/Http/Controllers/WebsiteController.html", "link": "App/Http/Controllers/WebsiteController.html#method_clinicList", "name": "App\\Http\\Controllers\\WebsiteController::clinicList", "doc": "&quot;&quot;"},
            
            {"type": "Class", "fromName": "App\\Http", "fromLink": "App/Http.html", "link": "App/Http/Kernel.html", "name": "App\\Http\\Kernel", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/EncryptCookies.html", "name": "App\\Http\\Middleware\\EncryptCookies", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/RedirectIfAuthenticated.html", "name": "App\\Http\\Middleware\\RedirectIfAuthenticated", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Middleware\\RedirectIfAuthenticated", "fromLink": "App/Http/Middleware/RedirectIfAuthenticated.html", "link": "App/Http/Middleware/RedirectIfAuthenticated.html#method_handle", "name": "App\\Http\\Middleware\\RedirectIfAuthenticated::handle", "doc": "&quot;Handle an incoming request.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/RevalidateBackHistory.html", "name": "App\\Http\\Middleware\\RevalidateBackHistory", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Http\\Middleware\\RevalidateBackHistory", "fromLink": "App/Http/Middleware/RevalidateBackHistory.html", "link": "App/Http/Middleware/RevalidateBackHistory.html#method_handle", "name": "App\\Http\\Middleware\\RevalidateBackHistory::handle", "doc": "&quot;Handle an incoming request.&quot;"},
            
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/TrimStrings.html", "name": "App\\Http\\Middleware\\TrimStrings", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App\\Http\\Middleware", "fromLink": "App/Http/Middleware.html", "link": "App/Http/Middleware/VerifyCsrfToken.html", "name": "App\\Http\\Middleware\\VerifyCsrfToken", "doc": "&quot;&quot;"},
                    
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/Patient.html", "name": "App\\Patient", "doc": "&quot;Klasa odpowiedzialna za pacjenta.&quot;"},
                                                        {"type": "Method", "fromName": "App\\Patient", "fromLink": "App/Patient.html", "link": "App/Patient.html#method_addNewUser", "name": "App\\Patient::addNewUser", "doc": "&quot;Funkcja dodaje nowego pacjenta do bazy.&quot;"},
                    {"type": "Method", "fromName": "App\\Patient", "fromLink": "App/Patient.html", "link": "App/Patient.html#method_getErrors", "name": "App\\Patient::getErrors", "doc": "&quot;Funkcja zwraca b\u0142\u0119dy.&quot;"},
                    {"type": "Method", "fromName": "App\\Patient", "fromLink": "App/Patient.html", "link": "App/Patient.html#method_getData", "name": "App\\Patient::getData", "doc": "&quot;Funkcja zwraca wszystkie dane pacjenta.&quot;"},
                    {"type": "Method", "fromName": "App\\Patient", "fromLink": "App/Patient.html", "link": "App/Patient.html#method_changeData", "name": "App\\Patient::changeData", "doc": "&quot;Funkcja zmienia dane pacjenta.&quot;"},
                    {"type": "Method", "fromName": "App\\Patient", "fromLink": "App/Patient.html", "link": "App/Patient.html#method_getUserId", "name": "App\\Patient::getUserId", "doc": "&quot;????????Funkcja zwraca id u\u017cytkownika danego pacjenta .&quot;"},
            
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/AppServiceProvider.html", "name": "App\\Providers\\AppServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\AppServiceProvider", "fromLink": "App/Providers/AppServiceProvider.html", "link": "App/Providers/AppServiceProvider.html#method_boot", "name": "App\\Providers\\AppServiceProvider::boot", "doc": "&quot;Bootstrap any application services.&quot;"},
                    {"type": "Method", "fromName": "App\\Providers\\AppServiceProvider", "fromLink": "App/Providers/AppServiceProvider.html", "link": "App/Providers/AppServiceProvider.html#method_register", "name": "App\\Providers\\AppServiceProvider::register", "doc": "&quot;Register any application services.&quot;"},
            
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/AuthServiceProvider.html", "name": "App\\Providers\\AuthServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\AuthServiceProvider", "fromLink": "App/Providers/AuthServiceProvider.html", "link": "App/Providers/AuthServiceProvider.html#method_boot", "name": "App\\Providers\\AuthServiceProvider::boot", "doc": "&quot;Register any authentication \/ authorization services.&quot;"},
            
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/BroadcastServiceProvider.html", "name": "App\\Providers\\BroadcastServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\BroadcastServiceProvider", "fromLink": "App/Providers/BroadcastServiceProvider.html", "link": "App/Providers/BroadcastServiceProvider.html#method_boot", "name": "App\\Providers\\BroadcastServiceProvider::boot", "doc": "&quot;Bootstrap any application services.&quot;"},
            
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/EventServiceProvider.html", "name": "App\\Providers\\EventServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\EventServiceProvider", "fromLink": "App/Providers/EventServiceProvider.html", "link": "App/Providers/EventServiceProvider.html#method_boot", "name": "App\\Providers\\EventServiceProvider::boot", "doc": "&quot;Register any events for your application.&quot;"},
            
            {"type": "Class", "fromName": "App\\Providers", "fromLink": "App/Providers.html", "link": "App/Providers/RouteServiceProvider.html", "name": "App\\Providers\\RouteServiceProvider", "doc": "&quot;&quot;"},
                                                        {"type": "Method", "fromName": "App\\Providers\\RouteServiceProvider", "fromLink": "App/Providers/RouteServiceProvider.html", "link": "App/Providers/RouteServiceProvider.html#method_boot", "name": "App\\Providers\\RouteServiceProvider::boot", "doc": "&quot;Define your route model bindings, pattern filters, etc.&quot;"},
                    {"type": "Method", "fromName": "App\\Providers\\RouteServiceProvider", "fromLink": "App/Providers/RouteServiceProvider.html", "link": "App/Providers/RouteServiceProvider.html#method_map", "name": "App\\Providers\\RouteServiceProvider::map", "doc": "&quot;Define the routes for the application.&quot;"},
                    {"type": "Method", "fromName": "App\\Providers\\RouteServiceProvider", "fromLink": "App/Providers/RouteServiceProvider.html", "link": "App/Providers/RouteServiceProvider.html#method_mapWebRoutes", "name": "App\\Providers\\RouteServiceProvider::mapWebRoutes", "doc": "&quot;Define the \&quot;web\&quot; routes for the application.&quot;"},
                    {"type": "Method", "fromName": "App\\Providers\\RouteServiceProvider", "fromLink": "App/Providers/RouteServiceProvider.html", "link": "App/Providers/RouteServiceProvider.html#method_mapApiRoutes", "name": "App\\Providers\\RouteServiceProvider::mapApiRoutes", "doc": "&quot;Define the \&quot;api\&quot; routes for the application.&quot;"},
            
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/User.html", "name": "App\\User", "doc": "&quot;Klasa odpowiedzialna za u\u017cytkownika.&quot;"},
                                                        {"type": "Method", "fromName": "App\\User", "fromLink": "App/User.html", "link": "App/User.html#method_addUser", "name": "App\\User::addUser", "doc": "&quot;Funkcja dodaje nowego u\u017cytkownika do bazy.&quot;"},
                    {"type": "Method", "fromName": "App\\User", "fromLink": "App/User.html", "link": "App/User.html#method_isAdmin", "name": "App\\User::isAdmin", "doc": "&quot;Funkcja sprawdza, czy u\u017cytkownik jest adminem.&quot;"},
                    {"type": "Method", "fromName": "App\\User", "fromLink": "App/User.html", "link": "App/User.html#method_isDoctor", "name": "App\\User::isDoctor", "doc": "&quot;Funkcja sprawdza, czy u\u017cytkownik jest lekarzem.&quot;"},
                    {"type": "Method", "fromName": "App\\User", "fromLink": "App/User.html", "link": "App/User.html#method_isActive", "name": "App\\User::isActive", "doc": "&quot;Funkcja sprawdza, czy u\u017cytkownik ma aktywny status.&quot;"},
                    {"type": "Method", "fromName": "App\\User", "fromLink": "App/User.html", "link": "App/User.html#method_deactivateUser", "name": "App\\User::deactivateUser", "doc": "&quot;Funkcja dezaktywuje u\u017cytkownika.&quot;"},
                    {"type": "Method", "fromName": "App\\User", "fromLink": "App/User.html", "link": "App/User.html#method_activateUser", "name": "App\\User::activateUser", "doc": "&quot;Funkcja aktywuje u\u017cytkownika.&quot;"},
                    {"type": "Method", "fromName": "App\\User", "fromLink": "App/User.html", "link": "App/User.html#method_getUsrType", "name": "App\\User::getUsrType", "doc": "&quot;Funkcja zwraca typ u\u017cytkownika.&quot;"},
                    {"type": "Method", "fromName": "App\\User", "fromLink": "App/User.html", "link": "App/User.html#method_login", "name": "App\\User::login", "doc": "&quot;Funkcja odpowiada za logowanie u\u017cytkownika.&quot;"},
                    {"type": "Method", "fromName": "App\\User", "fromLink": "App/User.html", "link": "App/User.html#method_getErrors", "name": "App\\User::getErrors", "doc": "&quot;Funkcja zwraca b\u0142\u0119dy.&quot;"},
                    {"type": "Method", "fromName": "App\\User", "fromLink": "App/User.html", "link": "App/User.html#method_changeData", "name": "App\\User::changeData", "doc": "&quot;Funkcja zmienia dane u\u017cytkownika.&quot;"},
                    {"type": "Method", "fromName": "App\\User", "fromLink": "App/User.html", "link": "App/User.html#method_changePassword", "name": "App\\User::changePassword", "doc": "&quot;Funkcja zmienia has\u0142o u\u017cytkownika.&quot;"},
            
            {"type": "Class", "fromName": "App", "fromLink": "App.html", "link": "App/Visit.html", "name": "App\\Visit", "doc": "&quot;Klasa odpowiedzialna za wizyty.&quot;"},
                                                        {"type": "Method", "fromName": "App\\Visit", "fromLink": "App/Visit.html", "link": "App/Visit.html#method_addVisit", "name": "App\\Visit::addVisit", "doc": "&quot;Funkcja dodaje now\u0105 wizyt\u0119 do bazy.&quot;"},
                    {"type": "Method", "fromName": "App\\Visit", "fromLink": "App/Visit.html", "link": "App/Visit.html#method_getErrors", "name": "App\\Visit::getErrors", "doc": "&quot;&quot;"},
                    {"type": "Method", "fromName": "App\\Visit", "fromLink": "App/Visit.html", "link": "App/Visit.html#method_getTodaysVisits", "name": "App\\Visit::getTodaysVisits", "doc": "&quot;Funkcja zwraca wizyty danego pacjenta z dzisiejszego dnia.&quot;"},
                    {"type": "Method", "fromName": "App\\Visit", "fromLink": "App/Visit.html", "link": "App/Visit.html#method_getPastVisits", "name": "App\\Visit::getPastVisits", "doc": "&quot;Funkcja zwraca wizyty danego pacjenta z przesz\u0142o\u015bci.&quot;"},
                    {"type": "Method", "fromName": "App\\Visit", "fromLink": "App/Visit.html", "link": "App/Visit.html#method_getFutureVisits", "name": "App\\Visit::getFutureVisits", "doc": "&quot;Funkcja zwraca przysz\u0142e wizyty danego pacjenta.&quot;"},
                    {"type": "Method", "fromName": "App\\Visit", "fromLink": "App/Visit.html", "link": "App/Visit.html#method_findAllPatientData", "name": "App\\Visit::findAllPatientData", "doc": "&quot;Funkcja znajduje wszystkie informacje o pacjencie: dane i wizyty.&quot;"},
                    {"type": "Method", "fromName": "App\\Visit", "fromLink": "App/Visit.html", "link": "App/Visit.html#method_getAllVisits", "name": "App\\Visit::getAllVisits", "doc": "&quot;Funkcja znajduje wszystkie wizyty.&quot;"},
                    {"type": "Method", "fromName": "App\\Visit", "fromLink": "App/Visit.html", "link": "App/Visit.html#method_findAllDoctorData", "name": "App\\Visit::findAllDoctorData", "doc": "&quot;Funkcja znajduje wszystkie informacje o lekarzu: dane i wizyty.&quot;"},
            
            
                                        // Fix trailing commas in the index
        {}
    ];

    /** Tokenizes strings by namespaces and functions */
    function tokenizer(term) {
        if (!term) {
            return [];
        }

        var tokens = [term];
        var meth = term.indexOf('::');

        // Split tokens into methods if "::" is found.
        if (meth > -1) {
            tokens.push(term.substr(meth + 2));
            term = term.substr(0, meth - 2);
        }

        // Split by namespace or fake namespace.
        if (term.indexOf('\\') > -1) {
            tokens = tokens.concat(term.split('\\'));
        } else if (term.indexOf('_') > 0) {
            tokens = tokens.concat(term.split('_'));
        }

        // Merge in splitting the string by case and return
        tokens = tokens.concat(term.match(/(([A-Z]?[^A-Z]*)|([a-z]?[^a-z]*))/g).slice(0,-1));

        return tokens;
    };

    root.Sami = {
        /**
         * Cleans the provided term. If no term is provided, then one is
         * grabbed from the query string "search" parameter.
         */
        cleanSearchTerm: function(term) {
            // Grab from the query string
            if (typeof term === 'undefined') {
                var name = 'search';
                var regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
                var results = regex.exec(location.search);
                if (results === null) {
                    return null;
                }
                term = decodeURIComponent(results[1].replace(/\+/g, " "));
            }

            return term.replace(/<(?:.|\n)*?>/gm, '');
        },

        /** Searches through the index for a given term */
        search: function(term) {
            // Create a new search index if needed
            if (!bhIndex) {
                bhIndex = new Bloodhound({
                    limit: 500,
                    local: searchIndex,
                    datumTokenizer: function (d) {
                        return tokenizer(d.name);
                    },
                    queryTokenizer: Bloodhound.tokenizers.whitespace
                });
                bhIndex.initialize();
            }

            results = [];
            bhIndex.get(term, function(matches) {
                results = matches;
            });

            if (!rootPath) {
                return results;
            }

            // Fix the element links based on the current page depth.
            return $.map(results, function(ele) {
                if (ele.link.indexOf('..') > -1) {
                    return ele;
                }
                ele.link = rootPath + ele.link;
                if (ele.fromLink) {
                    ele.fromLink = rootPath + ele.fromLink;
                }
                return ele;
            });
        },

        /** Get a search class for a specific type */
        getSearchClass: function(type) {
            return searchTypeClasses[type] || searchTypeClasses['_'];
        },

        /** Add the left-nav tree to the site */
        injectApiTree: function(ele) {
            ele.html(treeHtml);
        }
    };

    $(function() {
        // Modify the HTML to work correctly based on the current depth
        rootPath = $('body').attr('data-root-path');
        treeHtml = treeHtml.replace(/href="/g, 'href="' + rootPath);
        Sami.injectApiTree($('#api-tree'));
    });

    return root.Sami;
})(window);

$(function() {

    // Enable the version switcher
    $('#version-switcher').change(function() {
        window.location = $(this).val()
    });

    
        // Toggle left-nav divs on click
        $('#api-tree .hd span').click(function() {
            $(this).parent().parent().toggleClass('opened');
        });

        // Expand the parent namespaces of the current page.
        var expected = $('body').attr('data-name');

        if (expected) {
            // Open the currently selected node and its parents.
            var container = $('#api-tree');
            var node = $('#api-tree li[data-name="' + expected + '"]');
            // Node might not be found when simulating namespaces
            if (node.length > 0) {
                node.addClass('active').addClass('opened');
                node.parents('li').addClass('opened');
                var scrollPos = node.offset().top - container.offset().top + container.scrollTop();
                // Position the item nearer to the top of the screen.
                scrollPos -= 200;
                container.scrollTop(scrollPos);
            }
        }

    
    
        var form = $('#search-form .typeahead');
        form.typeahead({
            hint: true,
            highlight: true,
            minLength: 1
        }, {
            name: 'search',
            displayKey: 'name',
            source: function (q, cb) {
                cb(Sami.search(q));
            }
        });

        // The selection is direct-linked when the user selects a suggestion.
        form.on('typeahead:selected', function(e, suggestion) {
            window.location = suggestion.link;
        });

        // The form is submitted when the user hits enter.
        form.keypress(function (e) {
            if (e.which == 13) {
                $('#search-form').submit();
                return true;
            }
        });

    
});


