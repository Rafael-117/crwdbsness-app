@extends('layouts.dashboard')
@section('content')
    <div class="page-inner mt--5">
        <div class="row mt--2">
            
           
           


            
           <div class="col-md-8">
                <div class="card full-height">
                    <div class="card-body">
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>

            {{-- <div class="col-md-6">
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
@section('scripts')
@include('components.InitCalendar')
@endsection