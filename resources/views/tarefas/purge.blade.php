<h1>Tarefas deletadas</h1>

<nav>
    <button>
        <a href="{{ route('exemplo.index') }}">voltar</a>
    </button>
</nav>

@forelse ($tarefas as $tarefa)
@if ($tarefa->ativo == "false")
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
@endforelse
