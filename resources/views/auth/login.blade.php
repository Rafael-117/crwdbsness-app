@extends('layouts.login')

@section('content')
    <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
        @csrf

        <span class="login100-form-title p-b-43">
            Inicia sesión para continuar
        </span>


        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
            <input class="input100" type="text" name="email" value="">
            <span class="focus-input100"></span>
            <span class="label-input100">Email</span>


            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="wrap-input100 validate-input" data-validate="Password is required">
            <input class="input100" type="password" name="password">
            <span class="focus-input100"></span>
            <span class="label-input100">Contraseña</span>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

        </div>

        <div class="flex-sb-m w-full p-t-3 p-b-32">
            <div class="contact100-form-checkbox">
                <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember"
                    {{ old('remember') ? 'checked' : '' }}>
                <label class="label-checkbox100" for="ckb1">
                    Recordarme
                </label>
            </div>
        </div>


        <div class="container-login100-form-btn">
            <button class="login100-form-btn">
                Login
            </button>
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Olvidaste tu contraseña') }}
                </a>
            @endif

        </div>
    </form>
@endsection
