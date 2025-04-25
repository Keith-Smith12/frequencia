<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Frequencia;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;

class FrequenciaController extends Controller
{

    public function index()
    {
        $data['frequencias'] = Frequencia::join('usuarios', 'frequencias.it_id_usuario', '=', 'usuarios.id')
            ->select(
                'frequencias.*',
                'usuarios.vc_nome as u_nome'
            )
            ->get();

        $usuarios = \App\Models\Usuario::all(); 

        return view('admin.frequencia.index', $data, compact('usuarios'));
    }


    /**
     * Exibir formulário de criação.
     */
    public function create()
    {
        $usuarios = \App\Models\Usuario::all();  
        return view('admin.frequencia.create', compact('usuarios'));
    }

    /**
     * Criar um novo exemplo.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'dt_data' => 'required|date',
            'tm_hora_entrada' => 'required|date_format:H:i',
            'tm_hora_saida' => 'required|date_format:H:i',
            'it_id_usuario' => 'required|integer|exists:usuarios,id',
            'vc_tipo' => 'required|string|min:3|max:100',
        ]);        
       // dd($validator);


        try {
            Frequencia::create($request->all());

            return redirect()->route('frequencia.index')
                ->with('success', 'frequencia criado com sucesso!');
        } catch (Exception $e) {
          //  dd($e);
            return back()->with('error', 'Erro ao criar frequencia: ' . $e->getMessage());
        }
    }

    /**
     * Exibir um exemplo específico.
     */
    public function show($id)
    {
        $frequencia = Frequencia::findOrFail($id);
        return view('admin.frequencia.index', compact('frequencia'));
    }

    /**
     * Exibir formulário de edição.
     */
    public function edit($id)
    {
        $frequencia = Frequencia::findOrFail($id);
        return view('admin.frequencia.index', compact('frequencia'));
    }

    /**
     * Atualizar um exemplo.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'dt_data' => 'required|date',
            'tm_hora_entrada' => 'required|date_format:H:i',
            'tm_hora_saida' => 'required|date_format:H:i',
            'it_id_usuario' => 'required|integer|exists:usuarios,id',
            'vc_tipo' => 'required|string|min:3|max:100',
        ]);        



        try {
            $frequencia = Frequencia::findOrFail($id);
            $frequencia -> update($request->all());
            return redirect()->route('frequencia.index')
                ->with('success', 'frequencia atualizado com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao atualizar frequencia: ' . $e->getMessage());
        }
    }

    /**
     * Deletar um exemplo.
     */
    public function destroy($id)
    {
        $frequencia = Frequencia::findOrFail($id);
        $frequencia -> delete();

        return redirect()->route('frequencia.index')
            ->with('success', 'frequencia deletado com sucesso!');
    }
}
