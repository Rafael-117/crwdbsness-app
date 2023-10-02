

@extends('layouts.login')
@section('content')
    <form method="POST" action="{{ route('password.update') }}" class="login100-form validate-form" autocomplete="off">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <span class="login100-form-title p-b-43">
            Restablecer la contraseña
        </span>

        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

    
        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
            <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
            <span class="focus-input100"></span>
            <span class="label-input100">Email</span>
        </div>
        @error('email')
        <span class="text-danger" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror

        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
            <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            <span class="focus-input100"></span>
            <span class="label-input100">Email</span>
        </div>
        @error('password')
        <span class="text-danger" role="alert">
            <strong>{{ $message??"hola" }}</strong>
        </span>
        @enderror

        <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
            <input id="password-confirm" type="password" class="input100" name="password_confirmation" required autocomplete="new-password">
            <span class="focus-input100"></span>
            <span class="label-input100">Email</span>
        </div>

        <div class="container-login100-form-btn">
            <button class="login100-form-btn">
               Restablecer la contraseña
            </button>
        </div>
    </form>
@endsection