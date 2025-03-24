@extends('Site/layouts/page')
@section('title')Edit @endsection
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
                    <h4 class="card-title">Editar Categoria de Tarefas</h4>
                    <p class="card-description">Edite abaixo os campos.</p>
                    <form action="{{route('categoriaTarefas.update',$categoriaTarefas->id)}}"  method="POST">
                      @method('PUT')
                      @csrf
                      <div class="form-group">
                        <label for="vc_nome">Nome</label>
                        <input type="text" class="form-control" name="{{'vc_nome'}}" value="{{$categoriaTarefas->vc_nome}}">
                      </div>
                      <br>
                      <div class="form-group">
                        <label for="vc_descricao">Descrição</label>
                        <input type="text" class="form-control" name="{{'vc_descricao'}}" value="{{$categoriaTarefas->vc_descricao}}">
                      </div>
                      <br>
                      <div class="form-group">
                        <label for="vc_prioridade">Prioridade</label>
                        <input type="text" class="form-control" name="{{'vc_prioridade'}}" value="{{$categoriaTarefas->vc_prioridade}}">
                      </div>
                      <br>
                      <div class="form-group">
                        <label for="it_tempo_estimado">Prazo</label>
                        <input type="number" class="form-control" name="{{'it_tempo_estimado'}}" value="{{$categoriaTarefas->it_tempo_estimado}}">
                      </div>
                      <br>
                      <div class="form-group">
                        <label for="vc_tipo">Tipo</label>
                        <input type="text" class="form-control" name="{{'vc_tipo'}}" value="{{$categoriaTarefas->vc_tipo}}">
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
@endsection
 
 
 

 
