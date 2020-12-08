{{-- Extends layout --}}
@extends('layout.default')

{{-- Styles Section --}}
@section('styles')
    <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
@endsection


{{-- Scripts Section --}}
@section('scripts')
    {{-- vendors --}}
    <script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>

    {{-- page scripts --}}
    <script src="{{ asset('js/pages/listUsers/datatable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/app.js') }}" type="text/javascript"></script>
@endsection

{{-- Content --}}
@section('content')

    <div class="card card-custom">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <h3 class="card-label">Lista de Usuários
                    <div class="text-muted pt-2 font-size-sm">Lista de usuários no sistema</div>
                </h3>
            </div>
        </div>

        <div class="card-body">

            <!--begin::Search Form-->
            <div class="mt-2 mb-5 mt-lg-5 mb-lg-10">
                <div class="row align-items-center col-md-12">
                    <div class="col-md-3 my-2 my-md-0">
                        <div class="d-flex align-items-center">
                            <label class="mr-3 mb-0 d-none d-md-block">Privilégio:</label>
                            <select class="form-control kt-selectpicker datatable-input" data-col-index="0"
                                    id="privilege">
                                <option value="" selected>Todos</option>
                                @foreach($privileges as $privilege)
                                    <option
                                        value="{{ $privilege->id }}">{{ $privilege->nm_privilege }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3 my-2 my-md-0">
                        <div class="d-flex align-items-center">
                            <label class="mr-3 mb-0 d-none d-md-block">Nome:</label>
                            <input class="form-control kt-selectpicker datatable-input" data-col-index="1" id="name" name="name" placeholder="Digite o nome">
                        </div>
                    </div>
                    <div class="col-md-3 my-2 my-md-0">
                        <div class="d-flex align-items-center">
                            <label class="mr-3 mb-0 d-none d-md-block">E-mail:</label>
                            <input type="text" class="form-control kt-selectpicker datatable-input" data-col-index="2" id="email" name="email" placeholder="Digite o e-mail">
                        </div>
                    </div>
                    <div class="col-md-3 mt-5 mt-lg-0 text-right">
                      <button id="kt_search" class="btn btn-light-primary px-6 font-weight-bold">
                          Procurar
                      </button>
                    </div>  
                </div>    
            </div>
            <!--end::Search Form-->

            <table class="table table-separate table-checkable dataTable collapsed dtr-inline" id="kt_datatable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Privilégio</th>
                    <th>E-mail</th>
                    <th>Data</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody></tbody>
            </table>

        </div>

    </div>

@endsection
