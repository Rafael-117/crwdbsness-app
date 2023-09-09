@extends('layouts.dashboard')
@section('content')
    <div class="col-12 mt-5">
        <div class="card full-height">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">Proyectos creados</div>
                </div>
            </div>
            <div class="container mt-4">
                <div class="row col-12 m-0 p-0 d-flex justify-content-center">
                    @if ($projects != '[]')
                        @foreach ($projects as $project)
                            <x-projectCard nombreProject="{{ $project->nombre }}" portadaurl="{{ $project->portada_url }}"
                                logourl="{{ $project->logo_url }}"
                                responsables=" {{ json_decode($project->responsables)[0] }}"
                                estado="{{ $project->estado }}" createdat="{{ $project->created_at }}"
                                proyecto="{{ $project->id }}"
                                rutaEdit="{{ $project->estado == 'revision' ? route('editar.proyecto', $project) : '' }}"
                                action="{{ $project->estado == 'revision' ? route('eliminar.proyecto', $project) : '' }}"
                                disable="{{ $project->estado == 'revision' ? '' : 'disabled' }}" />
                        @endforeach
                    @else
                        <h5 class="my-5">Aun no tienes proyectos creados</h5>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @include('components.alerts')
@endsection
