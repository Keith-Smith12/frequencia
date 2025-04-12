{{-- <h1>Tarefas deletadas</h1>

<nav>
    <button>
        <a href="{{ route('exemplo.index') }}">voltar</a>
    </button>
</nav>

@forelse ($tarefas as $tarefa)
@if ($tarefa->ativo == 'off')
        <h3 style="margin: 20px;">
            <button style="display: block; text-align:left; padding: 20px;">

                <h1><strong> {{ $tarefa->id }} º TABELA</strong></h1><br>
                <p><strong>ID:</strong>{{ $tarefa->id }}<br><br></p>
                <p><strong>NOME:</strong>{{ $tarefa->vc_nome }}<br><br></p>
                <p><strong>DESCRIÇÃO:</strong>{{ $tarefa->vc_descricao }}<br><br></p>
                <p><strong>DATA DE ENTREGA:</strong>{{ $tarefa->dt_data_entrega }}<br><br></p>
                <p><strong>DATA DE SUBMISSÃO DA PROPOSTA DA TAREFA: </strong> {{ $tarefa->created_at }} <br><br></p>
                <p><strong>PORTADOR: </strong>{{ $tarefa->vc_portador }}<br><br></p>

                <a href="{{ route('tarefa.restaurar', ['id' => $tarefa->id]) }}">RESTAURAR</a>

                <form action='{{ route('tarefa.purge', $tarefa->id) }}' method="POST">
                    @csrf
                    @method('delete')
                    <input type="submit" value="DELETAR PERMANENTEMENTE"></input>
                </form>
            </button>
        </h3>
@endif
@empty
    <h1 style="opacity:.5; display:grid; place-items:center;">NENHUMA TAREFA</h1>
@endforelse --}}


@extends('layouts._includes.Admin.modelo_index')
@section('title', 'Tarefa')
@section('conteudo')

<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Lista de Tarefas Eliminadas</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                        <nav>
                            <button class="btn btn-primary pull-right">
                                <a href="{{ route('tarefa.index') }}" style="color:white;">voltar</a>
                            </button>
                        </nav>
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
                                    <tr>
                                        <td>{{ $tarefa->id }}</td>
                                        <td>{{ $tarefa->vc_nome }}</td>
                                        <td>{{ $tarefa->vc_descricao }}</td>
                                        <td>{{ $tarefa->dt_data_entrega }}</td>
                                        <td>{{ $tarefa->vc_portador }}</td>
                                        <td>{{ $tarefa->ativo }}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm">
                                                <a href="{{ route('tarefa.restaurar', $tarefa->id) }}"
                                                    style="color:white;">Restaurar</a>
                                            </button>
                                            <form action="{{ route('tarefa.purge', $tarefa->id) }}" method="GET"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
