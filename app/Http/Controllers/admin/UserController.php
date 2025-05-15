<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller {



    public function index()
    {
        return view ('Site.layouts.dashboard');
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
                "password" => "required",
                'vc_classe' => "required",
                'vc_tipo' => "required",
            ]);
            $user=User::create($request->all());
            return redirect()->route('user.all')->with('success','usuário atualizado com sucesso!');
        }
        catch(Exception $e)
        {
            return redirect()->back()->with('error', 'Erro ao atualizar usuário: ' . $e->getMessage());
        }
    }

    public function update(Request $request,$id){
        try{
         $user= User::findOrfail($id);    
        $request->validate([
            "vc_nome" =>  "required|string" ,
            "email"=> "required" ,
            "password" => "required",
            'vc_classe' => "required",
            'vc_tipo' => "required",
        ]);
        $user = $user->update($request->all());
        return redirect()->route('user.all')->with('success','usuário atualizado com sucesso!');
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
