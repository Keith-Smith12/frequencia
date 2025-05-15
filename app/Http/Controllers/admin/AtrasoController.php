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
            ->join('users', 'tarefa_usuarios.it_id_usuario', '=', 'users.id')
            ->join('tarefas', 'tarefa_usuarios.it_id_tarefa', '=', 'tarefas.id')
            ->select(
                'atrasos.*',
                'users.vc_nome as usuario',     
                'tarefas.vc_nome as tarefa'     
            )
            ->get();
            

            return view('Site.Pages.atraso.show', $data );
            
    }

    /**
     * Exibir formulário de criação.
     */
    public function create()
    {
        $tarefasUsuarios = TarefaUsuario::all(); 
        return view('Site.Pages.atraso.create', compact('tarefasUsuarios'));
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
        $tarefasUsuarios = TarefaUsuario::all(); 
        $atraso = Atraso::findOrFail($id);
        return view('Site.Pages.atraso.edit', compact('atraso', 'tarefasUsuarios'));
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
