@extends('Site/layouts/page')
@section('title') Lista de Justificativas de Falta @endsection
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
        <h5 class="mb-0">Lista de Faltas</h5>
         <a class="btn btn-secondary" href="{{ route('justificativa_falta.index') }}">
             Justificar faltas
         </a>
    </div>

    <div class="table-responsive text-nowrap">
        <table class="table table-hover table-responsive">
            <thead class="table-dark">
                <tr>
                    <th>Data</th>
                    <th>Entrada</th>
                    <th>Saída</th>
                    <th>Usuário</th>
                    <th>Tipo</th>
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