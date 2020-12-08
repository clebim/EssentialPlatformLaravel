{{-- Extends layout --}}
@extends('layout.default')

@section('scripts')
    <script src="{{ asset('js/pages/approvalPage/functions.js') }}" ></script>
@endsection

@section('content')

    @if(session('success'))
        POSSUI
        @if(session('success') == false)
            @include('components.custom_alert', ['icon' => 'fas fa-exclamation-circle', 'class' => 'danger', 'message' => session('message')])
        @else
            @include('components.custom_alert', ['icon' => 'fas fa-check-circle', 'class' => 'success', 'message' => session('message')])
        @endif
    @endif

    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h3 class="card-label">Usuários em aprovação
                    <span class="d-block text-muted pt-2 font-size-base">Lista de usuários aguardando aprovação</span></h3>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-separate table-checkable dataTable collapsed dtr-inline  " id="kt_datatable">
                <thead>
                <tr>
                    <th class="font-size-h5" >Cód.</th>
                    <th class="font-size-h5" >Nome (a)</th>
                    <th class="font-size-h5" >E-mail</th>
                    <th class="font-size-h5" >Data e hora</th>
                    <th class="font-size-h5" ><span class="d-flex justify-content-center" >Opções</span></th>
                </tr>
                </thead>
                <tbody>
                @if(count($approvingUsers) != 0)
                    @for($i=0; $i < count($approvingUsers); $i++)
                        <tr id="table-row-{{$approvingUsers[$i]->id}}">
                            <td class="align-middle font-size-h5" >#{{ $approvingUsers[$i]->id }}</td>
                            <td class="align-middle font-size-h5 " >{{ $approvingUsers[$i]->name }}</td>
                            <td class="align-middle font-size-h5 " >{{ $approvingUsers[$i]->email }}</td>
                            <td class="align-middle font-size-h5 " >{{ $approvingUsers[$i]->created_at }}</td>
                            <td class="align-middle font-size-h5 " >
                                <div class="d-flex justify-content-center">
                                    <a class="btn btn-sm btn-primary btn-icon" role="button" data-toggle="modal" data-target="#modalUser"
                                       data-index="{{ $approvingUsers[$i] }}" data-url="{{ request()->fullUrl() }}">
                                        <i class="fa fa-info-circle fa-md"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endfor
                @endif       
                </tbody>
            </table>
            <div class="float-right" >{{ $approvingUsers->links() }}</div>
            @if(count($approvingUsers) == 0)
                <div class="d-flex align-items-center justify-content-center" >
                    <span class="text-dark-75 mt-5" >Não há usuários para aprovação</span>
                </div>
            @endif 
            @include('pages.admin.onApproval.components.modal_approval')
        </div>
        
    </div>
@endsection
