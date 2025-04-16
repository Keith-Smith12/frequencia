@extends('layouts._includes.Admin.body')
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
                                    @if ($tarefa->ativo == 'off')
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
                                    @endif
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
