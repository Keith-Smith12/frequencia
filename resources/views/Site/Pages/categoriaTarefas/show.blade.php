@extends('Site/layouts/page')
@section('title') Todos os users @endsection
@section('conteudo')
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@elseif (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
        <div class="card d-flex">
                <h5 class="card-header">Categoria de Tarefas Listadas</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-dark">
                      <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Prioridade</th>
                        <th>Prazo</th>
                        <th>tipo</th>
                        <th>Actions</th>
                      </tr>
                    </thead> 
                    @foreach($categoriaTarefas as $categoriaTarefa)  
                    <tbody class="table-border-bottom-0">
                   
                    <tr>
                        <td>{{$categoriaTarefa->id}}</td>
                        <td>{{$categoriaTarefa->vc_nome}}</td>
                        <td>{{$categoriaTarefa->vc_descricao}}</td>
                        <td>{{$categoriaTarefa->vc_prioridade}}</td>
                        <td>{{$categoriaTarefa->it_tempo_estimado}}</td>
                        <td>{{$categoriaTarefa->vc_tipo}}</td>
                        <td>
                          <a href="{{route('categoriaTarefas.edit',$categoriaTarefa->id)}}" class="btn btn-primary "> <i class="bx bx-edit-alt me-1"></i> Edit</a>

                              <form class="btn btn-danger btn-sm" action="{{route('categoriaTarefas.delete',$categoriaTarefa->id)}}"  method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger btn-sm btn-sm" type="submit">
                                  <i class="bx bx-trash me-1"></i> Delete
                                </button>
                              </form>
                        </td>
                      </tr>
                      
                    </tbody>
                    @endforeach
                  </table>
                </div>
              </div>
@endsection