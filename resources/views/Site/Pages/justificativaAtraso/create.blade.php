@extends('Site/layouts/page')
@section('title') Criar Justificativa de Atraso @endsection
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

                <form action="{{ route('justificativaAtraso.store') }}" method="post">
                    @csrf
                    
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

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('justificativoAtraso.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Criar Justificativa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection