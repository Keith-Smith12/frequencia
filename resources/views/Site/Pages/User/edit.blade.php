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
                    <h4 class="card-title">Editar Usuário</h4>
                    <p class="card-description">Edite abaixo os campos.</p>
                    <form action="{{route('user.update',$user->id)}}"  method="post" class="forms" >
                    @csrf  
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="{{'vc_nome'}}" value="{{$user->vc_nome}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail3" name="{{'email'}}" value="{{$user->email}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword4">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword4" name="{{'password'}}" >
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
 
 
 
 
 
