<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Projecto;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;

class ProjectoController extends Controller
{

    public function index()
    {
        $data['projectos'] = Projecto::join('usuarios', 'projectos.it_id_usuario', '=', 'usuarios.id')
            ->select(
                'projectos.*',
                'usuarios.vc_nome as u_nome'
            )
            ->get();

        $usuarios = \App\Models\Usuario::all(); 

        return view('admin.projecto.index', $data, compact('usuarios'));
    }

    /**
     * Exibir formulário de criação.
     */
    public function create()
    {
        $usuarios = \App\Models\Usuario::all();  
        return view('admin.projecto.create', compact('usuarios'));
    }

    /**
     * Criar um novo projecto.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vc_nome' => 'required|string|min:3|max:100',
            'dt_data_inicio' => 'required|date',
            'dt_data_conclusao' => 'required|date',
            'it_estado' => 'required|integer|max:50',
            'vc_prioridade' => 'required|string|min:3|max:50',
            'it_id_usuario' => 'required|integer|exists:usuarios,id',
        ]);        

        try {
            Projecto::create($request->all());

            return redirect()->route('projecto.index')
                ->with('success', 'Projecto criado com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao criar projecto: ' . $e->getMessage());
        }
    }

    /**
     * Exibir um projecto específico.
     */
    public function show($id)
    {
        $projecto = Projecto::findOrFail($id);
        return view('admin.projecto.index', compact('projecto'));
    }

    /**
     * Exibir formulário de edição.
     */
    public function edit($id)
    {
        $projecto = Projecto::findOrFail($id);
        return view('admin.projecto.index', compact('projecto'));
    }

    /**
     * Atualizar um projecto.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'vc_nome' => 'required|string|min:3|max:100',
            'dt_data_inicio' => 'required|date',
            'dt_data_conclusao' => 'required|date',
            'it_estado' => 'required|integer|max:50',
            'vc_prioridade' => 'required|string|min:3|max:50',
            'it_id_usuario' => 'required|integer|exists:usuarios,id',
        ]);        

        try {
            $projecto = Projecto::findOrFail($id);
            $projecto->update($request->all());

            return redirect()->route('projecto.index')
                ->with('success', 'Projecto atualizado com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao atualizar projecto: ' . $e->getMessage());
        }
    }

    /**
     * Deletar um projecto.
     */
    public function destroy($id)
    {
        $projecto = Projecto::findOrFail($id);
        $projecto->delete();

        return redirect()->route('projecto.index')
            ->with('success', 'Projecto deletado com sucesso!');
    }
}
