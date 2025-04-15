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
        $data['justificativaAtrasos'] = JustificativaAtraso::join('tarefa_usuarios', 'justificativa_atrasos.it_id_atraso', '=', 'atrasos.id')
            ->select(
                'justificativa_atrasos.*',
                'atrasos.qtd_dias as dias',       
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
        return view('admin.justificativaAtraso.create', compact('tarefasUsuarios'));
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
        $justificativaAtraso = JustificativaAtraso::findOrFail($id);
        return view('admin.justificativaAtraso.index', compact('atraso'));
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
