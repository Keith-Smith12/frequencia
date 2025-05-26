@extends('Site/layouts/page')
@section('title') Atribuir Tarefa a Usuário @endsection
@section('conteudo')
<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Atribuir Tarefa</h5>
                <small class="text-muted float-end">Preencha os campos abaixo</small>
            </div>
            <div class="card-body">
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <form action="{{ route('tarefaUsuario.store') }}" method="post">
                    @csrf
                    <!-- Dropdown de Usuários -->
                    <div class="form-group mb-3">
                        <label for="it_id_usuario" class="form-label">Usuário</label>
                        <select class="form-select" id="it_id_usuario" name="it_id_usuario" required>
                            <option value="">Selecione o usuário</option>
                            @foreach ($usuarios as $usuario)
                                <option value="{{ $usuario->id }}" 
                                        {{ old('it_id_usuario', $tarefaUsuario->it_id_usuario ?? '') == $usuario->id ? 'selected' : '' }}>
                                    {{ $usuario->vc_nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Dropdown de Tarefas -->
                    <div class="form-group mb-3">
                        <label for="it_id_tarefa" class="form-label">Tarefa</label>
                        <select class="form-select" id="it_id_tarefa" name="it_id_tarefa" required>
                            <option value="">Selecione a tarefa</option>
                            @foreach ($tarefas as $tarefa)
                                <option value="{{ $tarefa->id }}" 
                                        {{ old('it_id_tarefa', $tarefaUsuario->it_id_tarefa ?? '') == $tarefa->id ? 'selected' : '' }}>
                                    {{ $tarefa->vc_nome }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label for="dt_data_atribuicao" class="form-label">Data de Atribuição</label>
                        <input type="date" class="form-control" id="dt_data_atribuicao" name="dt_data_atribuicao" required
                               value="{{ old('dt_data_atribuicao', $tarefaUsuario->dt_data_atribuicao ?? '') }}">
                    </div>
                    
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('tarefaUsuario.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Atribuir Tarefa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection