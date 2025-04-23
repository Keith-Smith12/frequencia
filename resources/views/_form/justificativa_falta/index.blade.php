<!-- Campo Frequência -->
<div class="form-group">
    <label for="it_id_frequencia">Frequência</label>
    <select class="form-control" id="it_id_frequencia" name="it_id_frequencia" required>
        <option value="">Selecione a frequência</option>
        @foreach ($frequencias as $frequencia)
            <option value="{{ $frequencia->id }}" 
                    {{ old('it_id_frequencia', $justificativaFalta->it_id_frequencia ?? '') == $frequencia->id ? 'selected' : '' }}>
                    {{ $frequencia->vc_tipo }} - {{ $frequencia->tm_hora_entrada }} a {{ $frequencia->tm_hora_saida }}
            </option>
        @endforeach
    </select>
</div>

<!-- Campo Descrição da Justificativa -->
<div class="form-group">
    <label for="vc_descricao">Descrição da Justificativa</label>
    <textarea class="form-control" id="vc_descricao" name="vc_descricao" rows="4" required
              placeholder="Descreva o motivo da justificativa">{{ old('vc_descricao', $justificativaFalta->vc_descricao ?? '') }}</textarea>
</div>
