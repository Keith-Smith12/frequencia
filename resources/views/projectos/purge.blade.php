@extends('layouts._includes.Admin.modelo_index')
@section('title', 'Projecto')
@section('conteudo')

    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Lista de Projectos Eliminados</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <button class="btn btn-primary pull-right">
                            <a href="{{ route('projecto.index') }}" style="color:white;">voltar</a>
                        </button>
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
                                    @if ($projecto->ativo == 'off')
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
                                                <button class="btn btn-warning btn-sm">
                                                    <a href="{{ route('projecto.restaurar', $projecto->id) }}"
                                                        style="color:white;">Restaurar</a>
                                                </button>
                                                <form action="{{ route('projecto.purge', $projecto->id) }}" method="GET"
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
