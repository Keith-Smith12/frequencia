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
                          <a href="{{route('user.edit',$user->id)}}"> <i class="bx bx-edit-alt me-1"></i> Edit</a>

                              <form action="{{route('user.delete',$user->id)}}"  method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="dropdown-item" type="submit">
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