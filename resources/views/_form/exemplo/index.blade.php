<div class="form-group">
    <label for="nome">Nome</label>
    <input type="text" class="form-control" id="nome" name="nome" required
           placeholder="Digite seu nome"
           value="{{ old('nome', isset($exemplo) ? $exemplo->nome : '') }}">
</div>

<div class="form-group">
    <label for="valor">Valor</label>
    <input type="number" class="form-control" id="valor" name="valor" step="0.01" required
           placeholder="Digite o valor"
           value="{{ old('valor', isset($exemplo) ? $exemplo->valor : '') }}">
</div>

<div class="form-group">
    <label for="descricao">Descrição</label>
    <textarea class="form-control" id="descricao" name="descricao" placeholder="Digite a descrição">{{ old('descricao', isset($exemplo) ? $exemplo->descricao : '') }}</textarea>
</div>

<div class="form-group">
    <label for="observacao">Observação</label>
    <textarea class="form-control" id="observacao" name="observacao" placeholder="Digite a observação">{{ old('observacao', isset($exemplo) ? $exemplo->observacao : '') }}</textarea>
</div>

<div class="form-group">
    <div class="form-check">
        <input type="checkbox" class="form-check-input" id="ativo" name="ativo"
               {{ old('ativo', isset($exemplo) ? $exemplo->ativo : true) ? 'checked' : '' }}>
        <label class="form-check-label" for="ativo">Ativo</label>
    </div>
</div>
