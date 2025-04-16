@extends('layouts._includes.Admin.body')
@section('title', 'Lista de Justificativas de Atraso')
@section('conteudo')

<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Lista de Justificativas de Atraso</h2>
                    <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalAdicionar">
                        + Adicionar
                    </button>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="datatable-responsive" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Data</th>
                                <th>Descrição</th>
                                <th>Usuário</th>
                                <th>Tarefa</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($justificativasAtraso as $justificativa)
                                <tr>
                                    <td>{{ $justificativa->atraso->created_at }}</td> <!-- Data do Atraso -->
                                    <td>{{ $justificativa->vc_descricao }}</td>
                                    <td>{{ $justificativa->usuario }}</td> <!-- Nome do Usuário -->
                                    <td>{{ $justificativa->tarefa }}</td> <!-- Nome da Tarefa -->
                                    <td>
                                        <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                data-target="#modalEditar{{ $justificativa->id }}">Editar</button>
                                        <form action="{{ route('justificativaAtraso.destroy', $justificativa->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Modal Editar -->
                                <div class="modal fade" id="modalEditar{{ $justificativa->id }}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Editar Justificativa de Atraso</h5>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('justificativaAtraso.update', ['id' => $justificativa->id]) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    @include('_form.justificativaAtraso.index', ['justificativa' => $justificativa])

                                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal Adicionar -->
        <div class="modal fade" id="modalAdicionar" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Adicionar Justificativa de Atraso</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('justificativaAtraso.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            @include('_form.justificativaAtraso.index', ['justificativa' => null])
                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
