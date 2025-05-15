@extends('Site/layouts/page')
@section('title') Editar Justificativa de Falta @endsection
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
            <h4 class="card-title">Editar Justificativa</h4>
            <p class="card-description">Atualize os dados da justificativa</p>
            
            <form action="{{ route('justificativa_falta.update', $justificativaFalta->id) }}" method="POST" class="forms-sample">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label class="form-label" for="it_id_frequencia">Frequência</label>
                    <select class="form-select" id="it_id_frequencia" name="it_id_frequencia" required>
                        <option value="">Selecione a frequência</option>
                        @foreach ($frequencias as $frequencia)
                            @if ($frequencia->vc_tipo == "Falta")
                            <option value="{{ $frequencia->id }}"
                                {{ old('it_id_frequencia', $justificativaFalta->it_id_frequencia) == $frequencia->id ? 'selected' : '' }}>
                                {{ $frequencia->vc_tipo }} - {{ $frequencia->dt_data }} ({{ $frequencia->tm_hora_entrada }} às {{ $frequencia->tm_hora_saida }})
                            </option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="vc_descricao">Descrição</label>
                    <textarea class="form-control" id="vc_descricao" name="vc_descricao" rows="4" required
                        placeholder="Descreva o motivo da justificativa">{{ old('vc_descricao', $justificativaFalta->vc_descricao) }}</textarea>
                </div>
                
                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary me-2">Atualizar</button>
                    <a href="{{ route('justificativa_falta.index') }}" class="btn btn-light">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection