<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users=User::all();
        return view ('Site.Pages.User.show',compact('users'));
    }

    public function create()
    {
        return view('Site/Pages/User/create');
    }

    public function store(Request $request)
    {
        try{
            
            $request->validate([
                "name" =>  "required|string" ,
                "email"=> "required" ,
                "password" => "required"
            ]);

            $users=User::create($request->all());
            
            return redirect()->route('user.index')->with('success', 'Usuario Criado');

        }
        catch(Exception $e)
        {
            return redirect()->route('user.index')->with('error','Erro ao criar usuário'. $e->getMessage());
        }
    }

    public function edit($id)
    {
        try
        {
            $user= User::find($id);
            return view ('Site.Pages.User.edit',compact('user'));
        }
        catch(Exception $e)
        {
            return redirect()->back()->with('error', 'Erro ao criar usuário: ' . $e->getMessage());
        }
    }

    public function update(Request $request,$id)
    {
        try
        {  
            $request -> validate([
                "name" =>  "required|string" ,
                "email"=> "required" ,
                "password" => "required"
            ]);
            $user = User::findOrfail($id);  
            $user -> update($request->all());

            return redirect()->route('user.index')->with('success', 'Usuario Editado');
        }
        catch(Exception $e)
        {
            return redirect()->back()->with('error', 'Erro ao criar usuário: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        try
        {
            $users= User::findOrfail($id);
            $users->delete($id);
            return redirect()->route('user.index')->with('success', 'Usuario Deletado');
        }
        catch(Exception $e)
        {
            return redirect()->back()->with('error','Erro ao editar usuário', $e->getMessage());
        }
    }
}
