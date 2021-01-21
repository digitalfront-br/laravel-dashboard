@extends('layouts.full')

@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="row flexbox-container">
                <div class="col-xl-8 col-11 d-flex justify-content-center">
                    <div class="card bg-authentication mb-0">
                        <div class="row m-0">
                            <div class="col-lg-6 d-lg-block d-none text-center align-self-center px-1 py-0">
                                <img src="/app-assets/images/pages/login.png" alt="branding logo">
                            </div>
                            <div class="col-lg-6 col-12 p-0">
                                <div class="card mb-0 px-2">
                                    <div class="card-header pb-1">
                                        <div class="card-title">
                                            <h4 class="mb-0">{{ __('Bem vindo') }}</h4>
                                        </div>
                                    </div>
                                    <p class="px-2">Faça login para acessar o painel de controle.
                                    </p>
                                    <div class="card-content mb-2">
                                        @error('email')
                                        <div class="alert alert-danger alert-dismissible fade show mx-2" role="alert">
                                            <p class="mb-0">
                                                {{ $message }}
                                            </p>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        @enderror
                                        @error('password')
                                        <div class="alert alert-danger alert-dismissible fade show mx-2" role="alert">
                                            <p class="mb-0">
                                                {{ $message }}
                                            </p>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        @enderror
                                        <div class="card-body pt-1">

                                            <form method="POST" action="{{ route('login') }}">
                                                @csrf
                                                <fieldset
                                                    class="form-label-group form-group position-relative has-icon-left">

                                                    <input id="email" type="text" class="form-control" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email" autofocus placeholder="{{ __('Email') }}"
                                                        required>
                                                    <div class="form-control-position">
                                                        <i class="feather icon-user"></i>
                                                    </div>
                                                    <label for="user-name">Email</label>
                                                </fieldset>

                                                <fieldset class="form-label-group position-relative has-icon-left">

                                                    <input id="password" type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="current-password"
                                                        placeholder="{{ __('Senha') }}">
                                                    <div class="form-control-position">
                                                        <i class="feather icon-lock"></i>
                                                    </div>
                                                    <label for="password">Senha</label>
                                                </fieldset>
                                                <div
                                                    class="form-group d-flex justify-content-between align-items-center">
                                                    <div class="text-left">
                                                        <fieldset class="checkbox">
                                                            <div class="vs-checkbox-con vs-checkbox-primary">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="remember" id="remember"
                                                                    {{ old('remember') ? 'checked' : '' }}>
                                                                <span class="vs-checkbox">
                                                                    <span class="vs-checkbox--check">
                                                                        <i class="vs-icon feather icon-check"></i>
                                                                    </span>
                                                                </span>

                                                                <span class="form-check-label" for="remember">
                                                                    {{ __('Lembrar-me') }}
                                                                </span>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="text-right">
                                                        @if (Route::has('password.request'))
                                                        <a class="card-link" href="{{ route('password.request') }}">
                                                            {{ __('Recuperar senha') }}
                                                        </a>
                                                        @endif</div>
                                                </div>
                                                <button type="submit"
                                                    class="btn btn-primary float-right btn-inline btn-block">
                                                    {{ __('Entrar') }}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </div>
</div>
<!-- END: Content-->
@endsection
