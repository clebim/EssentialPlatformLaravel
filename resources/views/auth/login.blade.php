@extends('auth.base')

{{-- Scripts Section --}}
@section('styles')
    <link href="{{ asset('css/pages/login/classic/login-1.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('scripts')
    <script src="{{ asset('js/validators/login/validator.js') }}" ></script>
@endsection

@section('content-header')
    <!--begin::Content header-->
    <div class="position-absolute top-0 right-0 text-right mt-5 mb-15 mb-lg-0 flex-column-auto justify-content-center py-5 px-10">
        <span class="font-weight-bold text-dark-50">Não possui uma conta ?</span>
        <a href="{{ route('register') }}" class="font-weight-bold ml-2" id="kt_login_signup">Cadastrar!</a>
    </div>
    <!--end::Content header-->
@endsection

@section('content-body')
    <!--begin::Content body-->
    <div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0">
        <!--begin::Signin-->
        <div class="login-form login-signin">
            <div class="text-center mb-10 mb-lg-20">
                <h3 class="font-size-h1">Acessar Sistema</h3>
                <p class="text-muted font-weight-bold">Entre com suas credencias</p>
            </div>
            <!--begin::Form-->
            <form class="form" method="post" action="{{ route('login') }}" id="loginForm">
                @csrf

                <div class="form-group">
                    <input class="form-control form-control-solid h-auto py-5 px-6 @error('email') is-invalid @enderror" type="text" placeholder="E-mail" name="email" autocomplete="off" />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @if($errors->has('messageVerification'))
                        <span class="custom-invalid-feedback" role="alert" >
                            <strong>
                                {{$errors->first()}}
                            </strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <input class="form-control form-control-solid h-auto py-5 px-6 @error('password') is-invalid @enderror" type="password" placeholder="Senha" name="password" autocomplete="off" />
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                             
                <!--begin::Action-->
                <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                    <a href="{{ route('password.request') }}" class="text-dark-50 text-hover-primary my-3 mr-2" id="kt_login_forgot">Esqueceu a senha?</a>
                    <button type="submit" id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3">Acessar</button>
                </div>    
                <!--end::Action-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Signin-->
    </div>
    <!--end::Content body-->
@endsection
