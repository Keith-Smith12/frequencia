@extends('Site/layouts/page')
@section('title') Editar Categoria de Tarefa @endsection
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
            <h4 class="card-title">Editar Categoria</h4>
            <p class="card-description">Atualize as informações da categoria</p>
            
            <form action="{{ route('categoriaTarefa.update', $categoriaTarefa->id) }}" method="POST" class="forms-sample">
                @csrf
                @method('PUT')
                
                <div class="mb-3">
                    <label class="form-label" for="vc_nome">Nome</label>
                    <input type="text" class="form-control" id="vc_nome" name="vc_nome" required
                        placeholder="Digite o nome da categoria"
                        value="{{ old('vc_nome', $categoriaTarefa->vc_nome) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="dt_descricao">Descrição</label>
                    <textarea class="form-control" id="dt_descricao" name="dt_descricao" rows="3"
                        placeholder="Digite a descrição da categoria">{{ old('dt_descricao', $categoriaTarefa->dt_descricao) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="vc_prioridade">Prioridades</label>
                    <textarea class="form-control" id="vc_prioridade" name="vc_prioridade" required
                        placeholder="Digite as prioridades da categoria">{{ old('vc_prioridade', $categoriaTarefa->vc_prioridade) }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="it_tempo_estimado">Tempo estimado (dias)</label>
                    <input type="number" class="form-control" id="it_tempo_estimado" name="it_tempo_estimado" required
                        placeholder="Digite o tempo estimado"
                        value="{{ old('it_tempo_estimado', $categoriaTarefa->it_tempo_estimado) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="vc_tipo">Tipo</label>
                    <input type="text" class="form-control" id="vc_tipo" name="vc_tipo" required
                        placeholder="Digite o tipo de categoria"
                        value="{{ old('vc_tipo', $categoriaTarefa->vc_tipo) }}">
                </div>
                
                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-primary me-2">Atualizar</button>
                    <a href="{{ route('categoriaTarefa.index') }}" class="btn btn-light">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection