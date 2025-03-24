<?php

namespace App\Http\Controllers;

use App\Models\JustificativaAtraso;
use Exception;
use Illuminate\Http\Request;

class JustificativaAtrasoController extends Controller
{
    public function index()
    {
        $justificativaAtrasos =JustificativaAtraso::all();
        return view ('Site.Pages.justificativaAtrasos.show',compact('justificativaAtrasos'));
    }

    public function create()
    {
        return view('Site.Pages.justificativaAtrasos.create');
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                "it_id_atraso"=> "required|integer" ,
                "vc_descricao" => "required|string"
            ]);

            $justificativaAtrasos = JustificativaAtraso::create($request->all());
            
            return redirect()->route('justificativaAtrasos.index')->with('success', 'JustificativaAtraso Criado');

        }
        catch(Exception $e)
        {
            return redirect()->route('justificativaAtrasos.index')->with('error','Erro ao criar JustificativaAtraso: '. $e->getMessage());
        }
    }

    public function edit($id)
    {
        try
        {
            $justificativaAtrasos = JustificativaAtraso::find($id);
            return view ('Site.Pages.justificativaAtrasos.edit',compact('justificativaAtrasos'));
        }
        catch(Exception $e)
        {
            return redirect()->back()->with('error', 'Erro ao criar JustificativaAtraso: ' . $e->getMessage());
        }
    }

    public function update(Request $request,$id)
    {
        try
        {  
            $request -> validate([
                "it_id_atraso"=> "required|integer" ,
                "vc_descricao" => "required|string"
            ]);
            $justificativaAtrasos = JustificativaAtraso::findOrfail($id);  
            $justificativaAtrasos -> update($request->all());

            return redirect()->route('justificativaAtrasos.index')->with('success', 'JustificativaAtraso Editado');
        }
        catch(Exception $e)
        {
            return redirect()->back()->with('error', 'Erro ao criar JustificativaAtraso: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try
        {
            $justificativaAtrasos = JustificativaAtraso::findOrfail($id);
            $justificativaAtrasos -> delete($id);
            return redirect()->route('justificativaAtrasos.index')->with('success', 'JustificativaAtraso Deletado');
        }
        catch(Exception $e)
        {
            return redirect()->back()->with('error','Erro ao editar JustificativaAtraso: ', $e->getMessage());
        }
    }
}
