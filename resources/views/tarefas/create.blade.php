<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <h1>Tela de criação de tarefas</h1>

    <nav>
        <button>
            <a href="{{ route('exemplo.index') }}">voltar</a>
        </button>
    </nav>
    <form action="{{ route('tarefa.store') }}" method="POST">
        @csrf
        <div>
            <label for="vc_nome">Nome</label>
            <input type="text" name="vc_nome">
        </div>

        <div>
            <label for="vc_descricao">descricao</label>
            <input type="text" name="vc_descricao">
        </div>

        <div>
            <label for="dt_data_entrega">Data de entrega</label>
            <input type="date" name="dt_data_entrega">
        </div>

        <div>
            <label for="vc_portador">Portador da tarefa</label>
            <input type="text" name="vc_portador">
        </div>

        <input type="text" name="ativo" value="true" style="display: none;">

        <button type="submit">send</button>
    </form>
</body>

</html>

