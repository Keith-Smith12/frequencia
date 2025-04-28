<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
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
            back()->withErrors(['email' => 'Credenciais inválidas.']);
        }
        return back()->withErrors(['email' => 'Credenciais inválidas.']);
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

}
