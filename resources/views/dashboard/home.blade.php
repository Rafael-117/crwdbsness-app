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

            <div class="row col-12 mt--2">
                @foreach ($transactions as $pedido)
                    <div class="col-md-6 cards" id="pedido_{{ $pedido->id }}">
                        <div class="card full-height card-{{ mt_rand(1, 5) }}">
                            <div class="card-body">
                                <div class="row d-flex justify-content-between">
                                    <div class="card__icon"><i class="fas fa-bolt"></i> Pedido pendiente</div>
                                    <a href="#" class="card__exit" onclick="cancelarPedido({{ $pedido->id }})"><i
                                            class="fas fa-times"></i></a>
                                </div>
                                <div class="mt-5">
                                    <h2 class="card__title">{{ $pedido->project->nombre ?? 'Nombre de proyecto' }}</h2>
                                    <h4 class="card__title"># de acciones : {{ $pedido->num_acciones ?? '# Acciones' }}</h4>
                                </div>

                                <p class="card__apply">
                                    <a class="card__link" href="#"
                                        onclick="terminarPedido({{ $pedido }})">Terminar Pedido <i
                                            class="fas fa-arrow-right"></i></a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


            @if (!empty($proyectos))
            <h1>Tus inversiones</h1>
            @endif

            <div class="row col-12 mt-5">
                @foreach ($proyectos as $proyecto)
                    <div class="col-md-4">
                       
                        <div class="second hero">
                            <img class="hero-profile-img" src="{{$proyecto->project->portada_url}}" alt="">
                            <div class="hero-description-bk"></div>
                            <div class="hero-logo">
                              <img class="img-fluid" src="{{$proyecto->project->logo_url}}" alt="">
                            </div>
                            <div class="hero-description">
                                <h2>{{$proyecto->project->nombre}}</h2>
                                <p># Acciones : {{$proyecto->num_acciones}}</p>
                            </div>
                            <div  class="hero-date">
                              <p>{{$proyecto->updated_at}}</p>
                            </div>
                            <div class="hero-btn">
                              <a href="#" class="btn-outled">Ver información</a>
                            </div>
                          </div>

                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    @include('components.poppups')
@endsection
