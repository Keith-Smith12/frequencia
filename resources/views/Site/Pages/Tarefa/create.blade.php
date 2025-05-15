@extends('Site/layouts/page')
@section('title') Criar Tarefa @endsection
@section('conteudo')
<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Criar Nova Tarefa</h5>
                <small class="text-muted float-end">Preencha os campos obrigatórios</small>
            </div>
            <div class="card-body">
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <form action="{{ route('tarefa.store') }}" method="post">
                    @csrf
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
                    
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('tarefa.index') }}" class="btn btn-outline-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Salvar Tarefa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection