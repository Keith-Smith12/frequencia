<?php

namespace App\Http\Controllers;

use App\Models\JustificativaFalta;
use Exception;
use Illuminate\Http\Request;

class JustificativaFaltaController extends Controller
{
    public function index()
    {
        $justificativaFaltas =JustificativaFalta::all();
        return view ('Site.Pages.justificativaFaltas.show',compact('justificativaFaltas'));
    }

    public function create()
    {
        return view('Site.Pages.justificativaFaltas.create');
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                "it_id_frequencia"=> "required|integer" ,
                "vc_descricao" => "required|string"
            ]);

            $justificativaFaltas = JustificativaFalta::create($request->all());
            
            return redirect()->route('justificativaFaltas.index')->with('success', 'JustificativaFalta Criada');

        }
        catch(Exception $e)
        {
            return redirect()->route('justificativaFaltas.index')->with('error','Erro ao criar JustificativaFalta: '. $e->getMessage());
        }
    }

    public function edit($id)
    {
        try
        {
            $justificativaFaltas = JustificativaFalta::find($id);
            return view ('Site.Pages.justificativaFaltas.edit',compact('justificativaFaltas'));
        }
        catch(Exception $e)
        {
            return redirect()->back()->with('error', 'Erro ao criar JustificativaFalta: ' . $e->getMessage());
        }
    }

    public function update(Request $request,$id)
    {
        try
        {  
            $request -> validate([
                "it_id_frequencia"=> "required|integer" ,
                "vc_descricao" => "required|string"
            ]);
            $justificativaFaltas = JustificativaFalta::findOrfail($id);  
            $justificativaFaltas -> update($request->all());

            return redirect()->route('justificativaFaltas.index')->with('success', 'JustificativaFalta Editada');
        }
        catch(Exception $e)
        {
            return redirect()->back()->with('error', 'Erro ao criar JustificativaFalta: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try
        {
            $justificativaFaltas = JustificativaFalta::findOrfail($id);
            $justificativaFaltas -> delete($id);
            return redirect()->route('justificativaFaltas.index')->with('success', 'JustificativaFalta Deletada');
        }
        catch(Exception $e)
        {
            return redirect()->back()->with('error','Erro ao editar JustificativaFalta: ', $e->getMessage());
        }
    }
}
