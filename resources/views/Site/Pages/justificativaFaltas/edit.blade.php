@extends('Site/layouts/page')
@section('title')Edit Justificativa de Atraso @endsection
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
                    <h4 class="card-title">Editar Justificativa de Falta</h4>
                    <p class="card-description">Edite abaixo os campos.</p>
                    <form action="{{route('justificativaFaltas.update',$justificativaFaltas->id)}}"  method="POST">
                      @method('PUT')
                      @csrf
                      <div class="form-group">
                        <label for="it_id_frequencia">Frequência</label>
                        <input type="number" class="form-control" name="{{'it_id_frequencia'}}" value="{{$justificativaFaltas->it_id_frequencia}}">
                      </div>
                      <div class="form-group">
                        <label for="vc_descricao">Descrição</label>
                        <input type="text" class="form-control" name="{{'vc_descricao'}}" value="{{$justificativaFaltas->vc_descricao}}">
                      </div>
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
@endsection
 
 
 

 
