<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;
use Exception;
use Livewire\Attributes\Validate;

class tarefaController extends Controller
{

    public function index()
    {
        $tarefas = Tarefa::All();
        return view('tarefas.index', compact('tarefas'));
    }

    public function create()
    {
        return view('tarefas.create');
    }

    public function store(Request $request)
    {
        try {
            $validator = $request->validate(
                [
                    "vc_nome" => "required|string|min:4|max:50",
                    "vc_descricao" => "nullable|string|max:500",
                    "dt_data_entrega" => "required|date",
                    "vc_portador" => "required|string|max:50",
                    "ativo" => "in:true, false|required"
                ]
            );
            Tarefa::create($validator);
            return redirect()->route('tarefa.index')->with('sucess', 'Tarefa criada com sucesso!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Retornar erros de validação
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Retornar erro genérico
            return back()->with('error', 'Erro ao atualizar a tarefa: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        // Para o crud tarefas não me foi dada a indicação de criar o método show (diagrama do lucid)
    }

    public function edit($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        return view('tarefas.edit', compact('tarefa'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validator = $request->validate(
                [
                    "vc_nome" => "required|string|min:4|max:50",
                    "vc_descricao" => "nullable|string|max:500",
                    "dt_data_entrega" => "required|date",
                    "vc_portador" => "required|string|max:50",
                    "ativo" => "required",
                ]
            );
            $tarefa = Tarefa::findOrFail($id);
            $tarefa->update($validator);
            return redirect()->route('tarefa.index')->with('success', 'Tarefa atualizada com sucesso!');
            return redirect()->route('tarefa.index')->with('sucess', 'Tarefa criada com sucesso!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Retornar erros de validação
            return back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            // Retornar erro genérico
            return back()->with('error', 'Erro ao atualizar a tarefa: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->ativo = "false";
        $tarefa->save();

        return redirect()->route('tarefa.purge-view')->with('sucess', 'Tarefa deletada com sucesso');
    }

    public function redirectToPurgeView()
    {
        $tarefas = Tarefa::all();
        return view('tarefas.purge', compact('tarefas'));
    }

    public function purge($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->delete();

        return redirect()->route('tarefa.index')->with('sucess', 'Tarefa deletada permanentemente');
    }

    public function restaurar($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->ativo = "true";
        $tarefa->save();

        return redirect()->route('tarefa.index')->with('sucess', 'Tarefa deletada com sucesso');
    }
}
