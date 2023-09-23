@extends('layouts.app')
@section('content')
    <div class="static-slider10"
        style="background-image: linear-gradient(
            rgba(0, 0, 0, 0.7),
            rgba(0, 0, 0, 0.7)),url({{ $project->portada_url }})">
        <div class="container">
            <!-- Row  -->
            <div class="row justify-content-center ">
                <!-- Column -->
                <div class="col-md-8 align-self-center text-center">

                    <h1 class="my-3 title text-white text-uppercase company-name">{{ $project->nombre }}</h1>

                </div>
                <!-- Column -->

            </div>
        </div>
    </div>


    <!-- company details -->

    <!-- content -->
    <section class="py-5">        
        <form action="" id="formulario">
            @csrf
            <div id="user-info" data-authenticated="{{ Auth::user() ? 'true' : 'false' }}">

            </div>
            <input type="hidden" name="project_id" value="{{ $project->id }}">

            <div class="container">
                <div class="row gx-5">
                    <aside class="col-lg-6">
                        <div class="border rounded-4 mb-3 d-flex justify-content-center">
                            <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit"
                                src="{{ $project->logo_url }}" />
                        </div>
                        <!-- thumbs-wrap.// -->
                        <!-- gallery-wrap .end// -->
                    </aside>
                    <main class="col-lg-6">
                        <div class="ps-lg-3">
                            <h4 class="text-dark">
                                {{ $project->nombre }}
                            </h4>
                            <span>Empaque de berries</span>
                            <div class="d-flex flex-row my-3">
                                <div class="text-warning mb-1 me-2">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <span class="ms-1">
                                        5
                                    </span>
                                </div>
                                <span class="text-muted"><i class="fas fa-chart-pie fa-sm mx-1"></i>{{ $project->acciones }}
                                    Acciones</span>
                                <span class="text-primary ms-2">Disponibles</span>
                            </div>



                            <div class="row mt-4">
                                <div class="col-md-4 col-6 mb-3">


                                    <div class='ctrl'>
                                        <div class='ctrl-button ctrl-button-decrement'>-</div>
                                        <div class='ctrl-counter'>
                                            <input class='ctrl-counter-input' maxlength='10' type='text' value='0'
                                                name="num_acciones" id=cantidad>
                                            <div class='ctrl-counter-num'>0</div>
                                        </div>
                                        <div class='ctrl-button ctrl-button-increment'>+</div>
                                    </div>


                                </div>
                            </div>

                            <div class="row">
                                <dt class="col-3">Accion: </dt>
                                <dd class="col-9" id="costo"> {{ $project->meta / $project->acciones }}</dd>

                                <dt class="col-3">Monto: </dt>
                                <dd class="col-9" id="monto"> 0</dd>

                                <dt class="col-3">Comisión: </dt>
                                <dd class="col-9" id="comision"> 0 </dd>

                                <dt class="col-3">IVA Comisión: </dt>
                                <dd class="col-9" id="iva"> 0 </dd>
                            </div>

                            <hr />
                            <div class="mb-3">
                                <span class="text-muted">Total = </span>
                                <span class="h5" id="resultado"> 0 </span>
                            </div>

                            <button type="submit" id="realizarPedido" class="btn btn-primary shadow-0 mt-5"> <i
                                    class="me-1 fa fa-shopping-basket"></i>
                                Realizar pedido </button>
                        </div>
                    </main>
                </div>
            </div>
        </form>
    </section>
    <!-- content -->

    <section class="bg-light border-top py-4">
        <div class="container">
            <div class="row gx-4">
                <div class="col-lg-8 mb-4">
                    <div class="border rounded-2 px-3 py-2 bg-white">
                        <!-- Pills navs -->
                        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">

                            <li class="nav-item d-flex" role="presentation">
                                <a class="nav-link d-flex align-items-center justify-content-center w-100 active"
                                    id="ex1-tab-0" data-mdb-toggle="pill" href="#ex1-pills-0" role="tab"
                                    aria-controls="ex1-pills-0" aria-selected="true">General</a>
                            </li>

                            <li class="nav-item d-flex" role="presentation">
                                <a class="nav-link d-flex align-items-center justify-content-center w-100" id="ex1-tab-1"
                                    data-mdb-toggle="pill" href="#ex1-pills-1" role="tab" aria-controls="ex1-pills-1"
                                    aria-selected="false">Valor</a>
                            </li>

                            <li class="nav-item d-flex" role="presentation">
                                <a class="nav-link d-flex align-items-center justify-content-center w-100" id="ex1-tab-2"
                                    data-mdb-toggle="pill" href="#ex1-pills-2" role="tab" aria-controls="ex1-pills-2"
                                    aria-selected="false">Campaña comercial</a>
                            </li>
                            <li class="nav-item d-flex" role="presentation">
                                <a class="nav-link d-flex align-items-center justify-content-center w-100" id="ex1-tab-3"
                                    data-mdb-toggle="pill" href="#ex1-pills-3" role="tab"
                                    aria-controls="ex1-pills-3" aria-selected="false">Proyecto</a>
                            </li>
                            <li class="nav-item d-flex" role="presentation">
                                <a class="nav-link d-flex align-items-center justify-content-center w-100" id="ex1-tab-4"
                                    data-mdb-toggle="pill" href="#ex1-pills-4" role="tab"
                                    aria-controls="ex1-pills-4" aria-selected="false">Capitalización</a>
                            </li>
                            <li class="nav-item d-flex" role="presentation">
                                <a class="nav-link d-flex align-items-center justify-content-center w-100" id="ex1-tab-5"
                                    data-mdb-toggle="pill" href="#ex1-pills-5" role="tab"
                                    aria-controls="ex1-pills-5" aria-selected="false">Evaluación Financiera</a>
                            </li>


                        </ul>
                        <!-- Pills navs -->

                        <!-- Pills content -->
                        <div class="tab-content" id="ex1-content">

                            <div class="tab-pane fade show active" id="ex1-pills-0" role="tabpanel"
                                aria-labelledby="ex1-tab-0">
                                <div class="row col-12 my-5 d-flex align-items-start">
                                    <div
                                        class="col-md-3 col-sm-12 d-flex flex-column align-items-center justify-content-center">
                                        <span class="h5"> <i class="fas fa-user text-secondary"></i> </span>
                                        <span class="text-primary text-center">
                                            {{ json_decode($project->responsables)[0] }}</span>
                                    </div>

                                    <div
                                        class="col-md-3 col-sm-12 d-flex flex-column align-items-center justify-content-center">
                                        <span class="h5"> <i class="fas fa-map-marker-alt text-secondary"></i></span>
                                        <span class="text-primary text-center">{{ $project->ubicacion }}n</span>
                                    </div>
                                    <div
                                        class="col-md-3 col-sm-12 d-flex flex-column align-items-center justify-content-center">
                                        <span class="h5"><i class="fas fa-dungeon text-secondary"></i> </span>
                                        <span class="text-primary text-center"> {{ $sector->sector }} </span>
                                    </div>

                                    <div
                                        class="col-md-3 col-sm-12 d-flex flex-column align-items-center justify-content-center">
                                        <span class="h5"><i class="fas fa-globe text-secondary"></i></span>
                                        <span class="text-center"><a href="{{ $company->web }}"
                                                class="no-a text-primary">Visitar
                                                web</a>
                                        </span>
                                    </div>

                                </div>

                                <span>RFC:
                                    <strong>{{ $company->rfc }}</strong>
                                </span>

                                <div class="mt-4 descriptions">
                                    {!! $project->descripcion !!}
                                </div>
                            </div>

                            <div class="tab-pane fade mb-2" id="ex1-pills-1" role="tabpanel"
                                aria-labelledby="ex1-tab-1">
                                <div class="row col-12 my-5 d-flex align-items-start">
                                    <div class="grid-container">
                                        <div class="item">
                                            <span class="text-secondary">Valor pre-inversión </span>
                                            <span class="font-weight-bold">$ {{ $project->valor_inicial }}</span>
                                        </div>
                                        <div class="item">
                                            <span class="text-secondary">Valor post - inversión</span>
                                            <span class="font-weight-bold">$ {{ $project->valor_final }}</span>
                                        </div>
                                        <div class="item">
                                            <span class="text-secondary">Rendimiento estimado total anual</span>
                                            <span class="font-weight-bold"> {{ $project->rendimiento }} %</span>
                                        </div>
                                        <div class="item">
                                            <span class="text-secondary">Pagos estimados anual</span>
                                            <span class="font-weight-bold">{{ $project->periodo_pago }}</span>
                                        </div>
                                        <div class="item">
                                            <span class="text-secondary">Meta de inversión</span>
                                            <span class="font-weight-bold">{{ $project->meta }}</span>
                                        </div>
                                        <div class="item">
                                            <span class="text-secondary">Tipo de pago anticipado</span>
                                            <span class="font-weight-bold">Rendimiento {{ $project->periodo_pago }}</span>
                                        </div>
                                        <div class="item">
                                            <span class="text-secondary">Oferta accionaria</span>
                                            <span class="font-weight-bold">{{ $project->oferta_accionaria }}</span>
                                        </div>
                                        <div class="item">
                                            <span class="text-secondary">Monto de financiamiento</span>
                                            <span class="font-weight-bold">{{ $project->monto_financiamiento }}</span>
                                        </div>
                                        <div class="item">
                                            <span class="text-secondary">Cantidad total de acciones</span>
                                            <span class="font-weight-bold">{{ $project->acciones }}</span>
                                        </div>
                                        <div class="item">
                                            <span class="text-secondary">Valor de la acción</span>
                                            <span
                                                class="font-weight-bold">{{ $project->meta / $project->acciones }}</span>
                                        </div>
                                        <div class="item">
                                            <span class="text-secondary">Calificación de riesgos</span>
                                            <span class="font-weight-bold">
                                                {{ $project->riesgo }}
                                                @php
                                                    $riesgo = intval(str_replace('%', '', $project->riesgo));
                                                @endphp
                                                @switch(true)
                                                    @case ($riesgo >= 100)
                                                        <span class="text-primary">Sin riesgo de inversión</span>
                                                    @break

                                                    @case ($riesgo <= 90)
                                                        <span class="text-success">Riesgo Bajo</span>
                                                    @break

                                                    @case ($riesgo <= 80)
                                                        <span class="text-warning">Riesgo Medio</span>
                                                    @break

                                                    @case ($riesgo <= 50)
                                                        <span class="text-danger">Riesgo Alto</span>
                                                    @break
                                                @endswitch
                                            </span>

                                        </div>
                                        <div class="item">
                                            <span class="text-secondary">Porcentaje de riesgos</span>
                                            <span class="font-weight-bold">{{ $project->rendimiento }}</span>
                                        </div>
                                    </div>




                                </div>

                            </div>

                            <div class="tab-pane fade mb-2" id="ex1-pills-2" role="tabpanel"
                                aria-labelledby="ex1-tab-2">

                                @foreach (json_decode($project->campaña_comercial) as $campaña)
                                    <img src="{{ $campaña }}" class="img-fluid">
                                @endforeach

                            </div>

                            <div class="tab-pane fade mb-2" id="ex1-pills-3" role="tabpanel"
                                aria-labelledby="ex1-tab-3">

                                <div class="shadow rounded mt-4 p-3">
                                    <div class="card-body descriptions">
                                        {!! json_decode($project->informacion_proyecto)->prob !!}
                                    </div>
                                </div>

                                <div class="shadow rounded mt-4 p-3">
                                    <div class="card-body descriptions">
                                        {!! json_decode($project->informacion_proyecto)->prod !!}
                                    </div>
                                </div>

                                <div class="shadow rounded mt-4 p-3">
                                    <div class="card-body descriptions">
                                        {!! json_decode($project->informacion_proyecto)->merc !!}
                                    </div>
                                </div>

                                <div class="shadow rounded mt-4 p-3">
                                    <div class="card-body descriptions">
                                        {!! json_decode($project->informacion_proyecto)->comp !!}
                                    </div>
                                </div>

                                <div class="shadow rounded mt-4 p-3">
                                    <div class="card-body descriptions">
                                        {!! json_decode($project->informacion_proyecto)->log !!}
                                    </div>
                                </div>

                                <div class="shadow rounded mt-4 p-3">
                                    <div class="card-body descriptions">
                                        {!! json_decode($project->informacion_proyecto)->rec !!}
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade mb-2" id="ex1-pills-4" role="tabpanel"
                                aria-labelledby="ex1-tab-4">


                                <div class="shadow rounded mt-4 p-3">
                                    <div class="card-body descriptions">
                                        {!! json_decode($project->capitalizacion)->pymesrr !!}
                                    </div>
                                </div>

                                <div class="shadow rounded mt-4 p-3">
                                    <div class="card-body descriptions">
                                        {!! json_decode($project->capitalizacion)->caracteristicas !!}
                                    </div>
                                </div>

                                <div class="shadow rounded mt-4 p-3">
                                    <div class="card-body descriptions">
                                        {!! json_decode($project->capitalizacion)->beneficios !!}
                                    </div>
                                </div>

                                <div class="shadow rounded mt-4 p-3">
                                    <div class="card-body descriptions">
                                        {!! json_decode($project->capitalizacion)->restricciones !!}
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade mb-2" id="ex1-pills-5" role="tabpanel"
                                aria-labelledby="ex1-tab-5">
                                @foreach (json_decode($project->evaluacion_financiera) as $evaluacion)
                                    <img src="{{ $evaluacion }}" class="img-fluid">
                                @endforeach
                            </div>


                        </div>
                        <!-- Pills content -->
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="px-0 border rounded-2 shadow-0">
                        <div class="card" style="width: 100%;">
                            <div class="card-body">
                                <h5 class="card-title">Documentos</h5>
                                <ul class="list-unstyled mb-0">

                                    @foreach (json_decode($project->adjuntos) as $item)
                                        <a href="{{ $item->adjunto }}" class="no-a text-primary">
                                            <li><i class="fas fa-file mx-3"></i>
                                                {{ $item->nombre_archivo }}</li>
                                        </a>
                                    @endforeach


                                </ul>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Company details End -->
@endsection
