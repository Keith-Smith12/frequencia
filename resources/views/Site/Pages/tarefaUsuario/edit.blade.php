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
            <h4 class="card-title">Editar Atribuição de Tarefa</h4>
            <p class="card-description">Atualize as informações da atribuição</p>
            
            <form action="{{ route('tarefaUsuario.update', $tarefaUsuario->id) }}" method="POST" class="forms-sample">
                @csrf
                @method('PUT')
                
                <!-- Dropdown de Usuários -->
                <div class="form-group">
                    <label for="it_id_usuario">Usuário</label>
                    <select class="form-control" id="it_id_usuario" name="it_id_usuario" required>
                        <option value="">Selecione o usuário</option>
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}" 
                                    {{ $tarefaUsuario->it_id_usuario == $usuario->id ? 'selected' : '' }}>
                                {{ $usuario->vc_nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Dropdown de Tarefas -->
                <div class="form-group">
                    <label for="it_id_tarefa">Tarefa</label>
                    <select class="form-control" id="it_id_tarefa" name="it_id_tarefa" required>
                        <option value="">Selecione a tarefa</option>
                        @foreach ($tarefas as $tarefa)
                            <option value="{{ $tarefa->id }}" 
                                    {{ $tarefaUsuario->it_id_tarefa == $tarefa->id ? 'selected' : '' }}>
                                {{ $tarefa->vc_nome }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="dt_data_atribuicao">Data de Atribuição</label>
                    <input type="date" class="form-control" id="dt_data_atribuicao" name="dt_data_atribuicao" required
                           value="{{ $tarefaUsuario->dt_data_atribuicao }}">
                </div>
                
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary me-2">Atualizar</button>
                    <a href="{{ route('tarefaUsuario.index') }}" class="btn btn-light">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection