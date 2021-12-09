@extends('layouts.app')

@section('body-class', 'sign-in-basic')

@section('content')
<div class="col-lg-4 col-md-10 col-12 mx-auto mt-4">
    <div class="card z-index-0 fadeIn3 fadeInBottom">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Iniciar sesión</h4>
            </div>
        </div>
        <div class="card-body">
            <form role="form" class="text-start" action="{{ route('login') }}" method="POST">
            @csrf
                <div class="input-group input-group-outline my-3">
                    <label class="form-label">{{ __('E-Mail') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="input-group input-group-outline mb-3">
                    <label class="form-label">{{ __('Contraseña') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input class="form-check-input" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label mb-0 ms-2" for="remember">Recordarme</label>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">{{ __('Entrar') }}</button>
                </div>
                <p class="mt-4 text-sm text-center">
                    {{ __('Perdiste tu cuenta?') }}
                    @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-primary text-gradient font-weight-bold">{{ __('Recuperar') }}</a>
                    @endif
                </p>
            </form>
        </div>
    </div>
</div>
@endsection