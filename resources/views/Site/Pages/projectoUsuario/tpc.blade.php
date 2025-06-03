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
        <h5 class="mb-0">Lista de projecto de Usuários</h5>
        <a href="{{ route('projectoUsuario.create') }}" class="btn btn-primary">
            + Adicionar
        </a>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Usuário</th>
                    <th>projecto</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @forelse ($projectoUsuarios as $projectoUsuario)
                <tr>
                    <td>{{ $projectoUsuario->id }}</td>
                    <td>{{ $projectoUsuarioUsuario->nome_usuario }}</td>
                    <td>{{ $projectoUsuariorUsuario->nome_tarefa }}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <form action="{{ route('projectoUsuario.destroy', $projectoUsuario->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item" onclick="return confirm('Tem certeza que deseja sair?')">
                                        <i class="bx bx-trash me-1"></i>sair
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">Nenhum usuário selecionado para projecto</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection