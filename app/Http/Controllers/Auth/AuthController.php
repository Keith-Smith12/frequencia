<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){

    $credentials = $request->only('email', 'password');
    $user = User::where('email', $credentials['email'])->first();

    if ($user && Hash::check($credentials['password'], $user->password)) {
        Auth::login($user);
            return redirect('/user');
        } else {
            return back()->with('error', ' Credenciais Inválidas');
        }
        return back()->with('error', ' Credenciais Inválidas');
    }

    public function register(Request $request){
        try
        {
            $request->validate([
                "vc_nome" =>  "required|string" ,
                "email"=> "required" ,
                "vc_classe"=> "required|string" ,
                "password" => "required",
            ]);
            $user=User::create($request->all());
            Auth::login($user);
           return redirect()->route('user.index')->with('success','usuário criado com sucesso!');
        }
        catch(Exception $e)
        {
            return redirect()->back()->with('error', 'Erro ao criar usuário: ' . $e->getMessage());
        }    
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

}
