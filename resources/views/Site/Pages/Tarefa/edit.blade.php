@extends('Site/layouts/page')
@section('title')Edit User @endsection
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
                    <h4 class="card-title">Criar Tarefa</h4>
                    <p class="card-description">Preencha os campos abaixo.</p>
                    <form action="{{route('tarefa.update')}}"  method="post" class="forms" >
                    @csrf  
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="{{'vc_nome'}}" value="{{'vc_data_entrega'}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Date</label>
                        <input type="date" class="form-control" id="exampleInputPassword4" name="{{'vc_data_entrega'}}" value="{{'vc_data_entrega'}}" >
                      </div>
                      <div class="form-group">
                      <button type="submit" class="btn btn-primary me-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </div>
                    </form>
                    
                  </div>
                </div>
              </div>
@endsection
 
 
 
 
 
