@extends('layouts.dashboard')
@section('content')
    <div class="col-12 mt-5">
        <div class="card full-height">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">Empresas creadas</div>
                </div>
            </div>
            <div class="card-body row">
                @foreach ($companies as $company)
                    <div class="col-md-4">
                        <div class="card card-profile" style="height: 400px;">
                            <div class="card-header" style="background-image: url('/img/bg-company.jpg');background-position: bottom;">
                                <div class="profile-picture">
                                    <div class="avatar avatar-xl">
                                        <img src="{{ $company->logo_url ?? '/dashboard/assets/img/company.jpg' }}"
                                            alt="..." class="avatar-img">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="user-profile text-center">
                                    <div class="name">{{ $company->nombre ?? 'Nombre de empresa' }}</div>
                                    <div class="job">{{ $company->encargado ?? 'Encargado' }}</div>
                                    <div class="desc">{{ $company->sector ?? 'Sector' }}</div>
                                    <div class="card-footer">
                                        <div class="row user-stats text-center">
                                            <div class="col mt-2">
                                                <a href="{{ route('editar.empresa', $company->id) }}"
                                                    class="btn btn-primary"><i class="fa fa-edit "> &nbsp</i>
                                                    Editar</a>
                                            </div>
                                            <div class="col mt-2">
                                                <form method="POST" action="{{ route('eliminar.empresa', $company->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"> <i class="fa fa-trash ">
                                                            &nbsp </i> Eliminar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection

@section('scripts')
@include('components.alerts')
@endsection