<div class="form-group">
    <label for="it_id_tarefa_usuario">Usuário e Tarefa</label>
    <select class="form-control" id="it_id_tarefa_usuario" name="it_id_tarefa_usuario" required>
        <option value="">Selecione a tarefa e o usuário</option>
        @foreach ($tarefasUsuarios as $tarefaUsuario)
            <option value="{{ $tarefaUsuario->id }}" 
                {{ old('it_id_tarefa_usuario', $atraso->it_id_tarefa_usuario ?? '') == $tarefaUsuario->id ? 'selected' : '' }}>
                {{ $tarefaUsuario->usuarios->vc_nome ?? 'Sem nome' }} - {{ $tarefaUsuario->tarefas->vc_nome ?? 'Sem título' }}
            </option>
        @endforeach
    </select>
      
</div>

<div class="form-group">
    <label for="qtd_dias">Quantidade de Dias de Atraso</label>
    <input type="number" class="form-control" id="qtd_dias" name="qtd_dias" required 
           placeholder="Digite a quantidade de dias de atraso"
           value="{{ old('qtd_dias', $atraso->qtd_dias ?? '') }}">
</div>
