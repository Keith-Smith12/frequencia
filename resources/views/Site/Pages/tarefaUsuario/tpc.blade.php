@extends('Site/layouts/page')
@section('title') Lista de Tarefas de Usuários @endsection
@section('conteudo')

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Lista de Tarefas de Usuários</h5>
    </div>
    <div class="text-nowrap">
        <table class="table table-hover table-responsive">
            <thead class="table-dark">
                <tr>
                    <th>Data de Atribuição</th>
                    <th>Usuário</th>
                    <th>Tarefa</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse ($tarefaUsuarios as $tarefaUsuario)
                <tr>
                    <td>{{ $tarefaUsuario->dt_data_atribuicao }}</td>
                    <td>{{ $tarefaUsuario->nome_usuario }}</td>
                    <td>{{ $tarefaUsuario->nome_tarefa }}</td>
                    <td>
                    <div class="mb-4 form-check">
                        <input type="checkbox" class="form-check-input" id="ativo" name="ativo" value="1"
                            {{ old('ativo', false) ? 'unchecked' : '' }}>
                        <label class="form-check-label" for="ativo">Tarefa-feita</label>
                    </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Nenhuma tarefa encontrada</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection