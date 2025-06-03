@extends('Site/layouts/page')
@section('title') Lista de Tarefas @endsection
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
        <h5 class="mb-0">Lista de Tarefas</h5>
        <a href="{{ route('tarefa.create') }}" class="btn btn-primary">
            + Adicionar Nova Tarefa
        </a>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Categoria de Tarefa</th>
                    <th>Projecto</th>
                    <th>Data de Entrega</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse ($tarefas as $tarefa)
                <tr>
                    <td>{{ $tarefa->id }}</td>
                    <td>{{ $tarefa->vc_nome }}</td>
                    <td>{{ $tarefa->categoria_nome }}</td>
                    <td>{{ $tarefa->projeto_nome }}</td>
                    <td>{{ \Carbon\Carbon::parse($tarefa->dt_data_entrega)->format('d/m/Y H:i') }}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('tarefa.show', $tarefa->id) }}">
                                    <i class="bx bx-show me-1"></i> Visualizar
                                </a>
                                <a class="dropdown-item" href="{{ route('tarefa.edit', $tarefa->id) }}">
                                    <i class="bx bx-edit-alt me-1"></i> Editar
                                </a>
                                <form action="{{ route('tarefa.destroy', $tarefa->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item" onclick="return confirm('Tem certeza que deseja excluir esta tarefa?')">
                                        <i class="bx bx-trash me-1"></i> Excluir
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="10" class="text-center">Nenhuma tarefa encontrada</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection