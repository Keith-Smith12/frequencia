<h1>
    Tela de edição de projectos
</h1>
<button>
    <a href="{{route('projecto.index')}}">voltar</a>
</button>

<form action="{{ route('projecto.update', $projecto->id) }}" method="PUT">
    @csrf
    @method('PUT')
    <div>
        <label for="vc_nome">NOME</label>
        <input type="text" name="vc_nome" required value="{{old('vc_nome', $projecto->vc_nome)}}">
    </div>
    <div>
        <label for="dt_data_inicio">DATA DE INÍCIO</label>
        <input type="date" name="dt_data_inicio" required value="{{old('dt_data_inicio', $projecto->dt_data_inicio)}}">
    </div>
    <div>
        <label for="dt_data_conclusao">DATA DE CONCLUSÃO</label>
        <input type="date" name="dt_data_conclusao" required value="{{old('dt_data_conclusao', $projecto->dt_data_conclusao)}}">
    </div>
    <div>
        <label for="it_estado">ESTADO</label>
        <input type="number" name="it_estado" max="1" min="0" required value="{{old('it_estado', $projecto->it_estado)}}">
    </div>
    <div>
        <label for="vc_prioridade">PRIORIDADE</label>
        <input type="text" name="vc_prioridade" value="{{old('vc_prioridade', $projecto->vc_prioridade)}}">
    </div>
    <div>
        <label for="it_id_usuario">ID DO USUÁRIO</label>
        <input type="number" name="it_id_usuario" required value="{{old('it_id_usuario', $projecto->it_id_usuario)}}">
    </div>
    <div>
        <label for="ativo">ATIVO</label>
        <select name="ativo">
            <option value="true">true</option>
            <option value="false">false</option>
        </select>
    </div>
    <button type="submit">send</button>
</form>

