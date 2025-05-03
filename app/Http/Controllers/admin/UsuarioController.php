<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        
        return view('admin.usuario.index', compact('usuarios'));
    }

    /**
     * Exibir formulário de criação.
     */
    public function create()
    {
        return view('admin.usuario.create');
    }

    /**
     * Criar um novo exemplo.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'vc_nome' => 'required|min:3|max:100',
            'vc_email' => 'required|min:3|max:100',
            'vc_password' => 'required|min:3|max:100',
            'vc_classe' => 'required|min:3|max:100',
            'vc_tipo' => 'required|min:3|max:100',
        ]);
       // dd($validator);


        try {
            Usuario::create($request->all());

            return redirect()->route('usuario.index')
                ->with('success', 'usuario criado com sucesso!');
        } catch (Exception $e) {
          //  dd($e);
            return back()->with('error', 'Erro ao criar usuario: ' . $e->getMessage());
        }
    }

    /**
     * Exibir um exemplo específico.
     */
    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('admin.usuario.index', compact('usuario'));
    }

    /**
     * Exibir formulário de edição.
     */
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('admin.usuario.index', compact('usuario'));
    }

    /**
     * Atualizar um exemplo.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'vc_nome' => 'required|min:3|max:100',
            'vc_email' => 'required|min:3|max:100',
            'vc_password' => 'required|min:3|max:100',
            'vc_classe' => 'required|min:3|max:100',
            'vc_tipo' => 'required|min:3|max:100',
        ]);



        try {
            $usuario = Usuario::findOrFail($id);
            $usuario -> update($request->all());
            return redirect()->route('usuario.index')
                ->with('success', 'usuario atualizado com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao atualizar usuario: ' . $e->getMessage());
        }
    }

    /**
     * Deletar um exemplo.
     */
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario -> delete();

        return redirect()->route('usuario.index')
            ->with('success', 'usuario deletado com sucesso!');
    }
}
