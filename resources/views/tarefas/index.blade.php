@extends('layouts._includes.Admin.modelo_index')
@section('title', 'Tarefas')
@section('conteudo')

    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Lista de Tarefas</h2>
                        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalAdicionar">
                            + Adicionar
                        </button>
                        <button class="btn pull-right">
                            <a href="{{ route('tarefa.purge-view') }}">Purge View</a>
                        </button>
                        <button class="btn btn-primary pull-right">
                            <a href="{{ route('exemplo.index') }}" style="color:white;">voltar</a>
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
                                    <th>Data De Entrega</th>
                                    <th>Portador</th>
                                    <th>Ativo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tarefas as $tarefa)
                                    @if ($tarefa->ativo == 'on')
                                        <tr>
                                            <td>{{ $tarefa->id }}</td>
                                            <td>{{ $tarefa->vc_nome }}</td>
                                            <td>{{ $tarefa->vc_descricao }}</td>
                                            <td>{{ $tarefa->dt_data_entrega }}</td>
                                            <td>{{ $tarefa->vc_portador }}</td>
                                            <td>{{ $tarefa->ativo }}</td>
                                            <td>
                                                <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#modalEditar{{ $tarefa->id }}">Editar</button>
                                                <form action="{{ route('tarefa.destroy', $tarefa->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('POST')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                                </form>
                                            </td>
                                        </tr>

                                        <!-- Modal Editar -->
                                        <div class="modal fade" id="modalEditar{{ $tarefa->id }}" tabindex="-1"
                                            role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Editar Tarefa</h5>

                                                        <button type="button" class="close"
                                                            data-dismiss="modal">&times;</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('tarefa.update', ['id' => $tarefa->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            @include('_form.tarefas.index')

                                                            <button type="submit" class="btn btn-primary">Salvar</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
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
                            <h5 class="modal-title">Adicionar Tarefa</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-body">
                                <form action="{{ route('tarefa.store') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    @include('_form.tarefas.index', ['tarefas' => null])
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
