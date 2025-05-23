@extends('Site/layouts/page')
@section('title') Lista de Frequências @endsection
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
        <h5 class="mb-0">Lista de Frequências</h5>
        <a href="{{ route('frequencia.create') }}" class="btn btn-primary">+ Adicionar</a>
    </div>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-dark">
                <tr>
                    <th>Data</th>
                    <th>Entrada</th>
                    <th>Saída</th>
                    <th>Usuário</th>
                    <th>Tipo</th>
                    <th>Ações</th>
                </tr>
            </thead>

            <tbody class="table-border-bottom-0">
                @forelse ($frequencias as $frequencia)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($frequencia->dt_data)->format('d/m/Y') }}</td>
                    <td>{{ $frequencia->tm_hora_entrada }}</td>
                    <td>{{ $frequencia->tm_hora_saida }}</td>
                    <td>{{ $frequencia->u_nome }}</td>
                    <td>{{ $frequencia->vc_tipo }}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('frequencia.edit', $frequencia->id) }}">
                                    <i class="bx bx-edit-alt me-1"></i> Editar
                                </a>
                                <form action="{{ route('frequencia.destroy', $frequencia->id) }}" method="POST">
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
                    <td colspan="6" class="text-center">Nenhum registro encontrado</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection