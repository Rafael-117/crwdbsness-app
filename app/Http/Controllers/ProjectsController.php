<?php

namespace App\Http\Controllers;

use App\Models\Projects;
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

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::user()->id;
        $projects = Projects::all()
            ->where('status', '=', 'Activo')
            ->where('companie_id', '=', $id);
            
        $info = new InfoClass();
        $info->title = 'Proyectos';
        $info->description = '¡Hola ' . Auth::user()->name . ' !, bienvenido/a al panel de Proyectos! Aquí es donde podrás mantener un seguimiento claro y efectivo de todas las iniciativas y proyectos en los que estás involucrado/a';
        $info->buton = true;
        $info->action = route('crear.proyecto');
        $info->btn_text= ' Crear Nuevo';

        json_encode($info);
        
       
        return view('dashboard.projects.proyectos', ['info' => $info, 'projects' => $projects]);
    }

    public function create()
    {
        $companies = DB::table('companies')
            ->where('companies.status', '=', 'Activa')
            ->where('companies.user_id', '=', Auth::user()->id)
            ->get();

        $info = new InfoClass();
        $info->title = 'Crea tu nuevo proyecto';
        $info->description = 'Inicia nuevos proyectos desde cero. Completa la información relevante para comenzar con una nueva iniciativa.';
        $info->buton = false;
        json_encode($info);

        if ($companies->count() > 0) {
            return view('dashboard.projects.crear-proyecto', ['info' => $info, 'companies' => $companies, 'formRoute' => 'guardar.proyecto']);
        } else {
            return redirect('proyectos')->with('msg-error',
                '<div class="text-justify">
                h3>No se puede crear un nuevo proyecto</h3> <br>
                <p class="text-justify">

                Lo sentimos, pero no puedes crear un nuevo proyecto en este momento. Primero debes crear una empresa para poder iniciar un proyecto.
                Para crear una empresa y comenzar a desarrollar tu proyecto, sigue los siguientes pasos:
                </p>
                <ul>
                <li><p class="text-justify">1.Dirígete a la sección "Empresas" en el menú principal.</p></li>
                <li><p class="text-justify">2.Haz clic en el botón "Crear Empresa".</p></li>
                <li><p class="text-justify">3.Completa todos los campos requeridos, proporcionando la información necesaria para la creación de la empresa.</p></li>
                <li><p class="text-justify">4.Asegúrate de verificar toda la información antes de enviar la solicitud.</p></li>
                </ul>
                <p class="text-justify">
                Una vez creada la empresa, podrás acceder a la opción "Nuevo Proyecto" y dar vida a tu idea.
                Si tienes alguna pregunta o necesitas ayuda durante el proceso, no dudes en contactarnos. Estamos aquí para asistirte en todo lo que necesites.<hr>
                ¡Gracias por tu comprensión y esperamos ver pronto tu proyecto en acción!
                </p>
                </div>',
            );
        }
    }

   
    public function uploadImage($imagen, $id, $subfolder)
    {
        $nombreimagen = Str::slug($id . '_'.$imagen->getClientOriginalName()).'.'.$imagen->getClientOriginalExtension();
        $nuevaruta = public_path("img/companies/{$id}/{$subfolder}/");
        if (!file_exists($nuevaruta)) {
            mkdir($nuevaruta, 0777, true);
        }
        $url = "img/companies/{$id}/{$subfolder}/" . $nombreimagen;
        $imagen->move($nuevaruta, $nombreimagen);
        return '/'.$url;
    }


    public function store(Request $request)
    {
          try {

            $validator = Validator::make($request->all(), [
            'companie_id' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'valor_inicial' => 'required|string|max:255',
            'meta' => 'required|string|max:255',
            'ubicacion'=> 'required|string|max:255',
            'rendimiento' => 'required|string|max:255',
            'pago' => 'required|string|max:255',
            'periodo_pago' => 'required|string|max:255',
            ]);


            if ($validator->fails()) {
                return redirect('crear-proyecto')
                    ->withErrors($validator)
                    ->withInput()
                    ->with('msg-error', 'Revisa todos tus datos, se encontró un error al procesarlos');
            }

            $id = Auth::id();

            $logoUrl = null;
            $portadaUrl = null;
            $campaniaUrl = [];
            $valuacionUrl = [];

            if ($request->hasfile('picture')) {
                $imageUrl = $this->uploadImage($request->file('picture'), $id, 'proyects');
                $logoUrl = $imageUrl;
            }
        
            if ($request->hasfile('portada')) {
                $imageUrl = $this->uploadImage($request->file('portada'), $id, 'proyects');
                $portadaUrl = $imageUrl;
            }
        
            if ($request->hasfile('camp')) {
                $camps = $request->file('camp');
                foreach ($camps as $camp) {
                    $imageUrl = $this->uploadImage($camp, $id, 'camp');
                    $campaniaUrl[] = $imageUrl;
                }
            }
        
            if ($request->hasfile('valuacion')) {
                $valuaciones = $request->file('valuacion');
                foreach ($valuaciones as $valuacion) {
                    $imageUrl = $this->uploadImage($valuacion, $id, 'val');
                    $valuacionUrl[] = $imageUrl;
                }
            }
    
            $data = array(
                "pymesrr"=>'<h1 data-placeholder="Introduce tu título">PyMES</h1><figure class="table ck-widget ck-widget_with-selection-handle" contenteditable="false" data-placeholder="Introduce o pega tu contenido aquí" style="width:100%;"><div class="ck ck-widget__selection-handle"><svg class="ck ck-icon ck-reset_all-excluded ck-icon_inherit-color" viewBox="0 0 16 16"><path d="M4 0v1H1v3H0V.5A.5.5 0 0 1 .5 0H4zm8 0h3.5a.5.5 0 0 1 .5.5V4h-1V1h-3V0zM4 16H.5a.5.5 0 0 1-.5-.5V12h1v3h3v1zm8 0v-1h3v-3h1v3.5a.5.5 0 0 1-.5.5H12z"></path><path fill-opacity=".256" d="M1 1h14v14H1z"></path><g class="ck-icon__selected-indicator"><path d="M7 0h2v1H7V0zM0 7h1v2H0V7zm15 0h1v2h-1V7zm-8 8h2v1H7v-1z"></path><path fill-opacity=".254" d="M1 1h14v14H1z"></path></g></svg></div><table class="ck-table-resized"><colgroup><col style="width:54.92%;"><col style="width:45.08%;"></colgroup><tbody><tr><td class="ck-editor__editable ck-editor__nested-editable" role="textbox" contenteditable="true"><span class="ck-table-bogus-paragraph">Corresponde a todos aquellos proyectos que ya se encuentren en operación, que tengan una valuación definida y busquen un monto de inversión de entre los 5 millones de pesos hasta los 44 millones de pesos.</span><div class="ck-table-column-resizer"></div></td><td class="ck-editor__editable ck-editor__nested-editable" role="textbox" contenteditable="true"><p>VALUACIÓN POST-INVERSIÓN</p><h4>$91,960,000 <strong>MXN</strong></h4><div class="ck-table-column-resizer"></div></td></tr></tbody></table><div class="ck ck-reset_all ck-widget__type-around"><div class="ck ck-widget__type-around__button ck-widget__type-around__button_before" title="Insertar párrafo antes del bloque" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 8"><path d="M9.055.263v3.972h-6.77M1 4.216l2-2.038m-2 2 2 2.038"></path></svg></div><div class="ck ck-widget__type-around__button ck-widget__type-around__button_after" title="Insertar párrafo después del bloque" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 10 8"><path d="M9.055.263v3.972h-6.77M1 4.216l2-2.038m-2 2 2 2.038"></path></svg></div><div class="ck ck-widget__type-around__fake-caret"></div></div></figure>',
                "caracteristicas"=>'<h1 data-placeholder="Introduce tu título">CARACTERÍSTICAS DE LAS ACCIONES EMITIDAS POR EL FINANCIAMIENTO COLECTIVO</h1><p data-placeholder="Introduce o pega tu contenido aquí"><span style="background-color:rgb(255,255,255);color:rgb(150,150,150);">La presente acción fue emitida por asamblea extraordinaria de accionistas de fecha 19 de Julio del 2022 de la persona moral denominada PROMOCASH CENTENARIO, S.A.P.I. DE C.V., SOFOM, E.N.R, misma que fue constituida mediante escritura número 51192 - CINCUENTA Y UN MIL CIENTO NOVENTA Y DOS -, de fecha , otorgada ante la fe del Notario Público No. 23, de la ciudad Estado de México, Lic. FLOR ALEJANDRA KIWAN ALTAMIRANO, e inscrita en el Registro Público de la Propiedad y de Comercio de la ciudad Ciudad Nezahualcóyotl, Estado de México.</span></p>',
                "beneficios"=>'<h1 data-placeholder="Introduce tu título">BENEFICIOS</h1><ul data-placeholder="Introduce o pega tu contenido aquí"><li>Recibes tu acción digital firmada por el representante legal del proyecto con la firma electrónica certificada por el SAT, con cinco mecanismos de seguridad y verificación que la hacen la más segura del mercado.</li><li>Tu nombre es inscrito en la representación digital del libro de accionistas de la persona moral de la que invertiste.</li><li>Recibes los reportes de actividades y Financieros según los establece los artículos 172 y 173 de la Ley General de Sociedades Mercantiles.</li><li>Derechos Económicos Plenos</li><li>Confiere derecho a un dividendo preferente</li></ul>',
                "restricciones"=>'<h1 data-placeholder="Introduce tu título">RESTRICCIONES</h1><p data-placeholder="Introduce o pega tu contenido aquí">Las 20337 acciones de la Serie "BCrowdfunding2", clase "II.BCrowdfunding2" del capital social variable de PROMOCASH CENTENARIO, S.A.P.I. DE C.V., SOFOM, E.N.R tienen las siguientes restricciones:</p><ul><li>No confieren derecho a Voto</li><li>Se niega el derecho de suscripción preferente al que se refiere el artículo 132 de la Ley General de Sociedades Mercantiles</li><li>Únicamente tendrán derechos sociales, con las limitaciones aquí mencionadas, respecto a la clase que corresponda.</li><li>No confiere el derecho a veto</li></ul><p style="text-align:justify;">Condiciones especiales de la Acción</p><p style="text-align:justify;"><span style="color:rgb(33,37,41);">·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>Confiere pago de dividendos preferentes en el caso de que existan</p><p style="text-align:justify;"><span style="color:rgb(33,37,41);">·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>De forma permanente, mientras la acción no sea nuevamente adquirida por parte de "PROMOCASH CENTENARIO S.A.P.I. DE C.V., SOFOM, E.N.R", el pago de rendimientos se realizará de forma mensual por el concepto de anticipo de dividendos, rendimientos, bonos, comisiones o cualquiera que pudiese ser aplicable y deberá de ser en un rango de entre 18 y 26 por ciento del valor de inversión de la acción, al cierre del ejercicio anual se deberá revisar si existe un excedente por pagar en favor del accionista.</p><p style="text-align:justify;"><span style="color:rgb(33,37,41);">·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>EL SOCIO poseedor de una acción de la Serie BCrowdfunding, clase "II.BCrowdfunding2”&nbsp; tendrá el derecho de adherirse a una venta o cesión de acciones o derechos de "PROMOCASH CENTENARIO, S.A.P.I. DE C.V. SOFOM, E.N.R." siempre y cuando "PROMOCASH CENTENARIO, S.A.P.I. DE C.V. SOFOM, E.N.R." reciba una oferta (la “Oferta de Venta o Cesión”) de cualquier tercero a quien para efectos de la presente asamblea se le denominará el “Tercero Adquirente” para vender, ceder, enajenar, transmitir, intercambiar, afectar en cualquier forma o en fideicomiso o, en general, realizar cualquier otra operación similar que tenga como consecuencia última un cambio en la titularidad de la totalidad y no menos de la totalidad de las acciones de"PROMOCASH CENTENARIO, S.A.P.I. DE C.V. SOFOM, E.N.R.", conforme a los siguientes términos:</p><ul><li style="text-align:justify;"><span class="text-small">a)&nbsp;&nbsp;&nbsp; "PROMOCASH CENTENARIO, S.A.P.I. DE C.V. SOFOM, E.N.R." que reciba la Oferta de Cesión por un Tercero Adquirente, notificará a “EL SOCIO”, (i) haber recibido la Oferta de Venta o Cesión, copia de la cual se adjuntará a dicha notificación. (ii) su intención de vender o ceder la totalidad y no menos de la totalidad de las acciones&nbsp; de la persona moral bajo la presente asamblea y (iii) el precio y las condiciones de venta o cesión establecidas en la Oferta de venta o Cesión, incluyendo sin limitar, forma de pago, fecha estimada de cierre y cualesquiera otras características que razonablemente permitan a “EL SOCIO” evaluar de manera adecuada los términos de la Oferta de Cesión y el posible ejercicio de su derecho de adherirse a la venta o cesión de las acciones o derechos de "PROMOCASH CENTENARIO, S.A.P.I. DE C.V. SOFOM, E.N.R."</span></li><li style="text-align:justify;"><span class="text-small">b)&nbsp;&nbsp;&nbsp; &nbsp;Si “EL SOCIO” tiene la intención de ejercer este derecho tendrá un plazo de 15 (quince) días naturales, contados a partir de haber recibido la notificación correspondiente, para notificar a "PROMOCASH CENTENARIO, S.A.P.I. DE C.V. SOFOM, E.N.R." de su intención de ejercer su derecho de adherirse a la cesión y ceder la totalidad y no menos de la totalidad de las acciones de la persona moral “PROMOCASH CENTENARIO, S.A.P.I. DE C.V. SOFOM, E.N.R.”</span></li></ul><p style="text-align:justify;"><span style="color:rgb(33,37,41);">·&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span>Transcurrido el plazo mencionado sin que “EL SOCIO” hubiere notificado el ejercicio de su derecho de adherirse a la cesión se entenderá como la renuncia a tal derecho.</p>'
            );

           $capitalizacion =json_encode($data);

            $Project = new Projects;
            $Project->companie_id = $request->companie_id;
            $Project->nombre = $request->nombre;
            $Project->descripcion = $request->descripcion;
            $Project->estado= 'revision';
            $Project->responsables = collect($request->responsables);  //json
            $Project->valor_inicial = (int)$request->valor_inicial;
            $Project->valor_final = ((int)$request->valor_inicial+(int)$request->meta);
            $Project->valor_actual= (int)$request->valor_inicial ;
            $Project->meta = (int)$request->meta;
            $Project->riesgo= 'bajo';
            $Project->rendimiento= $request->rendimiento; 
            $Project->acciones= (int)100;
            $Project->pagos = $request->pago;
            $Project->periodo_pago= $request->periodo_pago;
            $Project->informacion_proyecto= collect($request->informacion_proyecto); //json
            $Project->campaña_comercial= collect($campaniaUrl); //json
            $Project->capitalizacion= $capitalizacion; //json
            $Project->evaluacion_financiera= collect($valuacionUrl); //json
            $Project->logo_url= $logoUrl;
            $Project->portada_url= $portadaUrl;
            $Project->ubicacion= $request->ubicacion;
            $Project->editable= 'si';
            $Project->status= 'Activo';
            $Project->save();
            
          // return redirect('/proyectos')->with('success', 'Proyecto guardado correctamente correctamente');
         } catch (QueryException $e) {
          // return redirect('crear-proyecto')
          //     ->with('msg-error', 'Error en la consulta: ' . $e->getMessage())
          //     ->withInput();
        } catch (\Exception $e) {
           // return redirect('crear-proyecto')
          //     ->with('msg-error', 'Error en el proceso: ' . $e->getMessage())
          //     ->withInput();
        }
    }
    



    
    /**
     * Display the specified resource.
     */
    public function show(Projects $projects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Projects $projects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Projects $projects)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Projects $projects)
    {
        //
    }
}
