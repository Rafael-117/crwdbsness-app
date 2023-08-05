<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Custom\infoClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException; 

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
    }

    public function perfil()
    {
       $id=Auth::user()->id;
            $user = DB::table('users')
            ->where('id', '=', $id)
            ->get()->first();
            $info = new InfoClass;
            $info->title = "Perfil";
            $info->description = "Edita la informacion de tu perfil, asegurate que toda tu informacion sea correcta";
            $info->buton = false;
            json_encode($info);

        return view('dashboard.perfil', ['user'=> $user, 'info'=>$info]);
    }

    public function editar(Request $request)
    {
        $id=Auth::user()->id;
            $validator = Validator::make($request->all(), [
                'rfc' =>'required|string|max:13',
                'telefono' => 'required|string|max:13',
                'calle' => 'required|string|max:255',
                'numero' =>'required|string|max:255',
                'colonia' =>'required|string|max:255',
                'ciudad' =>'required|string|max:255',
                'estado' => 'required|string|max:255',
                'pais' => 'required|string|max:50',
                'name' =>'required|string|max:255',
                'paternal' => 'required|string|max:255',
                'maternal' => 'required|string|max:255',
            ]);
            if ($validator->fails()) {
                return redirect('perfil')
                ->withErrors($validator)
                ->withInput()
                ->with('msg-error', 'Revisa todos tus datos, se encontró un error al procesarlos'); 
            }
            try {
            $url = 'dashboard/assets/img/avatar.jpg';
            $type = $request->rfc != null ? 'Inversionista' : 'Usuario';
            if ($request->hasfile('picture')) {
                $imagen = $request->file('picture');
                $nombreimagen = Str::slug($id . '_') . time() . '.' . $imagen->getClientOriginalExtension();
                $nuevaruta = public_path("img/users/" . $id . "/");
                if (!file_exists($nuevaruta)) {
                    mkdir($nuevaruta, 0777, true);
                }
                $url = "img/users/" . $id . "/" . $nombreimagen;
                $imagen->move($nuevaruta, $nombreimagen);
            }
            $userData = [
                'name' => $request->name,
                'paternal' => $request->paternal,
                'maternal' => $request->maternal,
                'type' => $type,
                'rfc' => $request->rfc,
                'telefono' => $request->telefono,
                'calle' => $request->calle,
                'numero' => $request->numero,
                'colonia' => $request->colonia,
                'ciudad' => $request->ciudad,
                'estado' => $request->estado,
                'pais' => $request->pais,
            ];
            if ($request->hasfile('picture')) {
                $userData['picture'] = '/' . $url;
            }
            DB::table('users')->where('id', $id)->update($userData);
            return redirect('/perfil')->with('success', 'Registro actualizado correctamente');  
        } catch (QueryException $e) {
            return redirect('/perfil')
                ->with('msg-error', 'Error en la consulta: ' . $e->getMessage())
                ->withInput();
        } catch (\Exception $e) {
            return redirect('/perfil')
                ->with('msg-error', 'Error en el proceso: ' . $e->getMessage())
                ->withInput();
        }
     
    }
}
