@extends('Site/layouts/page')
@section('title') Lista de Justificativas de Atraso @endsection
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
        <h5 class="mb-0">Lista de Justificativas de Atraso</h5>
        <a href="{{ route('justificativaAtraso.create') }}" class="btn btn-primary">+ Adicionar</a>
    </div>

    <div class="text-nowrap">
        <table class="table table-hover table-responsive">
            <thead class="table-dark">
                <tr>
                    <th>Justificativa de Atraso</th>
                    <th>Tarefa</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody class="table-border-bottom-0">
                @forelse ($justificativasAtraso as $justificativa)
                <tr>
                    <td>{{ $justificativa->usuario }}</td>
                    <td>{{ $justificativa->tarefa }}</td>
                    <td>{{ $justificativa->vc_descricao }}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('justificativaAtraso.edit', $justificativa->id) }}">
                                    <i class="bx bx-edit-alt me-1"></i> Editar
                                </a>
                                <form action="{{ route('justificativaAtraso.destroy', $justificativa->id) }}" method="POST" class="d-inline">
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
                        <td colspan="7" class="text-center">Nenhum projeto encontrado</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection