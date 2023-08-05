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
            <div class="col-md-6">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title">Total income & spend statistics</div>
                        <div class="row py-3">
                            <div class="col-md-4 d-flex flex-column justify-content-around">
                                <div>
                                    <h6 class="fw-bold text-uppercase text-success op-8">Total Income</h6>
                                    <h3 class="fw-bold">$9.782</h3>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-uppercase text-danger op-8">Total Spend</h6>
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
        </div>
    </div>
@endsection
