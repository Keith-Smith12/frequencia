<div class="form-group">
    <label for="vc_nome">Nome</label>
    <input type="text" class="form-control" id="vc_nome" name="vc_nome" required
           placeholder="Digite o nome do projecto"
           value="{{ old('vc_nome', isset($projecto) ? $projecto->vc_nome : '') }}">
</div>

<div class="form-group">
    <label for="dt_data_inicio">Data De Início</label>
    <input type="date" class="form-control" id="dt_data_inicio" name="dt_data_inicio" step="0.01" required placeholder="Digite a data em que se iniciou o projecto" value="{{ old('dt_data_inicio', isset($projecto) ? $projecto->dt_data_inicio : '') }}">
</div>

<div class="form-group">
    <label for="dt_data_conclusao">Data De Conclusao</label>
    <input type="date" class="form-control" id="dt_data_conclusao" name="dt_data_conclusao" step="0.01" required
           placeholder="Digite o Data De Conclusão do Projecto"
           value="{{ old('dt_data_conclusao', isset($projecto) ? $projecto->dt_data_conclusao : '') }}">
</div>

<div class="form-group">
    <label for="it_estado">Estado do projecto</label>

    <input type="number" class="form-control" id="it_estado" name="it_estado" step="1" required
    placeholder="Digite o Estado do Projecto"
    value="{{ old('it_estado', isset($projecto) ? $projecto->it_estado : '') }}">
</div>

<div class="form-group">
    <label for="vc_prioridade">Prioridade</label>

    <input type="text" class="form-control" id="vc_prioridade" name="vc_prioridade" step="0.01" required
    placeholder="Digite a(s) prioridade(s) do projecto"
    value="{{ old('vc_prioridade', isset($projecto) ? $projecto->vc_prioridade : '') }}">
</div>

<div class="form-group">
    <label for="it_id_usuario">Id Do Usuário</label>

    <input type="number" class="form-control" id="it_id_usuario" name="it_id_usuario" step="0.01" required
    placeholder="Digite o Id Usuário"
    value="{{ old('it_id_usuario', isset($projecto) ? $projecto->it_id_usuario : '') }}">
</div>

<div class="form-group">
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="ativo" name="ativo"
               {{ old('ativo', isset($projecto) ? $projecto->ativo : true) ? 'checked' : '' }}>
        <label class="form-check-label" for="ativo">Ativo</label>
    </div>
</div>
