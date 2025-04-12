<?php

namespace App\Http\Controllers;

use App\Models\Projecto;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class projectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projectos = Projecto::all();
        return view('projectos.index', compact('projectos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projectos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $projecto = $request->validate([
            "vc_nome" => "required|string",
            "dt_data_inicio" => "required|date",
            "dt_data_conclusao" => "required|date",
            "it_estado" => "required",
            "vc_prioridade" => "nullable|string",/*pode dar-se o caso de todas as fases do projecto terem o mesmo nível de relevância*/
            "it_id_usuario" => "required",
            "ativo" => "in:true,false|required",
        ]);

        Projecto::create($projecto);
        return redirect()->route('projecto.index')->with('sucess', 'projecto criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //Desnecéssário para o crud projectos (instrução dada no lucid chart)
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $projecto = Projecto::findOrFail($id);
        return view('projectos.edit', compact('projecto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = $request->validate([
            "vc_nome" => "required|string",
            "dt_data_inicio" => "required|date",
            "dt_data_conclusao" => "required|date",
            "it_estado" => "required",
            "vc_prioridade" => "nullable|string",
            "it_id_usuario" => "required",
            "ativo" => "in:true,false|required",
        ]);
        $projecto = Projecto::findOrFail($id);
        $projecto-> update($validator);
        return redirect()->route('projecto.index')->with('sucess', 'projecto atualizado com sucesso!');
    }

    public function destroy($id){
        $projecto = Projecto::findOrFail($id);
        $projecto->ativo = "false";
        return redirect()->route('projecto.purge-view')->wiht('sucess', 'Tarefa deletada com sucesso');
    }

    public function redirectToPurgeView()
    {
        $projectos = Projecto::all();
        return view('projectos.purge', compact('projectos'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function purge(string $id)
    {
        $projecto = Projecto::findOrFail($id);
        $projecto->delete();
        return redirect()->route('projectos.index')->with('sucess', 'projecto deletada com sucesso');
    }


    public function restaurar($id)
    {
        $projecto = Projecto::findOrFail($id);
        $projecto->ativo = "true";
        $projecto->save();

        return redirect()->route('projecto.index')->with('sucess', 'projecto deletada com sucesso');
    }

}
