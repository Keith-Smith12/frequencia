<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tarefa;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;

class TarefaController extends Controller
{
    public function index()
    {
        $tarefas = Tarefa::all();
        
        return view('Site.Pages.Tarefa.show', compact('tarefas'));
    }

    /**
     * Exibir formulário de criação.
     */
    public function create()
    {
        return view('Site/Pages/Tarefa/create');
    }

    /**
     * Criar uma nova tarefa.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vc_nome' => 'required|min:3|max:100',
            'dt_data_entrega' => 'required|date',
        ]);
       // dd($validator);


        try {
            Tarefa::create($request->all());

            return redirect()->route('tarefa.index')
                ->with('success', 'tarefa criado com sucesso!');
        } catch (Exception $e) {
          //  dd($e);
            return back()->with('error', 'Erro ao criar tarefa: ' . $e->getMessage());
        }
    }

    /**
     * Exibir uma tarefa específico.
     */
    public function show($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        return view('Site.Pages.Tarefa.edit', compact('tarefa'));
    }

    /**
     * Exibir formulário de edição.
     */
    public function edit($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        return view('Site.Pages.Tarefa.edit', compact('tarefa'));
    }

    /**
     * Atualizar uma tarefa.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'vc_nome' => 'required|min:3|max:100',
            'dt_data_entrega' => 'required|date',
        ]);



        try {
            $tarefa = Tarefa::findOrFail($id);
            $tarefa -> update($request->all());
            return redirect()->route('tarefa.index')
                ->with('success', 'tarefa atualizado com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao atualizar tarefa: ' . $e->getMessage());
        }
    }

    /**
     * Deletar uma tarefa.
     */
    public function destroy($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $tarefa -> delete();

        return redirect()->route('tarefa.index')
            ->with('success', 'tarefa deletado com sucesso!');
    }
}
