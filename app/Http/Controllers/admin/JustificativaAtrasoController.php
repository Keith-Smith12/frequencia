<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JustificativaAtraso;  // Alterado para JustificativaAtraso
use App\Models\TarefaUsuario; 
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;

class   JustificativaAtrasoController extends Controller
{
    /**
     * Listar justificativas de atraso.
     */
    public function index()
    {
        $data['justificativasAtraso'] = JustificativaAtraso::join('atrasos', 'justificativa_atrasos.it_id_atraso', '=', 'atrasos.id')
            ->join('tarefa_usuarios', 'atrasos.it_id_tarefa_usuario', '=', 'tarefa_usuarios.id')
            ->join('usuarios', 'tarefa_usuarios.it_id_usuario', '=', 'usuarios.id')
            ->join('tarefas', 'tarefa_usuarios.it_id_tarefa', '=', 'tarefas.id')
            ->select(
                'justificativa_atrasos.*',
                'usuarios.vc_nome as usuario',     
                'tarefas.vc_nome as tarefa'     
            )
            ->get();

        $tarefasUsuarios = TarefaUsuario::all(); 
        return view('admin.justificativaAtraso.index', $data, compact('tarefasUsuarios'));
    }

    /**
     * Exibir formulário de criação.
     */
    public function create()
    {
        $tarefasUsuarios = TarefaUsuario::all(); 
        return view('admin.justificativaAtraso.create', $data, compact('tarefasUsuarios'));
    }

    /**
     * Criar uma nova justificativa de atraso.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'it_id_atraso' => 'required|integer|exists:atrasos,id',  
            'vc_descricao' => 'required|string|min:5', 
        ]);        

        try {
            JustificativaAtraso::create($request->all());

            return redirect()->route('justificativaAtraso.index')
                ->with('success', 'Justificativa de atraso registrada com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao registrar justificativa de atraso: ' . $e->getMessage());
        }
    }

    /**
     * Exibir uma justificativa de atraso específica.
     */
    public function show($id)
    {
        $justificativaAtraso = JustificativaAtraso::findOrFail($id);
        return view('admin.justificativaAtraso.show', compact('justificativaAtraso'));
    }

    /**
     * Exibir formulário de edição.
     */
    public function edit($id)
    {
        $justificativaAtraso = JustificativaAtraso::findOrFail($id);
        return view('admin.justificativaAtraso.edit', compact('justificativaAtraso'));
    }

    /**
     * Atualizar uma justificativa de atraso.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'it_id_atraso' => 'required|integer|exists:atrasos,id',  // Alterado para relacionar com Atraso
            'vc_descricao' => 'required|string|min:5', 
        ]);

        try {
            $justificativaAtraso = JustificativaAtraso::findOrFail($id);
            $justificativaAtraso->update($request->all());

            return redirect()->route('justificativaAtraso.index')
                ->with('success', 'Justificativa de atraso atualizada com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao atualizar justificativa de atraso: ' . $e->getMessage());
        }
    }

    /**
     * Deletar uma justificativa de atraso.
     */
    public function destroy($id)
    {
        $justificativaAtraso = JustificativaAtraso::findOrFail($id);
        $justificativaAtraso->delete();

        return redirect()->route('justificativaAtraso.index')
            ->with('success', 'Justificativa de atraso deletada com sucesso!');
    }
}
