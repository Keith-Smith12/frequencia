@extends('Site/layouts/page')
@section('title') Criar Usuário @endsection
@section('conteudo')
<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Adicionar frequencia</h5>
                <small class="text-muted float-end">Preencha os campos abaixo</small>
            </div>
            <div class="card-body">
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <form action="{{ route('frequencia.store') }}" method="post">
                    @csrf
                    <!-- Campo Data -->
<div class="form-group">
    <label for="dt_data">Data</label>
    <input type="date" class="form-control" id="dt_data" name="dt_data" required
           placeholder="Digite a data"
           value="{{ old('dt_data', $frequencia->dt_data ?? '') }}">
</div>

<!-- Campo Hora de Entrada -->
<div class="form-group">
    <label for="tm_hora_entrada">Hora de Entrada</label>
    <input type="time" class="form-control" id="tm_hora_entrada" name="tm_hora_entrada" required
           placeholder="Digite a hora de entrada"
           value="{{ old('tm_hora_entrada', $frequencia->tm_hora_entrada ?? '') }}">
</div>

<!-- Campo Hora de Saída -->
<div class="form-group">
    <label for="tm_hora_saida">Hora de Saída</label>
    <input type="time" class="form-control" id="tm_hora_saida" name="tm_hora_saida" required
           placeholder="Digite a hora de saída"
           value="{{ old('tm_hora_saida', $frequencia->tm_hora_saida ?? '') }}">
</div>

<!-- Dropdown de Usuários -->
<div class="form-group">
    <label for="it_id_usuario">Usuário</label>
    <select class="form-control" id="it_id_usuario" name="it_id_usuario" required>
        <option value="">Selecione o usuário</option>
        @foreach ($usuarios as $usuario)
            <option value="{{ $usuario->id }}" 
                    {{ old('it_id_usuario', $frequencia->it_id_usuario ?? '') == $usuario->id ? 'selected' : '' }}>
                {{ $usuario->vc_nome }}
            </option>
        @endforeach
    </select>
</div>

<!-- Campo Tipo -->
<div class="form-group">
    <label for="vc_tipo">Tipo de Frequência</label>
    <select class="form-control" id="vc_tipo" name="vc_tipo" required>
        <option value="">Selecione o tipo</option>
        <option value="presente" {{ old('vc_tipo', $frequencia->vc_tipo ?? '') == 'Presente' ? 'selected' : '' }}>Presente</option>
        <option value="falta" {{ old('vc_tipo', $frequencia->vc_tipo ?? '') == 'Falta' ? 'selected' : '' }}>Falta</option>
        <option value="justificada" {{ old('vc_tipo', $frequencia->vc_tipo ?? '') == 'Justificada' ? 'selected' : '' }}>Falta Justificada</option>
        <option value="atraso" {{ old('vc_tipo', $frequencia->vc_tipo ?? '') == 'Atraso' ? 'selected' : '' }}>Atraso</option>
        <option value="dispensado" {{ old('vc_tipo', $frequencia->vc_tipo ?? '') == 'Dispensado' ? 'selected' : '' }}>Dispensado</option>
    </select>
</div>


                    
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('frequencia.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Criar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection