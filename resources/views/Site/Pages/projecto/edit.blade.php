@extends('Site/layouts/page')
@section('title') Editar Usuário @endsection
@section('conteudo')

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Editar Usuário</h4>
            <p class="card-description">Atualize as informações do usuário</p>
            
            <form action="{{ route('projecto.update', $projecto->id) }}" method="POST" class="forms-sample">
                @csrf
                @method('PUT')
                
                <!-- Campo Nome do Projecto -->
<div class="form-group">
    <label for="vc_nome">Nome do Projecto</label>
    <input type="text" class="form-control" id="vc_nome" name="vc_nome" required
           placeholder="Digite o nome do projecto"
           value="{{ old('vc_nome', $projecto->vc_nome ?? '') }}">
</div>

<!-- Campo Data de Início -->
<div class="form-group">
    <label for="dt_data_inicio">Data de Início</label>
    <input type="date" class="form-control" id="dt_data_inicio" name="dt_data_inicio" required
           placeholder="Digite a data de início"
           value="{{ old('dt_data_inicio', $projecto->dt_data_inicio ?? '') }}">
</div>

<!-- Campo Data de Conclusão -->
<div class="form-group">
    <label for="dt_data_conclusao">Data de Conclusão</label>
    <input type="date" class="form-control" id="dt_data_conclusao" name="dt_data_conclusao" required
           placeholder="Digite a data de conclusão"
           value="{{ old('dt_data_conclusao', $projecto->dt_data_conclusao ?? '') }}">
</div>

<!-- Campo Estado -->
<div class="form-group">
    <label for="it_estado">Estado do Projecto</label>
    <select class="form-control" id="it_estado" name="it_estado" required>
        <option value="">Selecione o estado</option>
        <option value="100" {{ old('it_estado', $projecto->it_estado ?? '') == '100' ? 'selected' : '' }}>100%</option>
        <option value="50" {{ old('it_estado', $projecto->it_estado ?? '') == '50' ? 'selected' : '' }}>50%</option>
        <option value="0" {{ old('it_estado', $projecto->it_estado ?? '') == '0' ? 'selected' : '' }}>0%</option>
    </select>
</div>

<!-- Campo Prioridade -->
<div class="form-group">
    <label for="vc_prioridade">Prioridade</label>
    <select class="form-control" id="vc_prioridade" name="vc_prioridade" required>
        <option value="">Selecione a prioridade</option>
        <option value="Alta" {{ old('vc_prioridade', $projecto->vc_prioridade ?? '') == 'Alta' ? 'selected' : '' }}>Alta</option>
        <option value="Média" {{ old('vc_prioridade', $projecto->vc_prioridade ?? '') == 'Média' ? 'selected' : '' }}>Média</option>
        <option value="Baixa" {{ old('vc_prioridade', $projecto->vc_prioridade ?? '') == 'Baixa' ? 'selected' : '' }}>Baixa</option>
    </select>
</div>

<!-- Dropdown de Usuários -->
<div class="form-group">
    <label for="it_id_usuario">Usuário</label>
    <select class="form-control" id="it_id_usuario" name="it_id_usuario" required>
        <option value="">Selecione o usuário</option>
        @foreach ($usuarios as $usuario)
            <option value="{{ $usuario->id }}" 
                    {{ old('it_id_usuario', $projecto->it_id_usuario ?? '') == $usuario->id ? 'selected' : '' }}>
                {{ $usuario->vc_nome }}
            </option>
        @endforeach
    </select>
</div>

                
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary me-2">Atualizar</button>
                    <a href="{{ route('user.all') }}" class="btn btn-light">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection