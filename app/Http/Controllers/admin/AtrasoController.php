<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Atraso; 
use App\Models\TarefaUsuario; 
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;

class AtrasoController extends Controller
{
    /**
     * Listar atrasos.
     */
    public function index()
    {
        $data['atrasos'] = Atraso::join('tarefa_usuarios', 'atrasos.it_id_tarefa_usuario', '=', 'tarefa_usuarios.id')
            ->join('usuarios', 'tarefa_usuarios.it_id_usuario', '=', 'usuarios.id')
            ->join('tarefas', 'tarefa_usuarios.it_id_tarefa', '=', 'tarefas.id')
            ->select(
                'atrasos.*',
                'usuarios.vc_nome as usuario',     
                'tarefas.vc_nome as tarefa'     
            )
            ->get();

            $tarefasUsuarios = TarefaUsuario::all(); 
            return view('admin.atraso.index', $data, compact('tarefasUsuarios'));
            
    }

    /**
     * Exibir formulário de criação.
     */
    public function create()
    {
        $tarefasUsuarios = TarefaUsuario::all(); 
        return view('admin.atraso.create', compact('tarefasUsuarios'));
    }



    /**
     * Criar um novo atraso.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'it_id_tarefa_usuario' => 'required|integer|exists:tarefa_usuarios,id', 
            'qtd_dias' => 'required|integer|min:1', 
        ]);        

        try {
            Atraso::create($request->all());

            return redirect()->route('atraso.index')
                ->with('success', 'Atraso registrado com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao registrar atraso: ' . $e->getMessage());
        }
    }

    /**
     * Exibir um atraso específico.
     */
    public function show($id)
    {
        $atraso = Atraso::findOrFail($id);
        return view('admin.atraso.index', compact('atraso'));
    }

    /**
     * Exibir formulário de edição.
     */
    public function edit($id)
    {
        $atraso = Atraso::findOrFail($id);
        return view('admin.atraso.index', compact('atraso'));
    }

    /**
     * Atualizar um atraso.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'it_id_tarefa_usuario' => 'required|integer|exists:tarefa_usuarios,id', 
            'qtd_dias' => 'required|integer|min:1', 
        ]);

        try {
            $atraso = Atraso::findOrFail($id);
            $atraso->update($request->all());

            return redirect()->route('atraso.index')
                ->with('success', 'Atraso atualizado com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao atualizar atraso: ' . $e->getMessage());
        }
    }

    /**
     * Deletar um atraso.
     */
    public function destroy($id)
    {
        $atraso = Atraso::findOrFail($id);
        $atraso->delete();

        return redirect()->route('atraso.index')
            ->with('success', 'Atraso deletado com sucesso!');
    }
}
