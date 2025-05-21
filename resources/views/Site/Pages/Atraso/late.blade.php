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
        <h5 class="mb-0">Vezes em que Atrasei</h5>
        <a href="{{route('justificativaAtraso.index')}}" class="btn btn-secondary">Justificar</a>
    </div>
    
    <div class="text-nowrap">
        <table class="table table-hover table-responsive">
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