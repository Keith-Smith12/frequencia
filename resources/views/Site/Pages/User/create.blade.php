@extends('Site/layouts/page')
@section('title') Criar Usuário @endsection
@section('conteudo')
<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Registrar Usuário</h5>
                <small class="text-muted float-end">Preencha os campos abaixo</small>
            </div>
            <div class="card-body">
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <form action="{{ route('user.store') }}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="vc_nome">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="vc_nome" placeholder="Nome completo" name="vc_nome" required/>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="email">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" placeholder="exemplo@dominio.com" name="email" required/>
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="vc_classe">Classe</label>
                        <div class="col-sm-10">
                        <select class="form-select" id="vc_classe" name="{{'vc_classe'}}" required>
                            <option value="">Selecione uma classe</option>
                            <option value="10ª">10ª</option>
                            <option value="11ª">11ª</option>
                            <option value="12ª" >12ª</option>
                            <option value="finalista">13ª</option>
                        </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="password">Senha</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password" name="password" required/>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Criar Usuário</button>
                            <a href="{{route('user.all')}}" class="btn btn-secondary">Cancelar</a>
                        </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection