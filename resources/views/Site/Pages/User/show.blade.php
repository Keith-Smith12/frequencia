@extends('Site/layouts/page')
@section('title') Listando... @endsection
@section('conteudo')

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
        <div class="card d-flex">
                <h5 class="card-header">Usuários Listados</h5>
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead class="table-dark">
                      <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>email</th>
                        <th>Actions</th>
                      </tr>
                    </thead> 
                    @foreach($users as $user)  
                    <tbody class="table-border-bottom-0">
                   
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>

                            <form action="{{route('user.edit',$user->id)}}" method="post">
                            @method('PUT')
                             @csrf
                              <button class="dropdown-item">
                                <i class="bx bx-edit-alt me-1"></i> Edit
                              </button>
                             </form>
                              <form action="{{route('user.delete',$user->id)}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button class="dropdown-item" type="submit">
                                  <i class="bx bx-trash me-1"></i> Delete
                                </button>
                        </td>
                      </tr>
                      
                    </tbody>
                    @endforeach
                  </table>
                </div>
              </div>
@endsection