@extends('Site/layouts/page')
@section('title') Lista de Projetos @endsection
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
        <h5 class="mb-0">Lista de Projetos </h5>
        <a href="{{ route('tarefaUsuario.index')}}" class="btn btn-primary">Tarefas do Projecto</a>
    </div>

    <div class="text-nowrap">
        <table class="table table-hover table-responsive">
            <thead class="table-dark">
                <tr>
                    <th>Nome</th>
                    <th>Início</th>
                    <th>Conclusão</th>
                    <th>Progresso</th>
                    <th>Prioridade</th>
                    <th>Responsável</th>
                </tr>
            </thead>

            <tbody class="table-border-bottom-0">
                @forelse ($projectos as $projecto)
                <tr>
                    <td>{{ $projecto->vc_nome }}</td>
                    <td>{{ \Carbon\Carbon::parse($projecto->dt_data_inicio)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($projecto->dt_data_conclusao)->format('d/m/Y') }}</td>
                    <td>
                        <div class="progress" style="height: 6px;">
                            <div class="progress-bar 
                                @if($projecto->it_estado == 100) bg-success
                                @elseif($projecto->it_estado >= 50) bg-warning
                                @else bg-danger
                                @endif" 
                                role="progressbar" 
                                style="width:{{$projecto->it_estado}}%" 
                                aria-valuenow="{{$projecto->it_estado}}" 
                                aria-valuemin="0" 
                                aria-valuemax="100">
                            </div>
                        </div>
                        <small class="text-muted">{{ $projecto->it_estado }}%</small>
                    </td>
                    <td>
                        <span class="badge 
                            @if($projecto->vc_prioridade == 'Alta') bg-danger
                            @elseif($projecto->vc_prioridade == 'Média') bg-warning
                            @else bg-success
                            @endif">
                            {{ $projecto->vc_prioridade }}
                        </span>
                    </td>
                    <td>{{ $projecto->u_nome }}</td>
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