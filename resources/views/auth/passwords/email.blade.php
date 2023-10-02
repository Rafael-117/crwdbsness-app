@extends('layouts.login')
@section('content')
    <form method="POST" action="{{ route('password.email') }}" class="login100-form validate-form" autocomplete="off">
        @csrf
        <span class="login100-form-title p-b-43">
            Restablecer la contraseña
        </span>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

    
        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
            <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}" required autocomplete="email" autofocus>
            <span class="focus-input100"></span>
            <span class="label-input100">Email</span>
        </div>


        @error('email')
        <span class="text-danger" role="alert">
            <strong>{{ $message??"hola" }}</strong>
        </span>
        @enderror
        
        <div class="container-login100-form-btn">
            <button class="login100-form-btn">
                Enviar
            </button>
        </div>
    </form>
@endsection
