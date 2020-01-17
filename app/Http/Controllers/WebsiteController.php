<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

/**
* Kontroler głównego panelu.
*/

class WebsiteController extends Controller
{
	/**
	*Funkcja odpowiada za wyświetlenie odpowiedniego panelu.
	*@return view Widok odpowiedniego panelu głównego w zależności od rodzaju użytkownika
	*/
    public function mainSite()
    {
        $id = Auth::id();
        if ($id){
            $user = User::where('id',$id)->first();
            $typ = $user->user_type;
            if ($typ=='doctor'){
                return View('lekarz-panel/panel-lekarza');
            }else if($typ=='reception'){
                return View('recepcja-panel/recepcja');
            }
        }

        return View('home');
    }

	/**
	*Funkcja odpowiada za wyświetlenie klauzuli rodo.
	*@return view Widok klauzuli RODO
	*/
    public function rodo()
    {
        return View('rodo');
    }

	/**
	*Funkcja odpowiada za wyświetlenie listy poradni.
	*@return view Widok listy poradni
	*/
    public function clinicList()
    {
        return View('poradnie');
    }
}
