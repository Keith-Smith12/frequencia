
<h1>Projectos deletados</h1>
<nav>
    <button>
        <a href="{{ route('exemplo.index') }}">voltar</a>
    </button>
</nav>

@forelse ($projectos as $projecto)
    @if ($projecto->ativo == 'false')
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

                <a href="{{ route('projecto.restaurar', ['id' => $projecto->id]) }}">RESTAURAR</a>

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
@endforelse
