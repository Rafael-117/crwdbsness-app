<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Sectors;
use App\Custom\infoClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException; 
use App\Models\Companies;


class CompaniesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $id= Auth::user()->id; 

            $companies= DB::table('companies')
            ->join('sectors', 'companies.sector', '=', 'sectors.id')
            ->select('companies.id', 'companies.nombre','companies.rfc','companies.status','companies.encargado','companies.logo_url','sectors.sector',)
            ->where('companies.status', '=', 'Activa')
            ->where('companies.user_id', '=', $id)
            ->get();

            $info = new InfoClass;
            $info->title = "Empresas";
            $info->description = "¡Hola ". Auth::user()->name ." ! Esta sección está dedicada exclusivamente a tus compañías. Aquí encontrarás información detallada sobre todas las empresas que administras. Utiliza las siguientes opciones para acceder y gestionar cada una de ellas.";
            $info->buton = true;
            $info->action = route('crear.empresa');
            $info->btn_text = ' Crear nueva';
            json_encode($info);

        return view('dashboard.companies.empresas', ['companies'=> $companies, 'info'=>$info]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $options = Sectors::all();
       
         $info = new InfoClass;
            $info->title = "Crea tu nueva empresa";
            $info->description = "Rellena todos los campos para crear tu nueva empresa";
            $info->buton = false;
            json_encode($info);
        return view('dashboard.companies.crear-empresa', ['info'=>$info, 'options'=>$options, 'formRoute'=>'guardar.empresa']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

            try {
                $validator = Validator::make($request->all(), [
                'nombre' => 'required|string|max:255',
                'razon' => 'required|string|max:255',
                'rfc' => 'required|string|max:13',
                'encargado' => 'required|string|max:255',
                'web' => 'required|string|max:255',
                'sector' => 'required|string|max:255',
                'calle' => 'required|string|max:255',
                'numero' => 'required|string|max:255',
                'colonia' => 'required|string|max:255',
                'ciudad' => 'required|string|max:255',
                'estado' => 'required|string|max:255',
                'pais' => 'required|string|max:250',
                ]);

                if ($validator->fails()) {
                    return redirect('crear-empresa')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('msg-error', 'Revisa todos tus datos, se encontró un error al procesarlos');
                }

                $id = Auth::id();
                if ($request->hasfile('picture')) {
                    $imagen = $request->file('picture');
                    $nombreimagen = Str::slug($id . '_') . time() . '.' . $imagen->getClientOriginalExtension();
                    $nuevaruta = public_path("img/companies/" . $id . "/");
                    if (!file_exists($nuevaruta)) {
                        mkdir($nuevaruta, 0777, true);
                    }
                    $url = "img/companies/" . $id . "/" . $nombreimagen;
                    $imagen->move($nuevaruta, $nombreimagen);
                }

                $companyData = [
                    'user_id' => $id,
                    'nombre' => $request->nombre,
                    'razon' => $request->razon,
                    'rfc' => $request->rfc,
                    'descripcion' => $request->descripcion,
                    'encargado' => $request->encargado,
                    'web' => $request->web,
                    'sector' => $request->sector,
                    'calle' => $request->calle,
                    'numero' => $request->numero,
                    'colonia' => $request->colonia,
                    'ciudad' => $request->ciudad,
                    'estado' => $request->estado,
                    'pais' => $request->pais,
                    'logo_url' => $request->hasfile('picture') ? '/' . $url : 'dashboard/assets/img/company.jpg',
                    'status' => 'Activa',
                ];

                DB::table('companies')->insert($companyData);
                return redirect('/empresas')->with('success', 'Registro actualizado correctamente');

            
            } catch (QueryException $e) {
                        return redirect('empresa/'.$id)
                            ->with('msg-error', 'Error en la consulta: ' . $e->getMessage())
                            ->withInput();
                    } catch (\Exception $e) {
                        return redirect('empresa/'.$id)
                            ->with('msg-error', 'Error en el proceso: ' . $e->getMessage())
                            ->withInput();
                    }
    }


    public function show(String $id)
    {
            $options = Sectors::all();
            $company = Companies::find($id);

            if (!$company) {
                return redirect('/empresas')->with('msg-error', 'Empresa inexistente');
            }
            if ($company->status == 'Eliminada') {
                return redirect('/empresas')->with('msg-error', 'Esta empresa no se puede editar por que ha sido eliminado anteriormente');
            }
            if ($company->user_id !== Auth::id()) {
                return redirect('/empresas')->with('msg-error', 'La empresa que desea editar no pertenece al usuario actual');
            }

            $info = new InfoClass;
            $info->title = "Editar la informacion de ".$company->nombre;
            $info->description = "Actualiza la información de tu empresa";
            $info->buton = false;
            json_encode($info);

            return view('dashboard.companies.crear-empresa',
            ['company'=>$company,
            'info'=>$info,
            'options'=>$options,
            'formRoute'=>'actualizar.empresa',
            'method'=>'PATCH'
        ]);
    }

    public function edit(Companies $companies)
    {
        
    }

    public function update(Request $request, String $id)
    {
   
        $user_id = Auth::id();
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:255',
            'razon' => 'required|string|max:255',
            'rfc' => 'required|string|max:13',
            'encargado' => 'required|string|max:255',
            'web' => 'required|string|max:255',
            'sector' => 'required|string|max:255',
            'calle' => 'required|string|max:255',
            'numero' => 'required|string|max:255',
            'colonia' => 'required|string|max:255',
            'ciudad' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
            'pais' => 'required|string|max:250',
        ]);
    
        if ($validator->fails()) {
            return redirect('empresa/'.$id)
                ->withErrors($validator)
                ->withInput()
                ->with('msg-error', 'Revisa todos tus datos, se encontró un error al procesarlos');
        }
    
        try {

            $url = null;
                if ($request->hasfile('picture')) {
                    $imagen = $request->file('picture');
                    $nombreimagen = Str::slug($user_id. '_') . time() . '.' . $imagen->getClientOriginalExtension();
                    $nuevaruta = public_path("img/companies/" . $user_id . "/");
                    if (!file_exists($nuevaruta)) {
                        mkdir($nuevaruta, 0777, true);
                    }
                    $url = "img/companies/" . $user_id. "/" . $nombreimagen;
                    $imagen->move($nuevaruta, $nombreimagen);
                }

            $companyData = [
                'nombre' => $request->nombre,
                'razon' => $request->razon,
                'rfc' => $request->rfc,
                'descripcion' => $request->descripcion,
                'encargado' => $request->encargado,
                'web' => $request->web,
                'sector' => $request->sector,
                'calle' => $request->calle,
                'numero' => $request->numero,
                'colonia' => $request->colonia,
                'ciudad' => $request->ciudad,
                'estado' => $request->estado,
                'pais' => $request->pais,
            ];
    
            if ($url !== null) {
                $companyData['logo_url'] = '/' . $url;
            }
    
            Companies::where('id', $id)->update($companyData);
    
            $redurl = 'empresas';
    
            return redirect($redurl)->with('success', 'Registro actualizado correctamente');
    
        } catch (QueryException $e) {
            return redirect('empresas')
                ->with('msg-error', 'Error en la consulta: ' . $e->getMessage())
                ->withInput();
        } catch (\Exception $e) {
            return redirect('empresas')
                ->with('msg-error', 'Error en el proceso: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function destroy(String $id)
    {
        DB::table('companies')->where('id', $id)->update(['status' => 'Eliminada']);
        return redirect('/empresas')->with('success', 'Registro eliminado correctamente');  
    }
}
