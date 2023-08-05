@extends('layouts.dashboard')
@section('content')
    <div class="col-12 mt-5">
        <div class="card">
            <div class="card-body">
                <form action="{{ route($formRoute, $company->id ?? '')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method($method??'')
                    <div class="tab-content" id="pills-tabContent">

                        <div class="tab-pane">
                            <h4 class="card-title">Información General</h4>
                            <div class="row d-flex justify-content-around container">
                                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                                    <div class="avatar avatar-xxl">
                                        <img src="{{ $company->logo_url ?? '/dashboard/assets/img/company.jpg' }}"
                                            alt="..." class="avatar-img rounded" id="img">
                                    </div>
                                    <input type="file" name="picture" id="foto" accept="image/*"
                                        style="display: none" value="{{ $company->logo_url ?? '' }}" />
                                    <label for="foto" class="btn btn-primary btn-sm btn-round text-white mt-2">Subir
                                        logo</label>
                                </div>
                                <div class="col-md-12">
                                    <x-inputForm titulo="Nombre de la empresa" nombre="nombre"
                                        valor="{{ $company->nombre ?? '' }}" />
                                </div>
                                <div class="col-md-6 mt-4">
                                    <x-inputForm titulo="Razon social" nombre="razon" valor="{{ $company->razon ?? '' }}" />
                                </div>
                                <div class="col-md-6 mt-4">
                                    <x-inputForm titulo="RFC" nombre="rfc" valor="{{ $company->rfc ?? '' }}"
                                        attr="this.value=this.value.toUpperCase()" />
                                </div>

                            </div>
                        </div>

                        <div class="tab-pane">
                            <h4 class="card-title mb-5">Descripción de la empresa</h4>
                            <div class="centered">
                                <div class="row row-editor">
                                    <div class="editor-container col-12">
                                        <textarea class="form-control editor" name="descripcion">
                                            {{ $company->descripcion ?? old('editor') ?? 'Titulo:' }}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane">
                            <h4 class="card-title mb-5">Datos adicionales</h4>
                            <div class="row d-flex justify-content-around">
                                <div class="col-md-12">
                                    <x-inputForm titulo="Nombre del encargado de la empresa" nombre="encargado"
                                        valor="{{ $company->encargado ?? '' }}" />
                                </div>
                                <div class="col-md-6 mt-4">
                                    <x-inputForm titulo="URL del sitio web" nombre="web"
                                        valor="{{ $company->web ?? '' }}" />
                                </div>
                                <div class="col-md-6 mt-4">
                                    <div class="form-group form-floating-label">
                                        <select class="form-control input-border-bottom" id="sector" name="sector"
                                            required="">
                                            <option value="">&nbsp;</option>
                                            @foreach ($options as $option)
                                            {{ $selec = $company->sector??'' }}
                                                @if ($selec == $option->id)
                                                <option value="{{ $option->id }}" selected>{{ $option->sector }}</option>
                                                @else
                                                <option value="{{ $option->id }}">{{ $option->sector }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <label for="sector" class="placeholder">Sector</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane">
                            <h4 class="card-title mb-5">Dirección</h4>
                            <div class="row d-flex justify-content-around">

                                <div class="col-md-6">
                                    <x-inputForm titulo="Calle" nombre="calle" valor="{{ $company->calle ?? '' }}" />
                                </div>
                                <div class="col-md-6">
                                    <x-inputForm titulo="Numero" nombre="numero" valor="{{ $company->numero ?? '' }}" />
                                </div>
                                <div class="col-md-6">
                                    <x-inputForm titulo="Colonia" nombre="colonia" valor="{{ $company->colonia ?? '' }}" />
                                </div>
                                <div class="col-md-6">
                                    <x-inputForm titulo="Ciudad" nombre="ciudad" valor="{{ $company->ciudad ?? '' }}" />
                                </div>
                                <div class="col-md-6">
                                    <x-inputForm titulo="Estado" nombre="estado" valor="{{ $company->estado ?? '' }}" />
                                </div>
                                <div class="col-md-6">
                                    <x-inputForm titulo="Pais" nombre="pais" valor="{{ $company->pais ?? 'Mexico' }}" />
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
@endsection