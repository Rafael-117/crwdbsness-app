@extends('layouts.login')



@section('XXX')
    <form method="POST" action="{{ route('register') }}" class="login100-form validate-form">
        @csrf
        <span class="login100-form-title p-b-43">
            Registrate
        </span>

        <div class="wrap-input100 validate-input" data-validate="El nombre es requerido">
            <input class="input100" type="text" name="name">
            <span class="focus-input100"></span>
            <span class="label-input100">Nombre</span>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="wrap-input100 validate-input" data-validate="El apellido paterno es requerido">
            <input class="input100" type="text" name="paternal">
            <span class="focus-input100"></span>
            <span class="label-input100">Apellido paterno</span>
            @error('paternal')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="wrap-input100 validate-input" data-validate="El apellido materno es requerido">
            <input class="input100" type="text" name="Maternal">
            <span class="focus-input100"></span>
            <span class="label-input100">Apellido materno</span>
            @error('maternal')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>



        <div class="wrap-input100 validate-input" data-validate="re requiere de un correo valido: ex@abc.xyz">
            <input class="input100" type="text" name="email">
            <span class="focus-input100"></span>
            <span class="label-input100">Email</span>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="wrap-input100 validate-input" data-validate="Contraseña es requerida">
            <input class="input100" type="password" name="password" required autocomplete="new-password">
            <span class="focus-input100"></span>
            <span class="label-input100">Contraseña</span>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <div class="wrap-input100 validate-input" data-validate="Contraseña es requerida">
            <input class="input100" type="password" name="password_confirmation" required autocomplete="new-password">
            <span class="focus-input100"></span>
            <span class="label-input100">Confirmar contraseña</span>
        </div>



        <div class="container-login100-form-btn">
            <button class="login100-form-btn" type="submit">
                Registrar
            </button>
        </div>
    </form>
@endsection


@section('content')
    <form method="POST" action="{{ route('register') }}" class="login100-form validate-form">
        @csrf

        <span class="login100-form-title p-b-43">
            Registrate
        </span>

            <div class="wrap-input100 validate-input" data-validate="El nombre es requerido">
                <input class="input100" type="text" name="name" id="name" value="{{ old('name') }}">
                <span class="focus-input100"></span>
                <span class="label-input100">Nombre</span>
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="wrap-input100 validate-input" data-validate="El apellido es requerido">
                <input class="input100" type="text" name="paternal" id="paternal" value="{{ old('maternal') }}">
                <span class="focus-input100"></span>
                <span class="label-input100">Apellido Paterno</span>
                @error('paternal')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="wrap-input100 validate-input" data-validate="El apellido es requerido">
                <input class="input100" type="text" name="maternal" id="maternal" value="{{ old('maternal') }}">
                <span class="focus-input100"></span>
                <span class="label-input100">Apellido materno</span>
                @error('maternal')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="wrap-input100 validate-input" data-validate="El email no es valido, ejemplo: ex@abc.xyz">
                <input class="input100" type="text" name="email" id="email" value="{{ old('email') }}">
                <span class="focus-input100"></span>
                <span class="label-input100">Correo Electronico</span>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="wrap-input100 validate-input" data-validate="La contaseña es requerida">
                <input class="input100" type="password" name="password" id="password" value="{{ old('password') }}">
                <span class="focus-input100"></span>
                <span class="label-input100">Contraseña</span>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="wrap-input100 validate-input" data-validate="La contaseña es requerida">
                <input class="input100" type="password" name="password_confirmation" id="password-confirm" autocomplete="new-password">
                <span class="focus-input100"></span>
                <span class="label-input100">Confirmar Contraseña</span>
            </div>
        

            <div class="container-login100-form-btn">
                <button class="login100-form-btn" type="submit">
                    Registrar
                </button>
            </div>

    </form>
@endsection
