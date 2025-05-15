@extends('Site/layouts/page')
@section('title') Editar Tarefa @endsection
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
            <h4 class="card-title">Editar Tarefa</h4>
            <p class="card-description">Atualize as informações do usuário</p>
            
            <form action="{{ route('tarefa.update', $tarefa->id) }}" method="POST" class="forms-sample">
                @csrf
                @method('PUT')
                
                <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="vc_nome" class="form-label">Nome da Tarefa*</label>
                            <input type="text" class="form-control" id="vc_nome" name="vc_nome" required
                                placeholder="Nome da tarefa"
                                value="{{ old('vc_nome') }}"
                                minlength="3" maxlength="100">
                            <small class="text-muted">Mínimo 3 caracteres</small>
                        </div>

                        <div class="col-md-6">
                            <label for="dt_data_entrega" class="form-label">Data de Entrega*</label>
                            <input type="date" class="form-control" id="dt_data_entrega" name="dt_data_entrega" required
                                value="{{ old('dt_data_entrega') }}"
                                min="{{ date('Y-m-d') }}">
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <label for="it_id_projecto" class="form-label">Projeto*</label>
                            <select class="form-select" id="it_id_projecto" name="it_id_projecto" required>
                                <option value="">Selecione um projeto</option>
                                @foreach($projectos as $projecto)
                                    <option value="{{ $projecto->id }}" {{ old('it_id_projecto') == $projecto->id ? 'selected' : '' }}>
                                        {{ $projecto->vc_nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="it_id_cat_tarefa" class="form-label">Categoria*</label>
                            <select class="form-select" id="it_id_cat_tarefa" name="it_id_cat_tarefa" required>
                                <option value="">Selecione uma categoria</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}" {{ old('it_id_cat_tarefa') == $categoria->id ? 'selected' : '' }}>
                                        {{ $categoria->vc_nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mb-4 form-check">
                        <input type="checkbox" class="form-check-input" id="ativo" name="ativo" value="1"
                            {{ old('ativo', true) ? 'checked' : '' }}>
                        <label class="form-check-label" for="ativo">Tarefa Ativa</label>
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