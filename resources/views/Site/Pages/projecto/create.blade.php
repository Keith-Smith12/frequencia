@extends('Site/layouts/page')
@section('title') Criar Projeto @endsection
@section('conteudo')

<div class="row">
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Registrar Projeto</h5>
                <small class="text-muted float-end">Preencha os campos abaixo</small>
            </div>

            <div class="card-body">
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <form action="{{ route('projecto.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label" for="vc_nome">Nome do Projeto</label>
                        <input type="text" class="form-control" id="vc_nome" name="vc_nome" required
                            placeholder="Digite o nome do projeto"
                            value="{{ old('vc_nome') }}">
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="dt_data_inicio">Data de Início</label>
                            <input type="date" class="form-control" id="dt_data_inicio" name="dt_data_inicio" required
                                value="{{ old('dt_data_inicio') }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="dt_data_conclusao">Data de Conclusão</label>
                            <input type="date" class="form-control" id="dt_data_conclusao" name="dt_data_conclusao" required
                                value="{{ old('dt_data_conclusao') }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label" for="it_estado">Estado</label>
                            <select class="form-select" id="it_estado" name="it_estado" required>
                                <option value="">Selecione o estado</option>
                                <option value="0" {{ old('it_estado') == '0' ? 'selected' : '' }}>0% (Não iniciado)</option>
                                <option value="50" {{ old('it_estado') == '50' ? 'selected' : '' }}>50% (Em andamento)</option>
                                <option value="100" {{ old('it_estado') == '100' ? 'selected' : '' }}>100% (Concluído)</option>
                            </select>
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
                    </div>

                    <div class="mb-3">
                        <label class="form-label" for="it_id_usuario">Responsável</label>
                        <select class="form-select" id="it_id_usuario" name="it_id_usuario" required>
                            <option value="">Selecione o responsável</option>
                            @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario->id }}"
                                {{ old('it_id_usuario') == $usuario->id ? 'selected' : '' }}>
                                {{ $usuario->vc_nome }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="row justify-content-end mt-4">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Cadastrar Projeto</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection