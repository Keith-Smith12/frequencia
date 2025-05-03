<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exemplo;
use Exception;
use Illuminate\Support\Facades\Validator;

class exemploController extends Controller
{
    public function index()
    {
        $exemplos = Exemplo::all();
        
        return view('admin.exemplo.index', compact('exemplos'));
    }

    /**
     * Exibir formulário de criação.
     */
    public function create()
    {
        return view('admin.exemplo.create');
    }

    /**
     * Criar um novo exemplo.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|min:3|max:100',
            'valor' => 'required|numeric|min:0',
            'descricao' => 'nullable|max:500',
            'observacao' => 'nullable|max:500',
            'ativo' => 'boolean'
        ]);
       // dd($validator);


        try {
            Exemplo::create($request->all());

            return redirect()->route('admin.exemplo.index')
                ->with('success', 'Exemplo criado com sucesso!');
        } catch (Exception $e) {
          //  dd($e);
            return back()->with('error', 'Erro ao criar exemplo: ' . $e->getMessage());
        }
    }

    /**
     * Exibir um exemplo específico.
     */
    public function show($id)
    {
        $exemplo = Exemplo::findOrFail($id);
        return view('admin.exemplo.index', compact('exemplo'));
    }

    /**
     * Exibir formulário de edição.
     */
    public function edit($id)
    {
        $exemplo = Exemplo::findOrFail($id);
        return view('admin.exemplo.index', compact('exemplo'));
    }

    /**
     * Atualizar um exemplo.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|min:3|max:100',
            'valor' => 'required|numeric|min:0',
            'descricao' => 'nullable|max:500',
            'observacao' => 'nullable|max:500',
            'ativo' => 'boolean'
        ]);



        try {
            $exemplo = Exemplo::findOrFail($id);
            $exemplo->update($request->all());
            return redirect()->route('admin.exemplo.index')
                ->with('success', 'Exemplo atualizado com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao atualizar exemplo: ' . $e->getMessage());
        }
    }

    /**
     * Deletar um exemplo.
     */
    public function destroy($id)
    {
        $exemplo = Exemplo::findOrFail($id);
        $exemplo->delete();

        return redirect()->route('admin.exemplo.index')
            ->with('success', 'Exemplo deletado com sucesso!');
    }
}
