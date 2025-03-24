<?php

namespace App\Http\Controllers;

use App\Models\Atraso;
use Exception;
use Illuminate\Http\Request;

class AtrasoController extends Controller
{
    public function index()
    {
        $atrasos = Atraso::all();
        return view ('Site.Pages.atrasos.show',compact('atrasos'));
    }

    public function create()
    {
        return view('Site.Pages.atrasos.create');
    }

    public function store(Request $request)
    {
        try{
            
            $request->validate([
                "it_id_tarefa_usuario"=> "required|integer" ,
                "qtd_dias" => "required|integer"
            ]);

            $atrasos = Atraso::create($request->all());
            
            return redirect()->route('atrasos.index')->with('success', 'Atraso Criado');

        }
        catch(Exception $e)
        {
            return redirect()->route('atrasos.index')->with('error','Erro ao criar atraso'. $e->getMessage());
        }
    }

    public function edit($id)
    {
        try
        {
            $atrasos = Atraso::find($id);
            return view ('Site.Pages.atrasos.edit',compact('atrasos'));
        }
        catch(Exception $e)
        {
            return redirect()->back()->with('error', 'Erro ao criar atraso: ' . $e->getMessage());
        }
    }

    public function update(Request $request,$id)
    {
        try
        {  
            $request -> validate([
                "it_id_tarefa_usuario"=> "required|integer" ,
                "qtd_dias" => "required|integer"
            ]);
            $atrasos = Atraso::findOrfail($id);  
            $atrasos -> update($request->all());

            return redirect()->route('atrasos.index')->with('success', 'Atraso Editado');
        }
        catch(Exception $e)
        {
            return redirect()->back()->with('error', 'Erro ao criar atraso: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try
        {
            $atrasos = Atraso::findOrfail($id);
            $atrasos->delete($id);
            return redirect()->route('atrasos.index')->with('success', 'Atraso Deletado');
        }
        catch(Exception $e)
        {
            return redirect()->back()->with('error','Erro ao editar atraso', $e->getMessage());
        }
    }
}
