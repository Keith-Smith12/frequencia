{{-- <h1>
    Tela de listagem de projectos
</h1>
<nav>
    <button>
        <a href="{{ route('exemplo.index') }}">voltar</a>
    </button>
</nav>

@forelse ($projectos as $projecto)
    @if ($projecto->ativo == 'true')
        <h3 style="margin: 20px;">
            <button style="display: block; text-align:left; padding: 20px;">

                <h1><strong> {{ $projecto->id }} º TABELA</strong></h1><br>
                <p><strong>ID:</strong>{{ $projecto->id }}<br><br></p>
                <p><strong>PROJECTO:</strong>{{ $projecto->vc_nome }}<br><br></p>
                <p><strong>DATA DE INÍCIO:</strong>{{ $projecto->dt_data_inicio }}<br><br></p>
                <p><strong>DATA DE CONCLUSÃO:</strong>{{ $projecto->dt_data_conclusao }}<br><br></p>
                <p><strong>ESTADO: </strong>
                    @if ($projecto->estado == 0)
                        pendente
                    @else
                        concluído
                    @endif
                </p>
                <p><strong>PRIORIDADE: </strong>{{ $projecto->vc_prioridade }}<br><br></p>
                <p><strong>ID DO USUÁRIO: </strong>{{ $projecto->it_id_usuario }}<br><br></p>

                <a href="{{ route('projecto.edit', ['id' => $projecto->id]) }}">EDITAR</a>

                <form action="{{ route('projecto.destroy', $projecto->id) }}" method="post">
                    @csrf
                    @method('post')
                    <button type="submit">DELETAR</button>
                </form>
            </button>
        </h3>
    @endif
@empty
    <h1 style="opacity:.5; display:grid; place-items:center;">NENHUM PROJECTO</h1>
@endforelse --}}


@extends('layouts._includes.Admin.modelo_index')
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
                        <button class="btn pull-right">
                            <a href="{{ route('projecto.purge-view') }}">Purge View</a>
                        </button>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable-responsive" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Data De Início</th>
                                    <th>Data De Conclusão</th>
                                    <th>Estado</th>
                                    <th>Prioridade</th>
                                    <th>Id De Usuário</th>
                                    <th>Ativo</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($projectos as $projecto)
                                    @if ($projecto->ativo == 'on')
                                        <tr>
                                            <td>{{ $projecto->id }}</td>
                                            <td>{{ $projecto->vc_nome }}</td>
                                            <td>{{ $projecto->dt_data_inicio }}</td>
                                            <td>{{ $projecto->dt_data_conclusao }}</td>
                                            <td>{{ $projecto->it_estado }}</td>
                                            <td>{{ $projecto->vc_prioridade }}</td>
                                            <td>{{ $projecto->it_id_usuario }}</td>
                                            <td>{{ $projecto->ativo }}</td>
                                            <td>
                                                <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#modalEditar{{ $projecto->id }}">Editar</button>
                                                <form action="{{ route('projecto.destroy', $projecto->id) }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    @method('POST')
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
                                                        <form action="{{ route('projecto.update', ['id' => $projecto->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            @include('_form.projectos.index')

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
                            <h5 class="modal-title">Adicionar Projecto</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-body">
                                <form action="{{ route('projecto.store') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    @include('_form.projectos.index', ['projectos' => null])
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
