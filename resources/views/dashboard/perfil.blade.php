@extends('layouts.dashboard')
@section('content')
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-12">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="container rounded bg-white mt-5 mb-5">
                            <form id="laravel-form" data="{{ route('editar.perfil') }}" method="POST"
                                enctype="multipart/form-data"
                                data-info="name,paternal,maternal,telefono,rfc,calle,numero,ciudad,estado,pais">
                                @csrf @method('PATCH')
                                <div class="row">
                                    <div class="col-md-3 border-right">
                                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                            <div class="avatar avatar-xxl">
                                                <img src="{{ $user->picture ?? '/dashboard/assets/img/avatar.jpg' }}"
                                                    alt="..." class="avatar-img rounded-circle" id="img">
                                            </div>

                                            <input type="file" name="picture" id="foto" accept="image/*"
                                                style="display: none" />
                                            <label for="foto"
                                                class="btn btn-primary btn-sm btn-round text-white mt-2">Cambiar
                                                foto</label>
                                            <span class="text-black-50 mt-4">{{ $user->email ?? '' }}</span>
                                        </div>
                                    </div>
                                    <div class="col-md-9 border-right">
                                        <div class="p-3 py-5">
                                            <div class="d-flex justify-content-between align-items-center mb-3">
                                                <h4 class="text-right">Información personal</h4>
                                            </div>
                                            <div class="row mt-2 d-flex justify-content-around">
                                                <div class="col-md-12 mt-3">
                                                    <x-inputForm titulo="Nombre" nombre="name"
                                                        valor="{{ $user->name ?? '' }}" />
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <x-inputForm titulo="Apellido paterno" nombre="paternal"
                                                        valor="{{ $user->paternal ?? '' }}" />
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <x-inputForm titulo="Apellido paterno" nombre="maternal"
                                                        valor="{{ $user->maternal ?? '' }}" />
                                                </div>

                                                <div class="col-md-6">
                                                    <x-inputForm titulo="Numero telefonico" nombre="telefono"
                                                        valor="{{ $user->telefono ?? '' }}" />
                                                </div>
                                                <div class="col-md-6">
                                                    <x-inputForm titulo="RFC" nombre="rfc"
                                                        valor="{{ $user->rfc ?? '' }}"
                                                        attr="this.value=this.value.toUpperCase()" />
                                                </div>
                                                <div class="col-md-6">
                                                    <x-inputForm titulo="Calle" nombre="calle"
                                                        valor="{{ $user->calle ?? '' }}" />
                                                </div>
                                                <div class="col-md-6">
                                                    <x-inputForm titulo="Numero" nombre="numero"
                                                        valor="{{ $user->numero ?? '' }}" />
                                                </div>
                                                <div class="col-md-6">
                                                    <x-inputForm titulo="Colonia" nombre="colonia"
                                                        valor="{{ $user->colonia ?? '' }}" />
                                                </div>
                                                <div class="col-md-6">
                                                    <x-inputForm titulo="Ciudad" nombre="ciudad"
                                                        valor="{{ $user->ciudad ?? '' }}" />
                                                </div>
                                                <div class="col-md-6">
                                                    <x-inputForm titulo="Estado" nombre="estado"
                                                        valor="{{ $user->estado ?? '' }}" />
                                                </div>
                                                <div class="col-md-6">
                                                    <x-inputForm titulo="Pais" nombre="pais"
                                                        valor="{{ $user->pais ?? 'Mexico' }}" />
                                                </div>
                                            </div>
                                            <div class="mt-5 text-center"><button class="btn btn-primary profile-button"
                                                    type="submit">Guardar</button></div>
                                        </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


@section('scripts')
@include('components.alerts')
@endsection