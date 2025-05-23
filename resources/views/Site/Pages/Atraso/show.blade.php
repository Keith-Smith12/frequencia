@extends('Site/layouts/page')
@section('title') Lista de Usuários @endsection
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
        <h5 class="mb-0">Lista de Atrasos</h5>
        <a href="{{ route('atraso.create') }}" class="btn btn-primary">+ Adicionar</a>
    </div>
    
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Usuário</th>
                    <th>Tarefa</th>
                    <th>Quantidade de Dias</th>
                    <th>Ações</th>
                </tr>
            </thead>
            
            <tbody class="table-border-bottom-0">
                @forelse ($atrasos as $atraso)
                <tr>
                    <td>{{ $atraso->id }}</td>
                    <td>{{ $atraso->usuario }}</td>
                    <td>{{ $atraso->tarefa }}</td> 
                    <td>{{ $atraso->qtd_dias }}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('atraso.edit', $atraso->id) }}">
                                    <i class="bx bx-edit-alt me-1"></i> Editar
                                </a>
                                <form action="{{ route('atraso.destroy', $atraso->id) }}" method="POST" class="d-inline">
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