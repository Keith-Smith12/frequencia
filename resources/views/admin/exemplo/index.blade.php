@extends('layouts._includes.Admin.body')
@section('title', 'Exemplo')
@section('conteudo')

    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Lista de Exemplos</h2>
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
                                    <th>Valor</th>
                                    <th>Descrição</th>
                                    <th>Observação</th>
                                    <th>Ativo</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($exemplos as $exemplo)
                                    <tr>
                                        <td>{{ $exemplo->nome }}</td>
                                        <td>{{ $exemplo->valor }}</td>
                                        <td>{{ $exemplo->descricao }}</td>
                                        <td>{{ $exemplo->observacao }}</td>
                                        <td>{{ $exemplo->ativo ? 'Sim' : 'Não' }}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                data-target="#modalEditar{{ $exemplo->id }}">Editar</button>
                                            <form action="{{ route('exemplo.destroy', $exemplo->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Modal Editar -->
                                    <div class="modal fade" id="modalEditar{{ $exemplo->id }}" tabindex="-1"
                                        role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Editar Exemplo</h5>

                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
<<<<<<< HEAD
                                                    <form action="{{ route('exemplo.update', ['id' => $exemplo->id]) }}"
                                                        method="POST">
=======
                                                    <form action="{{route('exemplo.update', ['id'=>$exemplo->id])}}" method="POST">
>>>>>>> master
                                                        @csrf
                                                        @method('PUT')
                                                        @include('_form.exemplo.index')

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
                            <h5 class="modal-title">Adicionar Exemplo</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-body">
<<<<<<< HEAD
                                <form action="{{ route('exemplo.store') }}" method="POST">
=======
                                <form action="{{route('exemplo.store')}}" method="POST">
>>>>>>> master
                                    @csrf
                                    @method('POST')
                                    @include('_form.exemplo.index', ['exemplo' => null])
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
