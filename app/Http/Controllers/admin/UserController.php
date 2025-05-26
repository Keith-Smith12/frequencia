<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Atraso;
use App\Models\Frequencia;
use App\Models\Projecto;
use App\Models\Tarefa;
use App\Models\TarefaUsuario;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {



    public function index()
    {

        $users = User::count();
        $atrasos = Atraso::count();
        $FQs = Frequencia::count();
        $Tpcs = Tarefa::count();
        $Tpcpf = TarefaUsuario::count();
        $date= date('M-Y');

         $data['projectos'] = Projecto::join('users', 'projectos.it_id_usuario', '=', 'users.id')
            ->where('projectos.it_id_usuario',Auth::user()->id)
            ->select(
                'projectos.*',
                'users.vc_nome as u_nome'
            )
            ->get();

            return view ('Site.layouts.dashboard',$data, compact('users','atrasos','FQs','Tpcs','Tpcpf','date'));
        
    }

    public function all()
    {
        $users = User::all();
        return view ('Site.Pages.user.show',compact('users'));
        
    }
    
    public function create()
    {
        return view('Site.Pages.User.create');
    }

    public function store(Request $request)
    { 
        try
        {
            $request->validate([
                "vc_nome" =>  "required|string" ,
                "email"=> "required" ,
                "vc_classe"=> "required|string" ,
                "password" => "required",
            ]);
            $user=User::create($request->all());
            return redirect()->route('user.index.2')->with('success','usuário criado com sucesso!');
        }
        catch(Exception $e)
        {
            return redirect()->back()->with('error', 'Erro ao criar usuário: ' . $e->getMessage());
        }
    }

    public function update(Request $request,$id){
        try{
         $user= User::findOrfail($id);    
            $request->validate([
                "vc_nome" =>  "required|string" ,
                "email"=> "required" ,
                "vc_classe"=> "required" ,
                "password" => "required",
            ]);
            $user = $user->update($request->all());
        return redirect()->route('user.index')->with('success','perfil atualizado com sucesso!');
        }catch(Exception $e){
            return redirect()->back()->with('error', 'Erro ao atualizar usuário: ' . $e->getMessage());
        }
    }


   public function edit($id){
    try{
        $user= User::findOrfail($id);
       return view('Site/Pages/User/edit', compact('user'));
    }catch(Exception $e){
        return redirect()->back()->with('error', 'Erro ao editar usuário: ' . $e->getMessage());
    }
   }

   public function delete($id){
    try{
        $user= User::findOrfail($id);
        $user->delete($id);
        return redirect()->route('user.all')->with('success','usuário deletado com sucesso!');
    }catch(Exception $e){
        return redirect()->back()->with('error','Erro ao editar usuário', $e->getMessage());
    }
   }
}
