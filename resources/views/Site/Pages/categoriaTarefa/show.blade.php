@extends('Site/layouts/page')
@section('title') Lista de Categorias de Tarefa @endsection
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
        <h5 class="mb-0">Lista de Categorias de Tarefa</h5>
        <a href="{{ route('CategoriaTarefa.create') }}" class="btn btn-primary">+ Adicionar</a>
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Prioridade</th>
                    <th>Tempo Estimado</th>
                    <th>Tipo</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody class="table-border-bottom-0">
                @forelse ($categoriasTarefas as $categoriaTarefa)
                <tr>
                    <td>{{ $categoriaTarefa->id }}</td>
                    <td>{{ $categoriaTarefa->vc_nome }}</td>
                    <td>{{ $categoriaTarefa->vc_descricao }}</td>
                    <td>{{ $categoriaTarefa->vc_prioridade }}</td>
                    <td>{{ $categoriaTarefa->it_tempo_estimado }}</td>
                    <td>{{ $categoriaTarefa->vc_tipo }}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('CategoriaTarefa.edit', $categoriaTarefa->id) }}">
                                    <i class="bx bx-edit-alt me-1"></i> Editar
                                </a>
                                <form action="{{ route('CategoriaTarefa.destroy', $categoriaTarefa->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item" onclick="return confirm('Tem certeza que deseja excluir?')">
                                        <i class="bx bx-trash me-1"></i> Excluir
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Nenhuma categoria encontrada</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection