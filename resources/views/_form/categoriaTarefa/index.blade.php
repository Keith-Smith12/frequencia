<div class="form-group">
    <label for="vc_nome">Nome</label>
    <input type="text" class="form-control" id="vc_nome" name="vc_nome" required
        placeholder="Digite o nome da categoria da tarefa"
        value="{{ old('vc_nome', isset($categoriaTarefa) ? $categoriaTarefa->vc_nome : '') }}">
</div>

<div class="form-group">
    <label for="dt_descricao">Descrição</label>
    <textarea class="form-control" id="dt_descricao" name="dt_descricao" placeholder="Digite a descrição da categoria">{{ old('dt_descricao', isset($categoriaTarefa) ? $categoriaTarefa->dt_descricao : '') }}</textarea>
</div>

<div class="form-group">
    <label for="vc_prioridade">Prioridade(s) da categoria</label>
    <textarea class="form-control" id="vc_prioridade" name="vc_prioridade" step="0.01" required
        placeholder="Digite as proridades da categoria">{{ old('vc_prioridade', isset($categoriaTarefa) ? $categoriaTarefa->vc_prioridade : '') }}</textarea>
</div>

<div class="form-group">
    <label for="it_tempo_estimado">Tempo estimado da categoria (dias)</label>

    <input type="number" class="form-control" id="it_tempo_estimado" name="it_tempo_estimado" step="1" required
        placeholder="Digite o tempo estimado da categoria"
        value="{{ old('it_tempo_estimado', isset($categoriaTarefa) ? $categoriaTarefa->it_tempo_estimado : '') }}">
</div>

<div class="form-group">
    <label for="vc_tipo">Tipo</label>

    <input type="text" class="form-control" id="vc_tipo" name="vc_tipo" required
        placeholder="Digite o tipo de categoriaTarefa"
        value="{{ old('vc_tipo', isset($categoriaTarefa) ? $categoriaTarefa->vc_tipo : '') }}">
</div>
