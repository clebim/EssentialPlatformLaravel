{{-- Extends layout --}}
@extends('layout.default')

@section('content')

<div class="card card-custom gutter-b">
  <div class="card-header flex-wrap py-3">
    <div class="card-title">
      <h3 class="card-label">Usuários no sistema
      <span class="d-block text-muted pt-2 font-size-base">Lista de usuários aprovados no sistema</span></h3>
    </div>
  </div>

  <div class="card-body">
    <table class="table table-separate table-checkable dataTable collapsed dtr-inline  " id="kt_datatable">
      <thead>
        <tr>
          <th class="font-size-h5">id</th>
          <th class="font-size-h5">Nome (a)</th>
          <th class="font-size-h5">Privilégio</th>
          <th class="font-size-h5">E-mail</th>
          <th class="font-size-h5">Data</th>
        </tr>
      </thead>
      <tbody>
          @if(count($users) != 0)
            @foreach($users as $user)
              <tr>
                <td class="font-size-h5 align-middle" >#{{ $user->id }}</td>
                <td class="font-size-h5 align-middle " >{{ $user->name }}</td>
                <td class="font-size-h5 align-middle" >{{ $user->privilege->nm_privilege }}</td>
                <td class="font-size-h5 align-middle" >{{ $user->email }}</td>
                <td class="font-size-h5 align-middle" >{{ $user->date }}</td>
              </tr>
            @endforeach
          @endif
      </tbody>
    </table>
    <div class="float-right" >{{ $users->links() }}</div>
    @if(count($users) == 0)
        <div class="d-flex align-items-center justify-content-center" >
            <span class="text-dark-75 mt-5" >Não há usuários</span>
        </div>
    @endif 
  </div>
</div>    

@endsection

  