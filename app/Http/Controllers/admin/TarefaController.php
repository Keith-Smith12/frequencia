<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Tarefa;
use App\Models\Projecto;
use App\Models\CategoriaTarefa;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;

class TarefaController extends Controller
{
    public function index()
    {
        // No TarefaController.php, modifique a consulta no método index():
            try {
         $tarefas = Tarefa::withoutGlobalScopes()
        ->join('projectos', 'tarefas.it_id_projecto', '=', 'projectos.id')
        ->join('categoria_tarefas', 'tarefas.it_id_cat_tarefa', '=', 'categoria_tarefas.id')
        ->select('tarefas.*', 'projectos.vc_nome as projeto_nome', 'categoria_tarefas.vc_nome as categoria_nome')
        ->get(); 
        return view('Site.Pages.Tarefa.show', compact('tarefas'));  
            } catch (\Throwable $th) {
         $tarefas = Tarefa::withoutGlobalScopes()
        ->join('projectos', 'tarefas.it_id_projecto', '=', 'projectos.id')
        ->join('categoria_tarefas', 'tarefas.it_id_cat_tarefa', '=', 'categoria_tarefas.id')
        ->select('tarefas.*', 'projectos.vc_nome as projeto_nome', 'categoria_tarefas.vc_nome as categoria_nome')
        ->get(); 
            }     
        
    }

    public function create()
    {
        $projectos = Projecto::all();
        $categorias = CategoriaTarefa::all();
        
        return view('Site.Pages.Tarefa.create', compact('projectos', 'categorias'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vc_nome' => 'required|min:3|max:100',
            'it_id_projecto' => 'required|exists:projectos,id',
            'it_id_cat_tarefa' => 'required|exists:categorias_tarefas,id',
            'dt_data_entrega' => 'required|date'
        ]);

        try {
            Tarefa::create([
                'vc_nome' => $request->vc_nome,
                'it_id_projecto' => $request->it_id_projecto,
                'it_id_cat_tarefa' => $request->it_id_cat_tarefa,
                'dt_data_entrega' => $request->dt_data_entrega
            ]);

            return redirect()->route('tarefa.index')
                ->with('success', 'Tarefa criada com sucesso!');
        } catch (Exception $e) {
            return back()->withInput()
                ->with('error', 'Erro ao criar tarefa: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $tarefa = Tarefa::select('tarefas.*', 'projectos.vc_nome as projeto_nome', 'categorias_tarefas.vc_nome as categoria_nome')
            ->join('projectos', 'tarefas.it_id_projecto', '=', 'projectos.id')
            ->join('categorias_tarefas', 'tarefas.it_id_cat_tarefa', '=', 'categorias_tarefas.id')
            ->findOrFail($id);
            
        return view('Site.Pages.Tarefa.view', compact('tarefa'));
    }

    public function edit($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $projectos = Projecto::all();
        $categorias = CategoriaTarefa::all();
        
        return view('Site.Pages.Tarefa.edit', compact('tarefa', 'projectos', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'vc_nome' => 'required|min:3|max:100',
            'it_id_projecto' => 'required|exists:projectos,id',
            'it_id_cat_tarefa' => 'required|exists:categorias_tarefas,id',
            'dt_data_entrega' => 'required|date'
        ]);

        try {
            $tarefa = Tarefa::findOrFail($id);
            $tarefa->update([
                'vc_nome' => $request->vc_nome,
                'it_id_projecto' => $request->it_id_projecto,
                'it_id_cat_tarefa' => $request->it_id_cat_tarefa,
                'dt_data_entrega' => $request->dt_data_entrega
            ]);

            return redirect()->route('tarefa.index')
                ->with('success', 'Tarefa atualizada com sucesso!');
        } catch (Exception $e) {
            return back()->withInput()
                ->with('error', 'Erro ao atualizar tarefa: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $tarefa = Tarefa::findOrFail($id);
            $tarefa->delete();

            return redirect()->route('tarefa.index')
                ->with('success', 'Tarefa deletada com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao deletar tarefa: ' . $e->getMessage());
        }
    }
}