@extends('Site/layouts/page')
@section('title') Criar Usuário @endsection
@section('conteudo')

<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Registrar Atraso</h5>
                <small class="text-muted float-end">Preencha os campos abaixo</small>
            </div>

            <div class="card-body">
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <form action="{{ route('atraso.store') }}" method="post">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label" for="it_id_tarefa_usuario">Usuário e Tarefa</label>
                        <select class="form-select" id="it_id_tarefa_usuario" name="it_id_tarefa_usuario" required>
                            <option value="">Selecione a tarefa e o usuário</option>
                            @foreach ($tarefasUsuarios as $tarefaUsuario)
                            <option value="{{ $tarefaUsuario->id }}" 
                                {{ old('it_id_tarefa_usuario', $atraso->it_id_tarefa_usuario ?? '') == $tarefaUsuario->id ? 'selected' : '' }}>
                                {{ $tarefaUsuario->usuarios->vc_nome ?? 'Sem nome' }} - {{ $tarefaUsuario->tarefas->vc_nome ?? 'Sem título' }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="qtd_dias">Quantidade de Dias de Atraso</label>
                        <input type="number" class="form-control" id="qtd_dias" name="qtd_dias" required 
                            placeholder="Digite a quantidade de dias de atraso"
                            value="{{ old('qtd_dias', $atraso->qtd_dias ?? '') }}">
                    </div>

                    <div class="row justify-content-end mt-4">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Criar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection