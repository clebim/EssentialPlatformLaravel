@extends('auth.base')

{{-- Scripts Section --}}
@section('styles')
    <link href="{{ asset('css/pages/login/classic/login-1.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content-body')

<div class="d-flex flex-column-fluid flex-center align-items-center justify-content-center">

  <div>
      <div class="text-center mb-10 mb-lg-20">
        <h2 class="font-size-h1">E-mail enviado com sucesso</h2>
        <p class="text-muted font-weight-bold h3 mt-5 mb-10">Acesse seu e-mail e proceda com a alteração de senha</p>
        <a href="{{ route('login') }}" class="text-dark-50 text-hover-primary font-size-h4" id="go_login">Ir para login?</a>            
      </div>
  </div>
</div>

@endsection