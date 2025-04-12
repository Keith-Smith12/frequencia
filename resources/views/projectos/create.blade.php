<h1>Tela de criação de projectos</h1>
<form action="{{ route('projecto.store') }}" method="post">
    @csrf
    <div>
        <label for="vc_nome">NOME</label>
        <input type="text" name="vc_nome" required>
    </div>
    <div>
        <label for="dt_data_inicio">DATA DE INÍCIO</label>
        <input type="date" name="dt_data_inicio" required>
    </div>
    <div>
        <label for="dt_data_conclusao">DATA DE CONCLUSÃO</label>
        <input type="date" name="dt_data_conclusao" required>
    </div>
    <div>
        <label for="it_estado">ESTADO</label>
        <input type="number" name="it_estado" max="1" min="0" required>
    </div>
    <div>
        <label for="vc_prioridade">PRIORIDADE</label>
        <input type="text" name="vc_prioridade">
    </div>
    <div>
        <label for="it_id_usuario">ID DO USUÁRIO</label>
        <input type="number" name="it_id_usuario" required>
    </div>
    <input type="text" name="ativo" value="true" style="display: none;">
    <button type="submit">send</button>
</form>
