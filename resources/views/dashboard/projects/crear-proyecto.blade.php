@extends('layouts.dashboard')
@section('content')
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <form action="{{ route($formRoute, $project ?? '') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method($method ?? '')
                    <div class="tab-content" id="pills-tabContent">

                        {{-- select de empresas --}}
                        <div class="tab-pane">
                            <h4 class="card-title mb-5">EMPRESA EN LA CUAL SE DESARROLLARA EL PROYECTO</h4>
                            <div class="row d-flex justify-content-around">

                                <div class="col-md-12 mt-4">

                                    <div class="form-group form-floating-label">
                                        <select class="form-control input-border-bottom" id="companie_id" name="companie_id"
                                            required="">

                                            <option value="">&nbsp;</option>
                                            {{ $select = $project->companie_id ?? '' }}
                                            @foreach ($companies as $companie)
                                                @if ($select == $companie->id)
                                                    <option value="{{ $companie->id }}" selected>{{ $companie->nombre }}
                                                    </option>
                                                @else
                                                    <option value="{{ $companie->id }}">{{ $companie->nombre }}</option>
                                                @endif
                                            @endforeach


                                        </select>

                                        <label for="companie_id" class="placeholder">Selecciona tu empresa</label>
                                    </div>
                                </div>

                            </div>
                        </div>

                        {{-- nombre, logo y descripcion --}}
                        <div class="tab-pane">
                            <h4 class="card-title mb-5">INFORMACIÓN GENERAL</h4>
                            <div class="row d-flex justify-content-around container px-0 mx-0">

                                <div class="card-header header-bg mb-5" id="portada_img"
                                    style="background-image: url({{ $project->portada_url ?? 'https://img.freepik.com/vector-premium/fondo-geometrico-azul-abstracto-triangulos_41606-322.jpg' }})">


                                    <div class="profile-picture">
                                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                            <div class="avatar avatar-xxl">
                                                <img src="{{ $project->logo_url ?? '/dashboard/assets/img/project.jpg' }}"
                                                    alt="..." class="avatar-img rounded" id="img">
                                            </div>
                                            <input type="file" name="picture" id="foto" accept="image/*"
                                                style="display: none" value="{{ $project->logo_url ?? '' }}" />
                                            <label for="foto"
                                                class="btn btn-primary btn-sm btn-round text-white mt-2">Subir
                                                logo</label>
                                        </div>
                                    </div>
                                    <div class="btn-portada">
                                        <input type="file" name="portada" id="portada" accept="image/*"
                                            style="display: none" value="{{ $project->logo_url ?? '' }}" />
                                        <label for="portada" class="btn btn-primary btn-sm btn-round text-white mt-2">
                                            Subir portada</label>
                                    </div>

                                </div>



                                <div class="col-md-12 mt-5">
                                    <x-inputForm titulo="Nombre del proyecto" nombre="nombre"
                                        valor="{{ $project->nombre ?? '' }}" />
                                </div>
                                <div class="mt-5 col-md-12">
                                    <div class="row row-editor">
                                        <div class="editor-container col-12">
                                            <textarea class="form-control editor" name="descripcion">
                                            {{ $project->descripcion ?? (old('editor') ?? 'Descripción del proyecto:') }}
                                        </textarea>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                        {{-- Responsables --}}
                        <div class="tab-pane" id="responsables-container">
                            <h4 class="card-title mb-5">RESPONSABLE/S DEL PROYECTO </h4>
                            <div class="row d-flex justify-content-around">
                                <button class="btn btn-primary btn-round mt-5 mb-5" id="btn-agregar-responsable"> <i
                                        class="fa fa-plus"></i> Añadir Responsable</button>
                                <div class="col-12 mt-4">
                                    <div class="col-md-12 row d-flex align-items-center responsables">


                                        @if ($project->responsables ?? false)
                                            @foreach (json_decode($project->responsables) ?? '' as $key => $value)
                                                @if ($key >= 1)
                                                    <div class="col-md-12 row d-flex align-items-center responsables">
                                                        <div class="col-md-10">
                                                            <div class="form-group form-floating-label">
                                                                <input id="responsable_{{ $key }}" type="text"
                                                                    class="form-control input-border-bottom" required=""
                                                                    name="responsables[]" value="{{ $value ?? '' }}">
                                                                <label for="responsable_{{ $key }}"
                                                                    class="placeholder">Nuevo responsable:</label>
                                                            </div>
                                                        </div>
                                                        <button type="button"
                                                            class="btn-eliminar-responsable btn btn-danger btn-round "> <i
                                                                class="fa fa-trash"></i> Eliminar </button>
                                                    </div>
                                                @else
                                                    <div class="col-md-12">
                                                        <x-inputForm titulo="Responsable" nombre="responsables[]"
                                                            valor="{{ $value ?? '' }}" />
                                                    </div>
                                                @endif
                                            @endforeach
                                        @else
                                            <div class="col-md-12">
                                                <x-inputForm titulo="Responsable" nombre="responsables[]"
                                                    valor="{{ $value ?? '' }}" />
                                            </div>
                                        @endif








                                    </div>

                                </div>
                            </div>
                        </div>

                        {{-- valor y acciones --}}
                        <div class="tab-pane">
                            <h4 class="card-title mb-5">VALOR DEL PROYECTO</h4>
                            <div class="row d-flex justify-content-around">
                                <div class="col-md-6 mt-5">
                                    <x-inputForm titulo="Valor actual de tu proyecto" nombre="valor_inicial"
                                        valor="{{ $project->valor_inicial ?? '' }}" type="number" />
                                </div>

                                <div class="col-md-6 mt-5">
                                    <x-inputForm titulo="Meta esperada" nombre="meta"
                                        valor="{{ $project->meta ?? '' }}" type="number" />
                                </div>

                                <div class="col-md-6 mt-5">
                                    <x-inputForm titulo="Meta minima" nombre="meta_minima"
                                        valor="{{ $project->meta_minima ?? '' }}" type="number" />
                                </div>

                                <div class="col-md-6 mt-5">
                                    <x-inputForm titulo="Rendimiento estimado total anual" nombre="rendimiento"
                                        valor="{{ $project->rendimiento ?? '0% - 0%' }}" />
                                </div>

                                <div class="col-md-6 mt-5">
                                    <x-inputForm titulo="Pagos estimados anual" nombre="pago"
                                        valor="{{ $project->pagos ?? '0% - 0%' }}" />
                                </div>

                                <div class="col-md-6 mt-5">
                                    <div class="form-group form-floating-label">
                                        <select class="form-control input-border-bottom" name="periodo_pago"
                                            id="selectFloatingLabel" required="">
                                            <option>&nbsp;</option>

                                            <option value="Semanal"
                                                {{ $project->periodo_pago ?? '' == 'Semanal' ? 'selected' : '' }}>Semanal
                                            </option>
                                            <option value="Mensual"
                                                {{ $project->periodo_pago ?? '' == 'Mensual' ? 'selected' : '' }}>Mensual
                                            </option>
                                            <option value="Bimestral"
                                                {{ $project->periodo_pago ?? '' == 'Bimestral' ? 'selected' : '' }}>
                                                Bimestral
                                            </option>
                                            <option value="Semestral"
                                                {{ $project->periodo_pago ?? '' == 'Semestral' ? 'selected' : '' }}>
                                                Semestral
                                            </option>
                                            <option value="Anual"
                                                {{ $project->periodo_pago ?? '' == 'Anual' ? 'selected' : '' }}>Anual
                                            </option>
                                        </select>
                                        <label for="selectFloatingLabel" class="placeholder">Periodo de pagos
                                            estimados</label>
                                    </div>
                                </div>

                                <div class="col-md-6 mt-5">
                                    <x-inputForm titulo="Oferta accionaria" nombre="oferta_accionaria"
                                        valor="{{ $project->oferta_accionaria ?? '0%' }}" />
                                </div>

                                <div class="col-md-6 mt-5">
                                    <x-inputForm titulo="Monto de financiamiento" nombre="monto_financiamiento"
                                        valor="{{ $project->monto_financiamiento ?? '' }}" type="number" />
                                </div>






                            </div>
                        </div>

                        {{-- Informacion del proyecto --}}
                        <div class="tab-pane">
                            <h4 class="card-title mb-5">INFORMACIÓN DEL PROYECTO</h4>
                            <div class="row d-flex justify-content-around">

                                <div class="mt-5 col-md-12">
                                    <div class="row row-editor">
                                        <div class="editor-container col-12">
                                            <textarea class="form-control editor" name="informacion_proyecto[prob]">
                                                @if(isset($project) && isset($project->informacion_proyecto))
                                                {{ json_decode($project->informacion_proyecto)->prob ?? (old('informacion_proyecto.prob') ?? 'PROBLEMA Y SOLUCIÓN:') }}
                                                @else
                                                PROBLEMA Y SOLUCIÓN:
                                                @endif
                                            </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5 col-md-12">
                                    <div class="row row-editor">
                                        <div class="editor-container col-12">
                                            <textarea class="form-control editor" name="informacion_proyecto[prod]">
                                                @if(isset($project) && isset($project->informacion_proyecto))
                                                {{ json_decode($project->informacion_proyecto)->prod ?? (old('informacion_proyecto.prod') ?? 'PRODUCTO / SERVICIO:') }}
                                                @else
                                                PRODUCTO / SERVICIO:
                                                @endif
                                             </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5 col-md-12">
                                    <div class="row row-editor">
                                        <div class="editor-container col-12">
                                            <textarea class="form-control editor" name="informacion_proyecto[merc]">
                                                @if(isset($project) && isset($project->informacion_proyecto))
                                                {{ json_decode($project->informacion_proyecto)->merc ?? (old('informacion_proyecto.merc') ?? 'MERCADO:') }}
                                                @else
                                                MERCADO:
                                                @endif
                                             </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5 col-md-12">
                                    <div class="row row-editor">
                                        <div class="editor-container col-12">
                                            <textarea class="form-control editor" name="informacion_proyecto[comp]">
                                                @if(isset($project) && isset($project->informacion_proyecto))
                                                {{ json_decode($project->informacion_proyecto)->comp ?? (old('informacion_proyecto.comp') ?? 'COMPETENCIA:') }}
                                                @else
                                                COMPETENCIA:
                                                @endif
                                            </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5 col-md-12">
                                    <div class="row row-editor">
                                        <div class="editor-container col-12">
                                            <textarea class="form-control editor" name="informacion_proyecto[log]">
                                                @if(isset($project) && isset($project->informacion_proyecto))
                                                {{ json_decode($project->informacion_proyecto)->log ?? (old('informacion_proyecto.log') ?? 'LOGROS O HITOS:') }}
                                                @else
                                                LOGROS O HITOS:
                                                @endif
                                             </textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-5 col-md-12">
                                    <div class="row row-editor">
                                        <div class="editor-container col-12">
                                            <textarea class="form-control editor" name="informacion_proyecto[rec]">
                                                @if(isset($project) && isset($project->informacion_proyecto))
                                                {{ json_decode($project->informacion_proyecto)->rec ?? (old('informacion_proyecto.rec') ?? 'USO DE RECURSOS:') }}
                                                @else
                                                USO DE RECURSOS:
                                                @endif
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- campaña_comercial --}}
                        <div class="tab-pane">
                            <h4 class="card-title mb-5">CAMPAÑA COMERCIAL</h4>
                            <div class="container p-5 t-5">
                                <b>Sube tus Imágenes Promocionales</b>
                                <p>¡Es hora de darle vida a tu campaña comercial! En esta sección, podrás cargar las
                                    imágenes promocionales de tu proyecto para cautivar a tu audiencia y generar un
                                    impacto
                                    significativo. </p>
                                <span>Convierte tus documentos en imagenes <b>png o jpg</b> </span>
                            </div>
                            <div class="row d-flex justify-content-around">
                                <div class="upload__box d-flex flex-column align-content-center align-items-center">
                                    <div class="upload__btn-box">
                                        <label class="btn btn-primary btn-round text-white"><i class="fas fa-images"></i>
                                            Seleccionar magenes
                                            <input type="file" multiple="" accept="image/png,image/jpeg"
                                                data-max_length="20" class="upload__inputfile" name="camp[]">
                                        </label>
                                    </div>
                                    <div class="upload__img-wrap row">

                                        @if ($project->campaña_comercial ?? '')
                                            @foreach (json_decode($project->campaña_comercial) as $key => $value)
                                                <div class="upload__img-box">
                                                    <div style="background-image: url({{$value }})"
                                                        data-number="{{ $key }}" data-file="{{ $value }}" class="img-bg">
                                                        <div class="upload__img-close"></div>
                                                    </div>
                                                    <input type="hidden" name="old_camp[]" value="{{$value }}">
                                                </div>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>

                        {{-- evaluacion financiera --}}
                        <div class="tab-pane">
                            <h4 class="card-title mb-5">EVALUACIÓN FINANCIERA</h4>
                            <div class="container p-5 t-5">
                                <b>Sube tus Datos e Informes</b>
                                <p>Te invitamos a compartir los datos e informes necesarios para llevar a cabo una
                                    completa
                                    evaluación financiera de tu proyecto. La información proporcionada aquí será
                                    esencial
                                    para analizar la viabilidad económica y el rendimiento de la iniciativa.</p>
                                <span>Convierte tus documentos en imagenes <b>png o jpg</b> </span>

                            </div>

                            <div class="row d-flex justify-content-around">

                                <div class="upload__box d-flex flex-column align-content-center align-items-center">
                                    <div class="upload__btn-box">
                                        <label class="btn btn-primary btn-round text-white"><i class="fas fa-images"></i>
                                            Seleccionar magenes
                                            <input type="file" multiple="" accept="image/png,image/jpeg"
                                                data-max_length="20" class="upload__inputfile" name="valuacion[]">
                                        </label>
                                    </div>
                                    <div class="upload__img-wrap row">

                                        @if ($project->evaluacion_financiera ?? '')
                                        @foreach (json_decode($project->evaluacion_financiera) as $key => $value)
                                            <div class="upload__img-box">
                                                <div style="background-image: url({{ $value }})"
                                                    data-number="{{ $key }}" data-file="{{ $value }}" class="img-bg">
                                                    <div class="upload__img-close"></div>
                                                </div>
                                                <input type="hidden" name="old-evaluacion[]" value="{{$value}}">
                                            </div>
                                        @endforeach
                                    @endif


                                    </div>
                                </div>

                            </div>
                        </div>

                        {{-- Adjuntos --}}
                        <div class="tab-pane" id="inputs-container">
                            <h4 class="card-title mb-5">Adjuntos</h4>
                            <div class="row d-flex flex-column">
                                <p class="mt-5 text-center">
                                    <label for="attachment">
                                        <a class="btn btn-primary text-light" role="button" aria-disabled="false">+
                                            Add</a>
                                    </label>
                                    <input type="file" name="adjuntos[]" accept=".pdf" id="attachment"
                                        style="visibility: hidden; position: absolute;" multiple />
                                </p>
                                <div id="files-area" class="list-files">
                                    <div id="filesList">
                                        <div id="files-names">

                                            @if ($project->adjuntos ?? '')
                                            @foreach (json_decode($project->adjuntos) as $adjunto)
                                               
                                            <div class="file-block"><span class="file-delete"><span>+</span></span><span
                                                class="name">{{ $adjunto->nombre_archivo}}</span>
                                                <input type="text"
                                                class="name-input form-control input-solid"
                                                placeholder="Nombre del archivo" name="old_nombrearchivo[]" value="{{ $adjunto->nombre_archivo }}">
                                                <input type="hidden" name="old_adjuntos[]" value="{{$adjunto->adjunto}}">
                                            </div>
                                            @endforeach
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Ubicacion --}}
                        <div class="tab-pane">
                            <h4 class="card-title mb-5">UBICACIÓN DONDE SE DESARROLLA TU PROYECTO</h4>
                            <div class="row d-flex justify-content-around mb-5">

                                <div class="col-md-12">
                                    <x-inputForm titulo="Ubicacion ciudad y estado" nombre="ubicacion"
                                        valor="{{ $project->ubicacion ?? '' }}" />
                                </div>
                            </div>

                            <div class="mt-5 text-center"><button class="btn btn-primary profile-button"
                                    type="submit">Guardar</button>
                            </div>
                        </div>

                    </div>
                </form>

                <div class="d-flex justify-content-around mt-5" id="pills-tab" role="tablist">
                    <button id="btnBack" class="tab nav-link btn btn-round col-md-2" onclick="changeTab(-1)">
                        <i class="fas fa-arrow-left"></i> Atrás
                    </button>
                    <button id="btnNext" class="tab nav-link  btn btn-round col-md-2" onclick="changeTab(1)">
                        Siguiente <i class="fas fa-arrow-right"></i>
                    </button>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @include('components.tabs')
    @include('components.ckeditor')
    @include('components.alerts')
    <script>
        $(document).ready(function() {
            // Función para agregar un nuevo campo de entrada de responsable
            function agregarResponsable() {
                let contadorResponsables = $(".responsables").length + 1;
                const nuevoResponsable = `
                <div class="col-md-12 row d-flex align-items-center responsables">
                        <div class="col-md-10">
                            <div class="form-group form-floating-label">
                                <input id="responsable_${contadorResponsables}" type="text" class="form-control input-border-bottom" required=""
                                    name="responsables[]">
                                <label for="responsable_${contadorResponsables}" class="placeholder">Nuevo responsable:</label>
                            </div>
                        </div>
                            <button type="button" class="btn-eliminar-responsable btn btn-danger btn-round ">  <i class="fa fa-trash"></i> Eliminar </button>
                        
                </div>`;
                $("#responsables-container").append(nuevoResponsable);
            }
            // Función para eliminar el campo de entrada de responsable
            function eliminarResponsable() {
                $(this).parent().remove();
            }
            // Evento clic en el botón "Añadir nuevo responsable"
            $("#btn-agregar-responsable").click(function() {
                agregarResponsable();
            });

            // Delegación de eventos para los botones "Eliminar responsable" generados dinámicamente
            $(document).on("click", ".btn-eliminar-responsable", eliminarResponsable);








        });
    </script>
@endsection
