@extends('layouts._includes.Admin.body')
@section('title', 'Lista de Atrasos')
@section('conteudo')

    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Lista de Atrasos</h2>
                        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#modalAdicionar">
                            + Adicionar
                        </button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-responsive" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Usuário</th>z
                                    <th>Quantidade de Dias</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($atrasos as $atraso)
                                    <tr>
                                        <td>{{ $atraso->usuario }}</td>
                                        <td>{{ $atraso->tarefa }}</td> 
                                        <td>{{ $atraso->qtd_dias }}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                data-target="#modalEditar{{ $atraso->id }}">Editar</button>
                                            <form action="{{ route('atraso.destroy', $atraso->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Modal Editar -->
                                    <div class="modal fade" id="modalEditar{{ $atraso->id }}" tabindex="-1"
                                        role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Editar Atraso</h5>

                                                    <button type="button" class="close"
                                                        data-dismiss="modal">&times;</button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{route('atraso.update', ['id'=>$atraso->id])}}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        @include('_form.atraso.index', ['atraso' => $atraso])

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
                            <h5 class="modal-title">Adicionar Atraso</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-body">
                                <form action="{{route('atraso.store')}}" method="POST">
                                    @csrf
                                    @method('POST')
                                    @include('_form.atraso.index', ['atraso' => null]) <!-- Formulário de atraso -->
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
