@extends('Site/layouts/page')
@section('title') Criar Categoria de Tarefa @endsection
@section('conteudo')

<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Criar Categoria de Tarefa</h5>
                <small class="text-muted float-end">Preencha os campos abaixo</small>
            </div>

            <div class="card-body">
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <form action="{{ route('CategoriaTarefa.store') }}" method="post">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label" for="vc_nome">Nome da Categoria</label>
                        <input type="text" class="form-control" id="vc_nome" name="vc_nome" required
                            placeholder="Digite o nome da categoria"
                            value="{{ old('vc_nome') }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="vc_descricao">Descrição</label>
                        <textarea class="form-control" id="vc_descricao" name="vc_descricao" rows="3"
                            placeholder="Descreva a categoria">{{ old('vc_descricao') }}</textarea>
                    </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="vc_prioridade">Prioridade</label>
                            <select class="form-select" id="vc_prioridade" name="vc_prioridade" required>
                                <option value="">Selecione a prioridade</option>
                                <option value="Alta" {{ old('vc_prioridade') == 'Alta' ? 'selected' : '' }}>Alta</option>
                                <option value="Média" {{ old('vc_prioridade') == 'Média' ? 'selected' : '' }}>Média</option>
                                <option value="Baixa" {{ old('vc_prioridade') == 'Baixa' ? 'selected' : '' }}>Baixa</option>
                            </select>
                        </div>

                    <div class="mb-3">
                        <label class="form-label" for="it_tempo_estimado">Tempo Estimado (dias)</label>
                        <input type="number" class="form-control" id="it_tempo_estimado" name="it_tempo_estimado" required
                            placeholder="Tempo médio em dias"
                            value="{{ old('it_tempo_estimado') }}">
                    </div>

                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('CategoriaTarefa.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Criar Categoria</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection