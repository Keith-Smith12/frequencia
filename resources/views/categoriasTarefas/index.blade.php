@extends('layouts._includes.Admin.body')
@section('title', 'CategoriasTarefas')
@section('conteudo')

    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Lista de Categorias de Tarefas</h2>
                        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalAdicionar">
                            + Adicionar
                        </button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-responsive" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Prioridades</th>
                                    <th>Tempo estimado</th>
                                    <th>Tipo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categoriasTarefas as $categoriaTarefa)
                                    <tr>
                                        <td>{{ $categoriaTarefa->id }}</td>
                                        <td>{{ $categoriaTarefa->vc_nome }}</td>
                                        <td>{{ $categoriaTarefa->dt_descricao }}</td>
                                        <td>{{ $categoriaTarefa->vc_prioridade }}</td>
                                        <td>{{ $categoriaTarefa->it_tempo_estimado }}</td>
                                        <td>{{ $categoriaTarefa->vc_tipo }}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                data-target="#modalEditar{{ $categoriaTarefa->id }}">Editar</button>
                                            <form action="{{ route('categoriaTarefa.destroy', $categoriaTarefa->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Modal Editar -->
                                    <div class="modal fade" id="modalEditar{{ $categoriaTarefa->id }}" tabindex="-1"
                                        role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Editar Categoria de Tarefa</h5>

                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <form
                                                        action="{{ route('categoriaTarefa.update', ['id' => $categoriaTarefa->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        @include('_form.categoriaTarefa.index')

                                                        <button type="submit" class="btn btn-primary">Salvar</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
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
                            <h5 class="modal-title">Adicionar categoria de Tarefa</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-body">
                                <form action="{{ route('categoriaTarefa.store') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    @include('_form.categoriaTarefa.index', ['categoriaTarefa' => null])
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
