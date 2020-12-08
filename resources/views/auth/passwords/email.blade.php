@extends('auth.base')

<title>Esqueceu a senha?</title>

{{-- Scripts Section --}}
@section('styles')
    <link href="{{ asset('css/pages/login/classic/login-1.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('scripts')
    <script src="{{ asset('js/validators/forgotPassword/validator.js') }}" ></script>
@endsection

@section('content-body')
    <!--begin::Content body-->
    <div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0">
        <!--begin::Forgot-->
        <div class="login-form login-signin">
            <div class="text-center mb-10 mb-lg-20">
                <h3 class="font-size-h1">Esqueceu a senha ?</h3>
                <p class="text-muted font-weight-bold">Entre com o e-mail cadastrado para prosseguir com a solicitação</p>
            </div>
            <!--begin::Form-->
            <form class="form" id="forgotForm" method="post" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group">
                    <input class="form-control form-control-solid h-auto py-5 px-6 @error('email') is-invalid @enderror" type="email" id="email" placeholder="Email" name="email" autocomplete="off" />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                    <a href="{{ route('login') }}" class="text-dark-50 text-hover-primary my-3 mr-2" id="kt_login_forgot">Já possui conta?</a>
                    <button type="submit" id="kt_login_forgot_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Enviar</button>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Forgot-->
    </div>
    <!--end::Content body-->
@endsection
