<?php

namespace App\Http\Controllers;

use App\Models\CategoriaTarefa;
use Exception;
use Illuminate\Http\Request;

class CategoriaTarefaController extends Controller
{
    public function index()
    {
        $categoriaTarefas = CategoriaTarefa::all();
        return view ('Site.Pages.categoriaTarefas.show',compact('categoriaTarefas'));
    }

    public function create()
    {
        return view('Site.Pages.categoriaTarefas.create');
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                "vc_nome"=> "required|string" ,
                "vc_descricao" => "required|string",
                "vc_prioridade" => "required|string",
                "it_tempo_estimado" => "required|integer",
                "vc_tipo" => "required|string",
            ]);

            $categoriaTarefas = CategoriaTarefa::create($request->all());
            
            return redirect()->route('categoriaTarefas.index')->with('success', 'CategoriaTarefa Criada');

        }
        catch(Exception $e)
        {
            return redirect()->route('categoriaTarefas.index')->with('error','Erro ao criar CategoriaTarefa: '. $e->getMessage());
        }
    }

    public function edit($id)
    {
        try
        {
            $categoriaTarefas = CategoriaTarefa::find($id);
            return view ('Site.Pages.categoriaTarefas.edit',compact('categoriaTarefas'));
        }
        catch(Exception $e)
        {
            return redirect()->back()->with('error', 'Erro ao criar CategoriaTarefa: ' . $e->getMessage());
        }
    }

    public function update(Request $request,$id)
    {
        try
        {  
            $request -> validate([
                "vc_nome"=> "required|string" ,
                "vc_descricao" => "required|string",
                "vc_prioridade" => "required|string",
                "it_tempo_estimado" => "required|integer",
                "vc_tipo" => "required|string",
            ]);
            $categoriaTarefas = CategoriaTarefa::findOrfail($id);  
            $categoriaTarefas -> update($request->all());

            return redirect()->route('categoriaTarefas.index')->with('success', 'CategoriaTarefa Editada');
        }
        catch(Exception $e)
        {
            return redirect()->back()->with('error', 'Erro ao criar CategoriaTarefa: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try
        {
            $categoriaTarefas = CategoriaTarefa::findOrfail($id);
            $categoriaTarefas -> delete($id);
            return redirect()->route('categoriaTarefas.index')->with('success', 'CategoriaTarefa Deletada');
        }
        catch(Exception $e)
        {
            return redirect()->back()->with('error','Erro ao editar CategoriaTarefa: ', $e->getMessage());
        }
    }
}
