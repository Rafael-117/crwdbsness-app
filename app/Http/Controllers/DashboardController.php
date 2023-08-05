<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Custom\infoClass;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException; 
use Illuminate\Support\Facades\Validator;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function home()
    {
        $info = new InfoClass;
        $info->title = "Panel de administración";
        $info->description = "¡Bienvenido/a al Panel de Inicio! Aquí es donde comienza tu experiencia con nuestra plataforma. Te proporcionamos acceso rápido y sencillo a las herramientas y funciones más importantes. ";
        $info->buton = false;
        json_encode($info);

        return view('dashboard.home', ['info'=>$info]);
    }
}
