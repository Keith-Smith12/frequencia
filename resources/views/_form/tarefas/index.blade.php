<div class="form-group">
    <label for="vc_nome">Nome</label>
    <input type="text" class="form-control" id="vc_nome" name="vc_nome" required
           placeholder="Digite seu nome"
           value="{{ old('vc_nome', isset($tarefa) ? $tarefa->vc_nome : '') }}">
</div>

<div class="form-group">
    <label for="vc_descricao">Descrição</label>
    <textarea class="form-control" id="vc_descricao" name="vc_descricao" placeholder="Digite a descrição">{{ old('vc_descricao', isset($tarefa) ? $tarefa->vc_descricao : '') }}</textarea>
</div>

<div class="form-group">
    <label for="dt_data_entrega">Data De Entrega</label>
    <input type="date" class="form-control" id="dt_data_entrega" name="dt_data_entrega" step="0.01" required
           placeholder="Digite o Data De Entrega"
           value="{{ old('dt_data_entrega', isset($tarefa) ? $tarefa->dt_data_entrega : '') }}">
</div>

<div class="form-group">
    <label for="vc_portador">portador</label>
    <textarea class="form-control" id="vc_portador" name="vc_portador" placeholder="Digite o nome do portador">{{ old('vc_portador', isset($tarefa) ? $tarefa->vc_portador : '') }}</textarea>
</div>

<div class="form-group">
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="ativo" name="ativo"
               {{ old('ativo', isset($tarefa) ? $tarefa->ativo : true) ? 'checked' : '' }}>
        <label class="form-check-label" for="ativo">Ativo</label>
    </div>
</div>
