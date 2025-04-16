<?php

namespace App\Http\Controllers;

use App\Models\categoria_Tarefas;
use App\Models\Tarefa;
use Exception;
use Illuminate\Http\Request;

class categoriaTarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoriasTarefas = categoria_Tarefas::all();
        $tarefas = Tarefa::all();
        view('tarefas.index', compact('categoriasTarefas', 'tarefas'));
        // dd($categoriasTarefas);
        return view('categoriasTarefas.index', compact('categoriasTarefas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $categoria = $request->validate([
                'vc_nome' => 'required|string|max:50',
                'dt_descricao' => 'nullable|string',
                'vc_prioridade' => 'required|string',
                'it_tempo_estimado' => 'required|string',
                'vc_tipo' => 'required|string'
            ]);
            categoria_Tarefas::create($categoria);
            return redirect()->route('categoriaTarefa.index');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $categoria = $request->validate([
                'vc_nome' => 'required|string|max:50',
                'dt_descricao' => 'nullable|string',
                'vc_prioridade' => 'required|string',
                'it_tempo_estimado' => 'required|string',
                'vc_tipo' => 'required|string'
            ]);
            $instancia = categoria_Tarefas::findOrFail($id);
            $instancia->update($categoria);
            return redirect()->route('categoriaTarefa.index');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $instancia = categoria_Tarefas::findOrFail($id);
        $instancia->delete();

        return redirect()->route('categoriaTarefa.index');
    }
}
