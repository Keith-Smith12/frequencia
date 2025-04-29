@extends('Site/layouts/page')
@section('title') Nicolaudio @endsection
@section('conteudo')
         <div class="row">
              <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Registre</h5>
                      <small class="text-muted float-end">Criando uma conta</small>
                    </div>
                    <div class="card-body">
                    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif    
                <form action="{{route('user.store')}}" method="post">
                    @csrf
                    <div class="row mb-3">
                         <label class="col-sm-2 col-form-label" for="basic-default-name">Name</label>
                         <div class="col-sm-10">
                           <input type="text" class="form-control" id="basic-default-name" placeholder="John Doe" name="{{'name'}}" required/>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <input
                                type="email"
                                required
                                name="{{'email'}}"
                                id="basic-default-email"
                                class="form-control"
                                placeholder="john.doe"
                                aria-describedby="basic-default-email2"
                              />
                              <span class="input-group-text" id="basic-default-email2">@example.com</span>
                            </div>
                            <div class="form-text">You can use letters, numbers & periods</div>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="basic-default-phone">Password</label>
                          <div class="col-sm-10">
                            <input
                              type="password"
                              required
                               name="{{'email'}}"
                              id="basic-default-passwod"
                              class="form-control"
                              name="{{'password'}}"
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
 
 
 
 
 
