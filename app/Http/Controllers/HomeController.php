<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Models\Projects;
use App\Models\Companies;
use App\Models\Sectors;
use App\Models\Transactions;
use Illuminate\Support\Facades\Auth;
use App\Mail\enviarCorreo;
use App\Mail\NotificacionCompraCliente;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $projects = Projects::where('status', 'Activo')->with('companies') ->get();

        // $projects = Projects::all()
        // ->where('status', '=', 'Activo')
        // ->where('estado', '=', 'Publicado');
        // return $projects;

        $projects = Projects::all();
        foreach ($projects as $project) {
            $company = $project->companies;
        }

        return view('welcome', ['projects' => $projects ]);
    }

    public function proyect( String $id)
    {

        $project = Projects::where('id', $id)->get()->first();

        $company = Companies::where('id', $project->companie_id)->with('sector') ->get()->first();
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
        $comision = ($monto* ($project->impuestos/100));
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
        $user = Auth::user();
        $transactions = Transactions::where('id', $id)->get()->first();
        $project = Projects::where('id', $transactions->project_id)->get()->first();
        $correo = new NotificacionCompraCliente($id);
        Mail::to($user->email)->send($correo);
        return view('mail', [
            'project' => $project,
            'transaction' => $transactions,
        ]);
    }



    public function sendMail(Request $request){
        $this->validate($request, [
            'mensaje' => 'required|string',
            'mail' => 'required|email',
        ]);
    
        // Preparar los datos para el correo
        $data = [
            'mensaje' => $request->mensaje
        ];
    
        // Crear una instancia del Mailable
        $correo = new enviarCorreo($data); // Asegúrate de usar el nombre correcto de tu Mailable
    
        // Enviar el correo
        Mail::to($request->mail)->send($correo);
    
        return 'Correo enviado correctamente';
    }



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
