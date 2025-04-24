<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TarefaUsuario;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;

class TarefaUsuarioController extends Controller
{
    public function index()
    {
        $data['tarefaUsuarios'] = TarefaUsuario::join('users', 'tarefa_usuarios.it_id_usuario', '=', 'users.id')
            ->join('tarefas', 'tarefa_usuarios.it_id_tarefa', '=', 'tarefas.id')
            ->select(
                'tarefa_usuarios.*',
                'users.vc_nome as nome_usuario',
                'tarefas.vc_nome as nome_tarefa'
            )
            ->get();
    
        $data['usuarios'] = \App\Models\User::all();
        $data['tarefas'] = \App\Models\Tarefa::all();
    
        return view('admin.tarefaUsuario.index', $data);
    }
    

    /**
     * Exibir formulário de criação.
     */
    public function create()
    {
        $data['usuarios'] = \App\Models\User::all();
        $data['tarefas'] = \App\Models\Tarefa::all();
    
        return view('admin.tarefaUsuario.create', $data);
    }

    /**
     * Criar um novo exemplo.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'it_id_usuario' => 'required|integer|exists:usuarios,id',
            'it_id_tarefa' => 'required|integer|exists:usuarios,id',
            'dt_data_atribuicao' => 'required|date',
        ]);        
       // dd($validator);


        try {
            TarefaUsuario::create($request->all());

            return redirect()->route('tarefaUsuario.index')
                ->with('success', 'tarefaUsuario criado com sucesso!');
        } catch (Exception $e) {
          //  dd($e);
            return back()->with('error', 'Erro ao criar tarefaUsuario: ' . $e->getMessage());
        }
    }

    /**
     * Exibir um exemplo específico.
     */
    public function show($id)
    {
        $tarefaUsuario = TarefaUsuario::findOrFail($id);
        return view('admin.tarefaUsuario.index', compact('tarefaUsuario'));
    }

    /**
     * Exibir formulário de edição.
     */
    public function edit($id)
    {
        $tarefaUsuario = TarefaUsuario::findOrFail($id);
        return view('admin.tarefaUsuario.index', compact('tarefaUsuario'));
    }

    /**
     * Atualizar um exemplo.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'it_id_usuario' => 'required|integer|exists:usuarios,id',
            'it_id_tarefa' => 'required|integer|exists:usuarios,id',
            'dt_data_atribuicao' => 'required|date',
        ]);        



        try {
            $tarefaUsuario = TarefaUsuario::findOrFail($id);
            $tarefaUsuario -> update($request->all());
            return redirect()->route('tarefaUsuario.index')
                ->with('success', 'tarefaUsuario atualizado com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao atualizar tarefaUsuario: ' . $e->getMessage());
        }
    }

    /**
     * Deletar um exemplo.
     */
    public function destroy($id)
    {
        $tarefaUsuario = TarefaUsuario::findOrFail($id);
        $tarefaUsuario -> delete();

        return redirect()->route('tarefaUsuario.index')
            ->with('success', 'tarefaUsuario deletado com sucesso!');
    }
}
