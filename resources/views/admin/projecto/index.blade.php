@extends('layouts._includes.Admin.body')
@section('title', 'Projectos')
@section('conteudo')

    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Lista de Projectos</h2>
                        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalAdicionar">
                            + Adicionar
                        </button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-responsive" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Data Início</th>
                                    <th>Data Conclusão</th>
                                    <th>Estado</th>
                                    <th>Prioridade</th>
                                    <th>Usuário</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projectos as $projecto)
                                    <tr>
                                        <td>{{ $projecto->vc_nome }}</td>
                                        <td>{{ $projecto->dt_data_inicio }}</td>
                                        <td>{{ $projecto->dt_data_conclusao }}</td>
                                        <td>{{ $projecto->it_estado }}</td>
                                        <td>{{ $projecto->vc_prioridade }}</td>
                                        <td>{{ $projecto->u_nome }}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                data-target="#modalEditar{{ $projecto->id }}">Editar</button>
                                            <form action="{{ route('projecto.destroy', $projecto->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Modal Editar -->
                                    <div class="modal fade" id="modalEditar{{ $projecto->id }}" tabindex="-1"
                                        role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Editar Projecto</h5>

                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('projecto.update', ['id' => $projecto->id]) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        @include('_form.projecto.index')

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
                            <h5 class="modal-title">Adicionar Projecto</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('projecto.store') }}" method="POST">
                                @csrf
                                @method('POST')
                                @include('_form.projecto.index', ['projecto' => null])
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
