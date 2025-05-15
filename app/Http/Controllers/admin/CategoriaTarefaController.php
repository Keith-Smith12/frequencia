<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CategoriaTarefa;
use Illuminate\Http\Request;

class CategoriaTarefaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categoriasTarefas = CategoriaTarefa::all();
        return view('Site.Pages.categoriaTarefa.show', compact('categoriasTarefas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Site.Pages.categoriaTarefa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $categoria = $request->validate([
                'vc_nome' => 'required|string|max:50',
                'vc_descricao' => 'nullable|string',
                'vc_prioridade' => 'required|string',
                'it_tempo_estimado' => 'required|string',
                'vc_tipo' => 'required|string'
            ]);
            CategoriaTarefa::create($categoria);
            return redirect()->route('CategoriaTarefa.index');
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
        try{
            $categoriaTarefa = CategoriaTarefa::findOrfail($id);
           return view('Site.Pages.categoriaTarefa.edit', compact('categoriaTarefa'));
        }catch(Exception $e){
            return redirect()->back()->with('error', 'Erro ao editar usuário: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $categoria = $request->validate([
                'vc_nome' => 'required|string|max:50',
                'vc_descricao' => 'nullable|string',
                'vc_prioridade' => 'required|string',
                'it_tempo_estimado' => 'required|string',
                'vc_tipo' => 'required|string'
            ]);
            $instancia = CategoriaTarefa::findOrFail($id);
            $instancia->update($categoria);
            return redirect()->route('CategoriaTarefa.index');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $instancia = CategoriaTarefa::findOrFail($id);
        $instancia->delete();

        return redirect()->route('categoriaTarefa.index');
    }
}
