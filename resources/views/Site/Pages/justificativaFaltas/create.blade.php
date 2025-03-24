@extends('Site/layouts/page')
@section('title') TM @endsection
@section('conteudo')

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
         <div class="row">
              <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Criar Justificativa de Falta</h5>
                      <small class="text-muted float-end">Default label</small>
                    </div>
                    <div class="card-body">
                <form action="{{route('justificativaFaltas.store')}}" method="post">
                    @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="it_id_frequencia">Frequência</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <input
                                type="number"
                                required
                                name="{{'it_id_frequencia'}}"
                                class="form-control"
                                aria-describedby="basic-default-email2"
                              />
                          </div>
                          <br>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="vc_descricao">Descrição</label>
                          <div class="col-sm-10">
                            <input
                              type="text"
                              required
                              class="form-control"
                              name="{{'vc_descricao'}}"
                            />
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Create</button>
                          </div>
                        </div>
                      </form> 
                    </div>
              </div>
        </div>                        
@endsection
 
 
 
 
 
