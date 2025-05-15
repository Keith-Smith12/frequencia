@extends('Site/layouts/page')
@section('title') Editar Justificativa de Atraso @endsection
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
            <p class="card-description">Atualize as informações da justificativa</p>
            
            <form action="{{ route('justificativaAtraso.update', $justificativa->id) }}" method="POST" class="forms-sample">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label class="form-label" for="it_id_atraso">Usuário e Tarefa</label>
                    <select class="form-select" id="it_id_atraso" name="it_id_atraso" required>
                        <option value="">Selecione a tarefa e o usuário</option>
                        @foreach ($tarefasUsuarios as $tarefaUsuario)
                        <option value="{{ $tarefaUsuario->id }}"
                            {{ old('it_id_atraso', $justificativa->it_id_atraso ?? '') == $tarefaUsuario->id ? 'selected' : '' }}>
                            {{ $tarefaUsuario->usuarios->vc_nome ?? 'Sem nome' }} - {{ $tarefaUsuario->tarefas->vc_nome ?? 'Sem título' }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="vc_descricao">Justificativa</label>
                    <textarea class="form-control" id="vc_descricao" name="vc_descricao" rows="3"
                        placeholder="Digite a justificativa" required>{{ old('vc_descricao', $justificativa->vc_descricao ?? '') }}</textarea>
                </div>
                
                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary me-2">Atualizar</button>
                    <a href="{{ route('justificativaAtraso.index') }}" class="btn btn-light">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection