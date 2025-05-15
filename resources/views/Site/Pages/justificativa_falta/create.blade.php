@extends('Site/layouts/page')
@section('title') Criar Justificativa de Falta @endsection
@section('conteudo')

<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Registrar Justificativa</h5>
                <small class="text-muted float-end">Preencha os campos abaixo</small>
            </div>

            <div class="card-body">
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <form action="{{ route('justificativa_falta.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label" for="it_id_frequencia">Frequência</label>
                        <select class="form-select" id="it_id_frequencia" name="it_id_frequencia" required>
                            <option value="">Selecione a frequência</option>
                            @foreach ($frequencias as $frequencia)
                                @if ($frequencia->vc_tipo == "Falta")
                                <option value="{{ $frequencia->id }}"
                                    {{ old('it_id_frequencia') == $frequencia->id ? 'selected' : '' }}>
                                    {{ $frequencia->vc_tipo }} - {{ \Carbon\Carbon::parse($frequencia->dt_data)->format('d/m/Y') }} ({{ $frequencia->tm_hora_entrada }} às {{ $frequencia->tm_hora_saida }})
                                </option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="vc_descricao">Descrição</label>
                        <textarea class="form-control" id="vc_descricao" name="vc_descricao" rows="4" required
                            placeholder="Descreva o motivo da justificativa">{{ old('vc_descricao') }}</textarea>
                    </div>

                    <div class="row justify-content-end mt-4">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Registrar Justificativa</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection