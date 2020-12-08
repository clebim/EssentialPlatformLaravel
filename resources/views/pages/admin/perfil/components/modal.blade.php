<div class="modal fade" id="modalUser" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title" >
                        <h3 class="card-label">Alterar dados do usuário</h3>
                    </div>
                </div>
                <div class="card-body">
                  <form action="{{ route('perfil.edit', $user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                      <div class=" col-lg-6 my-2 my-md-0">
                          <div class="d-flex align-items-center">
                              <label class="mr-3 mb-0 d-none d-md-block">Privilégio:</label>
                              <select class="form-control kt-selectpicker datatable-input" data-col-index="0" id="privilege_id" name="privilege_id">
                                  @foreach($privileges as $privilege)
                                      <option
                                        @if($user->privilege->id == $privilege->id) selected @endif
                                        value="{{ $privilege->id }}"
                                      >
                                      {{ $privilege->nm_privilege }}
                                      </option>
                                  @endforeach
                              </select>
                          </div>
                      </div>
                      <div class=" col-lg-4 my-2 my-md-0">
                          <div class="d-flex align-items-center">
                              <label class="mr-3 mb-0 d-none d-md-block">Status:</label>
                              <select class="form-control kt-selectpicker datatable-input" data-col-index="0" id="is_active" name="is_active">
                                  <option value="0" @if($user->is_active == 0) selected @endif >Inativo</option>
                                  <option value="1" @if($user->is_active == 1) selected @endif>Ativo</option>
                              </select>
                          </div>
                      </div>
                      <div class="col-lg-2" >
                        <button id="alterar" class="btn btn-hover-bg-success btn-lg btn-text-success btn-hover-text-white border-0 font-weight-bold ">Alterar</button>
                      </div>
                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
