<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ServivceController extends Controller
{
    //
/*
    public function __construct()
    {
        $this->middleware('auth')->only(['administration', 'finance']);
    }
*/
    public function accueil(){
        $this->middleware('auth');

        return view('home');

    }
    public function welcome(){
        return view('welcome');

    }
    public function controle($sercice, $page){
        $user=new User();
        $response = Gate::inspect($sercice, $user);
        if ($response->allowed()) {
            // The action is authorized...
            return view($page);

        } else {
            /*
            return view('welcome')
                ->with('warning',"vous avez pas le droit d'acceder à cette page");
            */
            return redirect()->action('HomeController@index')
                ->with('warning',"Vous n'avez pas le droit d'acceder à cette page / ليس لديك الحق في الوصول إلى هذه الصفحة");

        }
    }
    public function administration(){
        return $this
            ->controle('gestion-administration','services.administration');
    }
    public function admingeneral(){
        return $this->controle('gestion-admingeneral','services.admingeneral');

    }
    public function finance(){

        return $this->controle('gestion-finance','services.finance');


    }
    public function secretariat(){

        return $this->controle('gestion-secretariat','services.secretariat');

    }
}
