@extends('auth.base')

{{-- Scripts Section --}}
@section('styles')
    <link href="{{ asset('css/pages/login/classic/login-1.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('scripts')
    <script src="{{ asset('js/validators/register/validator.js') }}" ></script>
@endsection

@section('content-header')
    <!--begin::Content header-->
    <div class="position-absolute top-0 right-0 text-right mt-5 mb-15 mb-lg-0 flex-column-auto justify-content-center py-5 px-10">
        <span class="font-weight-bold text-dark-50">Já possui uma conta ?</span>
        <a href="{{ route('login') }}" class="font-weight-bold ml-2" id="kt_login_signup">Entrar!</a>
    </div>
    <!--end::Content header-->
@endsection

@section('content-body')
    <!--begin::Content body-->
    <div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0">
        <!--begin::Signup-->
        <div class="login-form login-signin">
            <div class="text-center mb-10 mb-lg-20">
                <h3 class="font-size-h1">Registrar</h3>
                <p class="text-muted font-weight-bold">Entre com as informações abaixo para efetuar o registro</p>
            </div>
            <!--begin::Form-->
            <form class="form" id="RegisterForm" method="post" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <input
                        class="form-control form-control-solid h-auto py-5 px-6"
                        type="text"
                        placeholder="Nome completo"
                        name="name"
                        id="name"
                        autocomplete="off"
                        autofocus
                    />
                </div>
                <div class="form-group">
                    <input class="form-control form-control-solid h-auto py-5 px-6"
                        type="email"
                        placeholder="E-mail"
                        name="email"
                        id="email"
                        autocomplete="off"
                    />
                </div>
                <div class="form-group">
                    <input class="form-control form-control-solid h-auto py-5 px-6"
                        type="password"
                        placeholder="Senha"
                        name="password"
                        id="password"
                        autocomplete="off"
                    />
                </div>
                <div class="form-group">
                    <input class="form-control form-control-solid h-auto py-5 px-6"
                        type="password"
                        placeholder="Confirmar a Senha"
                        name="password_confirmation"
                        id="password_confirmation"
                        autocomplete="off"
                    />
                </div>
                <div class="form-group text-center">
                    <span></span>&nbsp;Ao prosseguir com o registro você aceita e confirma os
                    <a href="#">&nbsp;termos de uso e política de privacidade</a>
                </div>
                <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                    <a href="{{ route('login') }}" class="text-dark-50 text-hover-primary my-3 mr-2" id="kt_login_forgot">Já possui conta?</a>
                    <button type="submit" id="register_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Registrar</button>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Signup-->

    </div>
    <!--end::Content body-->
@endsection
