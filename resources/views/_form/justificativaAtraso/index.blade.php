<div class="form-group">
    <label for="it_id_atraso">Usuário e Tarefa</label>
    <select class="form-control" id="it_id_atraso" name="it_id_atraso" required>
        <option value="">Selecione a tarefa e o usuário</option>
        @foreach ($tarefasUsuarios as $tarefaUsuario)
                <option value="{{ $tarefaUsuario->id }}"
                    {{ old('it_id_atraso', $justificativa->it_id_atraso ?? '') == $tarefaUsuario->id ? 'selected' : '' }}>
                    {{ $justificativa->usuario ?? 'Sem nome' }} - {{ $tarefaUsuario->tarefas->vc_nome ?? 'Sem título' }}
                </option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="vc_descricao">Justificativa</label>
    <textarea class="form-control" id="vc_descricao" name="vc_descricao" rows="3"
              placeholder="Digite a justificativa" required>{{ old('vc_descricao', $justificativa->vc_descricao ?? '') }}</textarea>
</div>
