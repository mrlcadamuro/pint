<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Mostrar o formulário de registro
    public function showRegisterForm()
    {
        return view('auth.register'); // Retorna a view de registro
    }

    // Registrar um novo usuário
    public function register(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        try {
            // Criar o usuário
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Fazer login do usuário
            Auth::login($user);

            // Redirecionar para a dashboard ou outra página
            return redirect()->route('login')->with('success', 'Registro bem-sucedido!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Erro ao registrar usuário: ' . $e->getMessage()]);
        }
    }

    public function showLoginForm()
    {
        return view('auth.login'); // Retorna a view de registro
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            $user = Auth::user();

            if ($user->email === 'murilo@gmail.com' && $user->name === 'murilo' && Hash::check('12345678', $user->password)) {
                return redirect()->route('admin.index')->with('success', 'Login bem-sucedido!');
            }
    
            return redirect()->route('home.index')->with('success', 'Login bem-sucedido!');
        }
    
        // Se as credenciais estiverem erradas
        return back()->withErrors([
            'email' => 'As credenciais fornecidas estão incorretas.',
        ]);
    }
    
}