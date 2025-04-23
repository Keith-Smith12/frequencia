<?php
namespace App\Http\Controllers;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller {

    public function index(){
        $users=User::all();
        return view ('Site/layouts/dashboard',compact('users'));
    }
public function create(){
    return view('Site/Pages/User/create');
}
    public function store(Request $request){

        try{
        $request->validate([
            "name" =>  "required|string" ,
            "email"=> "required" ,
            "password" => "required"
        ]);
        $user=User::create($request->all());
        $request2= [$user->email,$user->password];
        redirect()->route('auth.login',$request2);
        }catch(Exception $e){
            return redirect()->route('index')->with('error','Erro ao criar usuário', $e->getMessage());
        }
    }

    public function update(Request $request,$id){
        try{
         $user= User::findOrfail($id);    
        $request->validate([
            "name" =>  "required|string" ,
            "email"=> "required" ,
            "password" => "required"
        ]);
        $user = $user->update($request->all());
        redirect()->route('index');
        }catch(Exception $e){
            return redirect()->back()->with('error', 'Erro ao criar usuário: ' . $e->getMessage());
        }
    }


   public function edit($id){
    try{
       $user= User::find($id);
       return view('Site/Pages/User/edit',compact($user));
    }catch(Exception $e){
        return redirect()->back()->with('error', 'Erro ao editar usuário: ' . $e->getMessage());
    }
   }

   public function delete($id){
    try{
        $user= User::findOrfail($id);
        $user->delete($id);
        redirect()->route('index');
    }catch(Exception $e){
        return redirect()->back()->with('error','Erro ao editar usuário', $e->getMessage());
    }
   }
}
