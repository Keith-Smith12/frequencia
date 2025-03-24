@extends('Site/layouts/page')
@section('title')Edit atraso @endsection
@section('conteudo')

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Editar Atraso</h4>
                    <p class="card-description">Edite abaixo os campos.</p>
                    <form action="{{route('atrasos.update',$atrasos->id)}}"  method="POST">
                      @method('PUT')
                      @csrf
                      <div class="form-group">
                        <label for="it_id_tarefa_usuario">Tarefa de usuarios</label>
                        <input type="number" class="form-control" name="{{'it_id_tarefa_usuario'}}" value="{{$atrasos->it_id_tarefa_usuario}}">
                      </div>
                      <div class="form-group">
                        <label for="qtd_dias">Quantidade de dias</label>
                        <input type="number" class="form-control" name="{{'qtd_dias'}}" value="{{$atrasos->qtd_dias}}">
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
@endsection
 
 
 

 
