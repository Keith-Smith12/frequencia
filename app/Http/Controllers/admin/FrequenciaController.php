<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Frequencia;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FrequenciaController extends Controller
{

    public function index()
    {   if (Auth::user()->vc_tipo == 'admin') {
              $data['frequencias'] = Frequencia::join('users', 'frequencias.it_id_usuario', '=', 'users.id')
            ->select(
                'frequencias.*',
                'users.vc_nome as u_nome'
            )->get();

        $usuarios = User::all(); 

        return view('Site.Pages.frequencia.show', $data, compact('usuarios'));
    } elseif (Auth::user()->vc_tipo == 'user') {
               $data['frequencias'] = Frequencia::join('users', 'frequencias.it_id_usuario', '=', 'users.id')
               ->where('frequencias.it_id_usuario',Auth::user()->id)->where('frequencias.vc_tipo', 'Falta')
               ->select(
                'frequencias.*',
                'users.vc_nome as u_nome'
            )->get();

        $usuarios = User::find(Auth::user()->id); 
        return view('Site.Pages.frequencia.falta', $data, compact('usuarios'));
    } 
    

    }


    /**
     * Exibir formulário de criação.
     */
    public function create()
    {
        $usuarios = \App\Models\User::all();  
        return view('Site.Pages.frequencia.create', compact('usuarios'));
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
  
        public function edit($id){
            try{
                $usuarios = \App\Models\User::all();  
                $frequencia = Frequencia::findOrFail($id);
               return view('Site/Pages/frequencia/edit', compact('usuarios', 'frequencia'));
            }catch(Exception $e){
                return redirect()->back()->with('error', 'Erro ao editar usuário: ' . $e->getMessage());
            }
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
