<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JustificativaAtraso;
use App\Models\TarefaUsuario;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;

class JustificativaAtrasoController extends Controller
{
    /**
     * Listar atrasos.
     */
    public function index()
    {
        $data['justificativasAtraso'] = JustificativaAtraso::join('atrasos', 'justificativa_atrasos.it_id_atraso', '=', 'atrasos.id')
            ->join('tarefa_usuarios', 'atrasos.it_id_tarefa_usuario', '=', 'tarefa_usuarios.id')
            ->join('users', 'tarefa_usuarios.it_id_usuario', '=', 'users.id')
            ->join('tarefas', 'tarefa_usuarios.it_id_tarefa', '=', 'tarefas.id')
            ->select(
                'justificativa_atrasos.*',
                'users.vc_nome as usuario',     
                'tarefas.vc_nome as tarefa'     
            )
            ->get();

        $tarefasUsuarios = TarefaUsuario::all(); 
            return view('Site.Pages.justificativaAtraso.show', $data, compact('tarefasUsuarios'));
            
    }

    /**
     * Exibir formulário de criação.
     */
    public function create()
    {
        $tarefasUsuarios = TarefaUsuario::all(); 
        return view('Site.Pages.justificativaAtraso.create', compact('tarefasUsuarios'));
    }



    /**
     * Criar um novo atraso.
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
                ->with('success', 'justificativaAtraso registrado com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao registrar atraso: ' . $e->getMessage());
        }
    }

    /**
     * Exibir um atraso específico.
     */
    public function show($id)
    {
        $justificativaAtraso = JustificativaAtraso::findOrFail($id);
        return view('admin.justificativaAtraso.index', compact('atraso'));
    }

    /**
     * Exibir formulário de edição.
     */
    public function edit($id)
    {
        $tarefasUsuarios = TarefaUsuario::all(); 
        $justificativa = JustificativaAtraso::findOrFail($id);
        return view('Site.Pages.justificativaAtraso.edit', compact('tarefasUsuarios', 'justificativa'));
    }

    /**
     * Atualizar um atraso.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'it_id_atraso' => 'required|integer|exists:atrasos,id',  
            'vc_descricao' => 'required|string|min:5', 
        ]);

        try {
            $justificativaAtraso = JustificativaAtraso::findOrFail($id);
            $justificativaAtraso->update($request->all());

            return redirect()->route('justificativaAtraso.index')
                ->with('success', 'Atraso atualizado com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao atualizar justificativaAtraso: ' . $e->getMessage());
        }
    }

    /**
     * Deletar um atraso.
     */
    public function destroy($id)
    {
        $justificativaAtraso = JustificativaAtraso::findOrFail($id);
        $justificativaAtraso->delete();

        return redirect()->route('justificativaAtraso.index')
            ->with('success', 'justificativaAtraso deletado com sucesso!');
    }
}
