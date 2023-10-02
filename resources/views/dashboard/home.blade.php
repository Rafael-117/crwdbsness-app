@extends('layouts.dashboard')
@section('content')
    <div class="page-inner mt--5">
        <div class="row mt--2">
            @if (Auth::user()->type == 'Usuario')
                <div class="col-md-6">
                    <div class="card full-height">
                        <div class="card-body">
                            <div class="card-title">Completa tu registro</div>
                            <div class="card-category">Termina de completar tu información para que te encuentres preparado
                                para
                                comprar algunas acciones.</div>
                            <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                                <div class="px-2 pb-2 pb-md-0 text-center">
                                    <a class="btn btn-primary" href="{{ route('perfil', Auth::user()->id) }}">Ir a mi
                                        perfil</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @foreach ($transactions as $pedido)
            <div class="col-md-6 cards">
                <div class="card full-height card-{{mt_rand(1, 5);}}">
                    <div class="card-body">
                        <div class="row d-flex justify-content-between">
                            <div class="card__icon"><i class="fas fa-bolt"></i> Pedido pendiente</div>
                            <p class="card__exit"><i class="fas fa-times"></i></p>
                        </div>
                        <div class="mt-5">
                            <h2 class="card__title">{{$pedido->project->nombre?? 'Nombre de proyecto'}}</h2>
                            <h4 class="card__title"># de acciones : {{$pedido->num_acciones ?? '# Acciones'}}</h4>
                        </div>
                       
                        <p class="card__apply">
                            <a class="card__link" href="#">Terminar Pedido <i class="fas fa-arrow-right"></i></a>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach

           


            
            {{-- <div class="col-md-6">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title">Estadísticas generales</div>
                        <div class="card-category">Información diaria sobre estadísticas de tus acciones</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-1"><div class="circles-wrp" style="position: relative; display: inline-block;"><svg xmlns="http://www.w3.org/2000/svg" width="90" height="90"><path fill="transparent" stroke="#f1f1f1" stroke-width="7" d="M 44.99154756204665 3.500000860767564 A 41.5 41.5 0 1 1 44.942357332570026 3.500040032273624 Z" class="circles-maxValueStroke"></path><path fill="transparent" stroke="#FF9E27" stroke-width="7" d="M 44.99154756204665 3.500000860767564 A 41.5 41.5 0 1 1 20.64435763625984 78.60137921350231 " class="circles-valueStroke"></path></svg><div class="circles-text" style="position: absolute; top: 0px; left: 0px; text-align: center; width: 100%; font-size: 31.5px; height: 90px; line-height: 90px;">5</div></div></div>
                                <h6 class="fw-bold mt-3 mb-0">Acciones</h6>
                            </div>
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-2"><div class="circles-wrp" style="position: relative; display: inline-block;"><svg xmlns="http://www.w3.org/2000/svg" width="90" height="90"><path fill="transparent" stroke="#f1f1f1" stroke-width="7" d="M 44.99154756204665 3.500000860767564 A 41.5 41.5 0 1 1 44.942357332570026 3.500040032273624 Z" class="circles-maxValueStroke"></path><path fill="transparent" stroke="#2BB930" stroke-width="7" d="M 44.99154756204665 3.500000860767564 A 41.5 41.5 0 1 1 5.5495771787290025 57.88076625138973 " class="circles-valueStroke"></path></svg><div class="circles-text" style="position: absolute; top: 0px; left: 0px; text-align: center; width: 100%; font-size: 31.5px; height: 90px; line-height: 90px;">36</div></div></div>
                                <h6 class="fw-bold mt-3 mb-0">Proyectos</h6>
                            </div>
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-3"><div class="circles-wrp" style="position: relative; display: inline-block;"><svg xmlns="http://www.w3.org/2000/svg" width="90" height="90"><path fill="transparent" stroke="#f1f1f1" stroke-width="7" d="M 44.99154756204665 3.500000860767564 A 41.5 41.5 0 1 1 44.942357332570026 3.500040032273624 Z" class="circles-maxValueStroke"></path><path fill="transparent" stroke="#F25961" stroke-width="7" d="M 44.99154756204665 3.500000860767564 A 41.5 41.5 0 0 1 69.44267714510887 78.53812060894248 " class="circles-valueStroke"></path></svg><div class="circles-text" style="position: absolute; top: 0px; left: 0px; text-align: center; width: 100%; font-size: 31.5px; height: 90px; line-height: 90px;">12</div></div></div>
                                <h6 class="fw-bold mt-3 mb-0">Empresas</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title">Estadísticas totales de ingresos</div>
                        <div class="row py-3">
                            <div class="col-md-4 d-flex flex-column justify-content-around">
                                <div>
                                    <h6 class="fw-bold text-uppercase text-success op-8">Total</h6>
                                    <h3 class="fw-bold">$9.782</h3>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-uppercase text-danger op-8">Total</h6>
                                    <h3 class="fw-bold">$1,248</h3>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div id="chart-container">
                                    <canvas id="totalIncomeChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Estado de tus ultimas inversiones</div>
                    </div>
                    <div class="card-body">
                        <div class="chart-container"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                            <canvas id="multipleLineChart" width="1008" height="600" style="display: block; height: 300px; width: 504px;" class="chartjs-render-monitor"></canvas>
                        </div>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>
@endsection
