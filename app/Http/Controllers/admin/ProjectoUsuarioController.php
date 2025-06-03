<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Projecto;
use App\Models\ProjectoUsuario;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class ProjectoUsuarioController extends Controller
{
public function index()
    {   if (Auth::user()->vc_tipo === 'admin') {
              $data['projectoUsuarios'] = ProjectoUsuario::join('users', 'projecto_usuarios.it_id_user', '=', 'users.id')
            ->join('projectos', 'projecto_usuarios.it_id_projecto', '=', 'projectos.id')
            ->select(
                'projecto_usuarios.*',
                'users.vc_nome as nome_usuario',
                'projectos.vc_nome as nome_projecto'
            )
            ->get();
    
        $data['usuarios'] = \App\Models\User::all();
        $data['projectos'] = \App\Models\Projecto::all();
    
        return view('Site.Pages.projectoUsuario.show', $data);
        }elseif (Auth::user()->vc_tipo === 'user') {
              $data['projectoUsuario'] = ProjectoUsuario::join('users', 'projecto_usuarios.it_id_user', '=', 'users.id')
            ->join('projectos', 'projecto_usuarios.it_id_projecto', '=', 'projectos.id')
            ->where('projecto_usuarios.it_id_usuario',Auth::user()->id)
            ->select(
                'projecto_usuarios.*',
                'users.vc_nome as nome_usuario',
                'projectos.vc_nome as nome_projecto'
            )
            ->get();
    
        $data['usuarios'] = \App\Models\User::find(Auth::user()->id);
        $data['tarefas'] = \App\Models\Tarefa::where('tarefa_usuario.it_id_usuario',Auth::user()->id);
        
        return view('Site.Pages.projectoUsuario.tpc', $data);
        }

    }
    

    /**
     * Exibir formulário de criação.
     */
    public function create()
    {
        $data['usuarios'] = User::all();
        $data['projectos'] = Projecto::all();
    
        return view('Site.Pages.projectoUsuario.create', $data);
    }

    /**
     * Criar um novo exemplo.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'it_id_user' => ['required', 'array'],
        'it_id_user.*' => ['integer', 'exists:users,id'],
        'it_id_projecto' => 'required|integer',
        ]);        
        dd($request->all());
        try {
            $idsUsuarios = $request->it_id_user; 
            foreach ($idsUsuarios as $idUsuario) {
                ProjectoUsuario::create([
                    'it_id_user' => $idUsuario,
                    'it_id_projecto' => $request->it_id_projecto,
                ]);
            }
            return redirect()->route('projectoUsuario.index')
                ->with('success', 'projectoUsuario criado com sucesso!');
        } catch (Exception $e) {
          //  dd($e);
            return back()->with('error', 'Erro ao criar projectoUsuario: ' . $e->getMessage());
        }
    }
    public function show($id)
    {
        $projectousuario = ProjectoUsuario::findOrFail($id);
        return view('admin.projectoUsuario.index', compact('projectousuario'));
    }

    /**
     * Exibir formulário de edição.
     */
    public function edit($id)
    {
        $projectoUsuario = ProjectoUsuario::findOrFail($id);
        $usuarios = User::all();
        $projectos = Projecto::all();
        return view('Site.Pages.projectoUsuario.edit', compact('projectoUsuario','usuarios','projectos'));
    }

    /**
     * Atualizar um exemplo.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'it_id_user' => 'required|integer|',
            'it_id_projecto' => 'required|integer|',
        ]);        



        try {
            $projectousuario = ProjectoUsuario::findOrFail($id);
            $projectousuario-> update($request->all());
            return redirect()->route('projectoUsuario.index')
                ->with('success', 'projectoUsuario atualizado com sucesso!');
        } catch (Exception $e) {
            return back()->with('error', 'Erro ao atualizar Projecto Usuário: ' . $e->getMessage());
        }
    }

    /**
     * Deletar um exemplo.
     */
    public function destroy($id)
    {
        $projectousuario = ProjectoUsuario::findOrFail($id);
        $projectousuario-> delete();

        return redirect()->route('projectoUsuario .index')
            ->with('success', 'usuário removido com sucesso!');
    }


}
