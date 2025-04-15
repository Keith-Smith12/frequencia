<!-- Dropdown de Usuários -->
<div class="form-group">
    <label for="it_id_usuario">Usuário</label>
    <select class="form-control" id="it_id_usuario" name="it_id_usuario" required>
        <option value="">Selecione o usuário</option>
        @foreach ($usuarios as $usuario)
            <option value="{{ $usuario->id }}" 
                    {{ old('it_id_usuario', $tarefaUsuario->it_id_usuario ?? '') == $usuario->id ? 'selected' : '' }}>
                {{ $usuario->vc_nome }}
            </option>
        @endforeach
    </select>
</div>

<!-- Dropdown de Tarefas -->
<div class="form-group">
    <label for="it_id_tarefa">Tarefa</label>
    <select class="form-control" id="it_id_tarefa" name="it_id_tarefa" required>
        <option value="">Selecione a tarefa</option>
        @foreach ($tarefas as $tarefa)
            <option value="{{ $tarefa->id }}" 
                    {{ old('it_id_tarefa', $tarefaUsuario->it_id_tarefa ?? '') == $tarefa->id ? 'selected' : '' }}>
                {{ $tarefa->vc_nome }}
            </option>
        @endforeach
    </select>
</div>


<div class="form-group">
    <label for="dt_data_atribuicao">Data de Atribuição</label>
    <input type="date" class="form-control" id="dt_data_atribuicao" name="dt_data_atribuicao" required
           placeholder="Digite a data"
           value="{{ old('dt_data_atribuicao', $frequencia->dt_data_atribuicao ?? '') }}">
</div>
