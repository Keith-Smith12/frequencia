<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Tela de edição de tarefas</h1>
    <form action="{{ route('tarefa.update', ['id' => $tarefa->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="vc_nome">Nome</label>
            <input type="text" name="vc_nome" id="vc_nome" value="{{ old('vc_nome', $tarefa->vc_nome) }}" required>
        </div>

        <div>
            <label for="vc_descricao">Descrição</label>
            <input type="text" name="vc_descricao" id="vc_descricao"
                value="{{ old('vc_descricao', $tarefa->vc_descricao) }}">
        </div>

        <div>
            <label for="dt_data_entrega">Data de Entrega</label>
            <input type="date" name="dt_data_entrega" id="dt_data_entrega"
                value="{{ old('dt_data_entrega', $tarefa->dt_data_entrega) }}" required>
        </div>

        <div>
            <label for="vc_portador">Portador</label>
            <input type="text" name="vc_portador" id="vc_portador"
                value="{{ old('vc_portador', $tarefa->vc_portador) }}" required>
        </div>

        <div>
            <label for="ativo">ATIVO</label>
            <select name="ativo">
                <option value="true">true</option>
                <option value="false">false</option>
            </select>
        </div>

        <button type="submit">Salvar</button>
    </form>
</body>

</html>
