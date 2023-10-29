<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Projects;
use App\Custom\infoClass;
use Illuminate\Support\Str;
use App\Models\Transactions;
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

    $transactions = Transactions::where('user_id', Auth::user()->id)
    ->where('status', 'Pendiente')
    ->with('project') 
    ->get();

    $proyectos = Transactions::where('user_id', Auth::user()->id)
    ->where('status', 'Aprobado')
    ->with('project') 
    ->get();

        return view('dashboard.home', ['info'=>$info, 'transactions'=>$transactions , 'proyectos'=>$proyectos]);
    }

    public function calendar()
    {
        $info = new InfoClass;
        $info->title = "Detalles de tus Inversiones";
        $info->description = "En esta sección, encontrarás una descripción detallada de tus inversiones financieras. Así como también información esencial que te permite realizar un seguimiento preciso de tus activos financieros.";
        $info->buton = false;
        json_encode($info);

        return view('dashboard.calendar', ['info'=>$info]);
    }
   
}
