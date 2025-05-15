@extends('Site/layouts/page')
@section('title') Editar Frequência @endsection
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
            <h4 class="card-title">Editar Frequência</h4>
            <p class="card-description">Atualize os dados da frequência</p>
            
            <form action="{{ route('frequencia.update', $frequencia->id) }}" method="POST" class="forms-sample">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label class="form-label" for="dt_data">Data</label>
                    <input type="date" class="form-control" id="dt_data" name="dt_data" required
                        value="{{ old('dt_data', $frequencia->dt_data) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="tm_hora_entrada">Hora de Entrada</label>
                    <input type="time" class="form-control" id="tm_hora_entrada" name="tm_hora_entrada" required
                        value="{{ old('tm_hora_entrada', $frequencia->tm_hora_entrada) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="tm_hora_saida">Hora de Saída</label>
                    <input type="time" class="form-control" id="tm_hora_saida" name="tm_hora_saida" required
                        value="{{ old('tm_hora_saida', $frequencia->tm_hora_saida) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="it_id_usuario">Usuário</label>
                    <select class="form-select" id="it_id_usuario" name="it_id_usuario" required>
                        <option value="">Selecione o usuário</option>
                        @foreach ($usuarios as $usuario)
                        <option value="{{ $usuario->id }}"
                            {{ old('it_id_usuario', $frequencia->it_id_usuario) == $usuario->id ? 'selected' : '' }}>
                            {{ $usuario->vc_nome }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="vc_tipo">Tipo de Frequência</label>
                    <select class="form-select" id="vc_tipo" name="vc_tipo" required>
                        <option value="">Selecione o tipo</option>
                        <option value="Presente" {{ old('vc_tipo', $frequencia->vc_tipo) == 'Presente' ? 'selected' : '' }}>Presente</option>
                        <option value="Falta" {{ old('vc_tipo', $frequencia->vc_tipo) == 'Falta' ? 'selected' : '' }}>Falta</option>
                        <option value="Justificada" {{ old('vc_tipo', $frequencia->vc_tipo) == 'Justificada' ? 'selected' : '' }}>Falta Justificada</option>
                        <option value="Atraso" {{ old('vc_tipo', $frequencia->vc_tipo) == 'Atraso' ? 'selected' : '' }}>Atraso</option>
                        <option value="Dispensado" {{ old('vc_tipo', $frequencia->vc_tipo) == 'Dispensado' ? 'selected' : '' }}>Dispensado</option>
                    </select>
                </div>
                
                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary me-2">Atualizar</button>
                    <a href="{{ route('frequencia.index') }}" class="btn btn-light">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection