@extends('Site/layouts/page')
@section('title') Editar Atribuição de Tarefa @endsection
@section('conteudo')

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Editar Atribuição de projecto</h4>
            <p class="card-description">Atualize as informações da atribuição</p>
            
            <form action="{{ route('projectoUsuario.update', $projectoUsuario->id) }}" method="POST" class="forms-sample">
                @csrf
                @method('PUT')
                
                <!-- Dropdown de Usuários -->
                <div class="form-group">
                    <label for="it_id_usuario">Usuário</label>
                    <select class="form-control" id="it_id_user" name="it_id_user" required>
                        <option value="">Selecione o usuário</option>
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}" 
                                    {{ $projectoUsuario->it_id_user == $usuario->id ? 'selected' : '' }}>
                                {{ $usuario->vc_nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Dropdown de Tarefas -->
                <div class="form-group">
                    <label for="it_id_projecto">projecto</label>
                    <select class="form-control" id="it_id_projecto" name="it_id_projecto" required>
                        <option value="">Selecione a tarefa</option>
                        @foreach ($projectos as $projecto)
                            <option value="{{ $projecto->id }}" 
                                    {{ $projectoUsuario->it_id_projecto == $projecto->id ? 'selected' : '' }}>
                                {{ $projecto->vc_nome }}
                            </option>
                        @endforeach
                    </select>
                </div>                
                <div class="d-flex justify-content-between mt-2">
                    <button type="submit" class="btn btn-primary me-2">Atualizar</button>
                    <a href="{{ route('projectoUsuario.index') }}" class="btn btn-light">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection