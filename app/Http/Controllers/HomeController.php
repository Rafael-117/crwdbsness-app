<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Projects;
use App\Models\Companies;
use App\Models\Sectors;
use App\Models\Transactions;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Projects::all()
        ->where('status', '=', 'Activo');
        
       return view('welcome', ['projects' => $projects ]);
    }

    public function proyect( String $id)
    {

        $project = Projects::where('id', $id)->get()->first();

        $company = Companies::where('id', $project->companie_id)->get()->first();
        $sector = Sectors::where('id', $company->sector)->get()->first();
       
       return view('proyecto', [
        'project' => $project,
        'company' => $company,
        'sector' => $sector,
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $project = Projects::where('id', $request->project_id)->get()->first();

        $precio= ($project->meta / $project->acciones);
        $monto= ($project->meta / $project->acciones)* $request->num_acciones;
        $comision = ($monto*0.1);
        $impuestos = ($comision*0.16);
        $total = ($monto+ $comision + $impuestos);


        $transaction = new Transactions;
        $transaction->project_id=$request->project_id;
        $transaction->user_id=Auth::id();
        $transaction->num_acciones = $request->num_acciones;    
        $transaction->precio_acccion=$precio;
        $transaction->monto= $monto;
        $transaction->comision= $comision;
        $transaction->impuestos= $impuestos;
        $transaction->total=$total;
        $transaction->tipo="Compra";
        $transaction->status="Pendiente";
        $transaction->save();

        return $transaction->id;

       
    }


    public function mail(string $id)
    {
       
    $transactions = Transactions::where('id', $id)->get()->first();
    $project = Projects::where('id', $transactions->project_id)->get()->first();

    return view('mail', [
        'project' => $project,
        'transaction' => $transactions,
    ]);
    }


    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
