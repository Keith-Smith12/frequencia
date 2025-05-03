
<div class="form-group">
    <label for="vc_nome">Nome da Tarefa</label>
    <input type="text" class="form-control" id="vc_nome" name="vc_nome" required
           placeholder="Digite o nome da Tarefa"
           value="{{ old('vc_nome', $tarefa->vc_nome ?? '') }}">
</div>

<div class="form-group">
    <label for="dt_data_entrega">Data de entrega</label>
    <input type="date" class="form-control" id="dt_data" name="dt_data_entrega" required
           placeholder="Digite a data de entrega"
           value="{{ old('dt_data_entrega', $tarefa->dt_data_entrega ?? '') }}">
</div>

