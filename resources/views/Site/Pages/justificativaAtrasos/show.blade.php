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
                <h5 class="card-header">Justificativas de Atrasos Listados</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-dark">
                      <tr>
                        <th>#</th>
                        <th>Atraso</th>
                        <th>Descrição</th>
                        <th>Actions</th>
                      </tr>
                    </thead> 
                    @foreach($justificativaAtrasos as $justificativaAtraso)  
                    <tbody class="table-border-bottom-0">
                   
                    <tr>
                        <td>{{$justificativaAtraso->id}}</td>
                        <td>{{$justificativaAtraso->it_id_atraso}}</td>
                        <td>{{$justificativaAtraso->vc_descricao}}</td>
                        <td>
                          <a href="{{route('justificativaAtrasos.edit',$justificativaAtraso->id)}}" class="btn btn-primary "> <i class="bx bx-edit-alt me-1"></i> Edit</a>

                              <form class="btn btn-danger btn-sm" action="{{route('justificativaAtrasos.delete',$justificativaAtraso->id)}}"  method="POST">
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