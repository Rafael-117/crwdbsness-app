@extends('layouts.dashboard')
@section('content')
    <div class="col-12 mt-5">
        <div class="card full-height">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">Empresas creadas</div>
                </div>
            </div>
            <div class="container mt-4">
                <div class="row col-12 m-0 p-0">

                    @foreach ($projects as $project)

                    <div class="col-md-4">
                        <div class="card card-dark"   style="background-image:
                        linear-gradient(to bottom, rgba(0, 0, 0, 0.402), rgba(0, 0, 0, 0.829)),
                        url('{{ $project->portada_url }}');">
                           
                            <div class="card-body skew-shadow">
                                <img src="{{ $project->logo_url }}" height="70" alt="Visa Logo">
                                <h2 class="py-4 mb-0">{{ $project->nombre }}</h2>
                                <div class="row">
                                    <div class="col-8 pr-0">
                                        <h6 class="fw-bold mb-1">{{json_decode($project->responsables)[0] }}</h6>
                                        <div class="text-small text-uppercase fw-bold op-8">{{ $project->estado }}</div>
                                    </div>
                                    <div class="col-4 pl-0 text-right">
                                        <div class="text-small text-uppercase fw-bold op-8">{{ $project->created_at }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    @endforeach

                </div>

            </div>
        </div>
    </div>
@endsection


@section('scripts')
    @include('components.alerts')
@endsection
