<div class="col-md-6">
    <div class="card card-dark"
    {{-- coment --}}
        style="background-image:
        linear-gradient(to bottom, rgba(0, 0, 0, 0.402), rgba(0, 0, 0, 0.829)),
        url('{{ $portadaurl ?? '' }}'); background-size: cover;">
        <div class="card-body skew-shadow">
            <img src="{{ $logourl }}" height="70" alt="Visa Logo">
            <h2 class="py-4 mb-0">{{ $nombreProject ?? '' }}</h2>
            <div class="row">
                <div class="col-8 pr-0">
                    <h6 class="fw-bold mb-1">{{ $responsables ?? '' }}</h6>
                    <div class="text-small text-uppercase fw-bold op-8">{{ $estado ?? '' }}
                    </div>
                </div>
                <div class="col-4 pl-0 text-right">
                    <div class="text-small text-uppercase fw-bold op-8">
                        {{ $createdat ?? '' }}</div>
                    <div class="col mt-2">
                        <a href="{{ $rutaEdit }}" class="btn btn-primary btn-block {{ $disable }} ">
                            <i class="fa fa-edit "> &nbsp</i> Editar </a>
                    </div>
                    <div class="col mt-2">
                        <form method="POST" action="{{ $action }}">
                            @if ($action)
                                @csrf
                                @method('DELETE')
                            @endif
                            <button type="submit" class="btn btn-danger btn-block {{ $disable }}"
                                {{ $disable }}> <i class="fa fa-trash ">
                                    &nbsp </i> Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
