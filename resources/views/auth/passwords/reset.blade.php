@extends('auth.base')

<title>Nova senha?</title>

{{-- Scripts Section --}}
@section('styles')
    <link href="{{ asset('css/pages/login/classic/login-1.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('scripts')
    <script src="{{ asset('js/validators/forgotPassword/validatorReset.js') }}" ></script>
@endsection


@section('content-body')
    <!--begin::Content body-->
    <div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0">
        <!--begin::Forgot-->
        <div class="login-form login-signin">
            <div class="text-center mb-10 mb-lg-20">
                <h4 class="font-size-h1">Entre com a nova senha</h4>
            </div>
            <!--begin::Form-->
            <form class="form" id="resetForm" method="post" action="{{ route('password.update') }}">
                @csrf
                <div class="form-group">
                    <input 
                        class="form-control form-control-solid h-auto py-5 px-6" 
                        type="password" 
                        placeholder="Nova senha" 
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
                <div class="form-group">
                    <input class="form-control form-control-solid h-auto py-5 px-6" 
                        type="hidden"  
                        name="token"
                        id="token" 
                        value="{{ $token }}" 
                    /> 
                </div>
                <div class="form-group">
                    <input class="form-control form-control-solid h-auto py-5 px-6" 
                        type="hidden"  
                        name="email"
                        id="email" 
                        value="{{ request()->query('email') }}" 
                    /> 
                </div>
                <div class="form-group d-flex flex-wrap justify-content-between align-items-center">
                    <button 
                        type="submit" 
                        id="button_form" 
                        class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4"
                    >Enviar
                    </button>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Forgot-->
    </div>
    <!--end::Content body-->
@endsection
