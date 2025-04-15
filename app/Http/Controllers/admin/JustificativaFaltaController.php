<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JustificativaFalta; // Alterado para o modelo JustificativaFalta
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;

class JustificativaFaltaController extends Controller
{
    /**
     * Listar justificativas de falta.
     */
    public function index()
    {
        $data['justificativas'] = JustificativaFalta::join('frequencias', 'justificativa_faltas.it_id_frequencia', '=', 'frequencias.id')
            ->select(
                'justificativa_faltas.*',
                'frequencias.vc_tipo as f_tipo' // Seleciona o tipo da frequência
            )
            ->get();

        $frequencias = \App\Models\Frequencia::all(); 

        return view('admin.justificativa_falta.index', $data, compact('frequencias'));
    }

    /**
     * Exibir formulário de criação.
     */
    public function create()
    {
        $frequencias = \App\Models\Frequencia::all();  
        return view('admin.justificativa_falta.create', compact('frequencias'));
    }

    /**
     * Criar uma nova justificativa de falta.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'it_id_frequencia' => 'required|integer|exists:frequencias,id', // Relacionamento com Frequencia
            'vc_descricao' => 'required|string|min:3|max:500', // Descrição da justificativa
        ]);        

        try {
            JustificativaFalta::create($request->all());

            return redirect()->route('justificativa_falta.index')
                ->with('success', 'Justificativa de falta criada com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao criar justificativa de falta: ' . $e->getMessage());
        }
    }

    /**
     * Exibir uma justificativa de falta específica.
     */
    public function show($id)
    {
        $justificativaFalta = JustificativaFalta::findOrFail($id);
        return view('admin.justificativa_falta.index', compact('justificativaFalta'));
    }

    /**
     * Exibir formulário de edição.
     */
    public function edit($id)
    {
        $justificativaFalta = JustificativaFalta::findOrFail($id);
        return view('admin.justificativa_falta.index', compact('justificativaFalta'));
    }

    /**
     * Atualizar uma justificativa de falta.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'it_id_frequencia' => 'required|integer|exists:frequencias,id', // Relacionamento com Frequencia
            'vc_descricao' => 'required|string|min:3|max:500', // Descrição da justificativa
        ]);

        try {
            $justificativaFalta = JustificativaFalta::findOrFail($id);
            $justificativaFalta->update($request->all());

            return redirect()->route('justificativa_falta.index')
                ->with('success', 'Justificativa de falta atualizada com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao atualizar justificativa de falta: ' . $e->getMessage());
        }
    }

    /**
     * Deletar uma justificativa de falta.
     */
    public function destroy($id)
    {
        $justificativaFalta = JustificativaFalta::findOrFail($id);
        $justificativaFalta->delete();

        return redirect()->route('justificativa_falta.index')
            ->with('success', 'Justificativa de falta deletada com sucesso!');
    }
}
