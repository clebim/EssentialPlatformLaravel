{{-- Extends layout --}}
@extends('layout.default')

@section('content')
    <div class="card card-custom gutter-b card-body col-lg-12">
        <div class="card-header d-flex flex-wrap py-3">
            <div class="card-title d-flex justify-content-lg-between row">
                <h3 class="card-label">Informações do perfil</h3>
            </div>
            @if(session('success'))
                <div class="alert alert-success">
                    <span class="font-size-h4-lg">{{ session('success') }}</span>
                </div>
            @endif 
            @if(session('error'))
                <div class="alert alert-danger">
                    <span class="font-size-h4-lg">{{ session('error') }}</span>
                </div>
            @endif   
            <div class="card-toolbar">
                <a href="{{ route('list.users') }}" class="btn btn-outline-secondary btn-md">
                    <span><i class="fa fa-arrow-left"></i></span>
                    <span class="font-size-h6-sm">Voltar</span>
                </a>
                <button type="button" class="btn btn-success btn-md ml-5" data-toggle="modal" data-target="#modalUser">
                    <span><i class="fa fa-user-edit"></i></span>
                    <span class="font-size-h6-sm">Editar</span>
                </button>
            </div>
        </div>

        <div class="d-flex justify-content-lg-between card-body">
            <div class="col-lg-3 d-flex flex-column flex-center">
                <div class="symbol symbol-circle symbol-150 symbol-light-success">
                    <span class="symbol-label font-size-h1-lg">{{ $user->getInitials() }}</span>
                </div>
            </div>
            <div class="col-lg-9 column">
                <div class="mt-5 mb-5">
                    <h4 class="text-dark-50" >Nome</h4>
                    <span class="text-dark-75 font-weight-bolder font-size-h5-lg">{{ $user->name }}</span>
                </div>
                <div class="mt-5 mb-5"> 
                    <h4 class="text-dark-50">E-mail</h4>
                    <span  class="text-dark-75 font-weight-bolder font-size-h5-lg" >{{ $user->email }}</span>
                </div>
                <div class="mt-5 mb-5"> 
                    <h4 class="text-dark-50">Privilégio</h4>
                    <span  class="text-dark-75 font-weight-bolder font-size-h5-lg" >{{ $user->privilege->nm_privilege }}</span>
                </div>
                <div class="mt-5 mb-5"> 
                    <h4 class="text-dark-50" >Data/Hora de cadastro</h4>
                    <span  class="text-dark-75 font-weight-bolder font-size-h5-lg" >{{ $user->created_at }}</span>
                </div>
                
            </div>
            @include('pages.admin.perfil.components.modal')
        </div>
    </div>
@endsection
