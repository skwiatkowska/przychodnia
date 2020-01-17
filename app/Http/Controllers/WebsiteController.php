<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;


class WebsiteController extends Controller
{
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

    public function rodo()
    {
        return View('rodo');
    }

    public function clinicList()
    {
        return View('poradnie');
    }
}
