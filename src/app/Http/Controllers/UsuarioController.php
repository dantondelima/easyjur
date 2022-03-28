<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\Usuario;
use App\Services\Interfaces\UsuarioServiceInterface;
use App\Services\UsuarioService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    protected UsuarioServiceInterface $service;

    public function __construct(UsuarioServiceInterface $service)
    {
        $this->service = $service;
    }

    public function login()
    {
        return view('login');
    }

    public function logar(Request $request)
    {
        $resultado = $this->service->logar($request->all());

        if ($resultado){
            return redirect(route('home'));
        }

        return back()->with('error', 'Email ou senha incorretos');
    }

    public function logout()
    {
        Auth::guard('usuario')->logout();
        return redirect(route('login'));
    }

    public function create()
    {
        return view('register');
    }

    public function store(UsuarioRequest $request)
    {
        $resultado = $this->service->create($request->all());
        if ($resultado){
            return redirect(route('home'));
        }

        return back()->with('error', 'Não foi possível realizar o cadastro');
    }

    public function edit()
    {
        $usuario = $this->service->find(Auth::guard('usuario')->user()->id);
        return view('profile')->with('usuario', $usuario);
    }

    public function update(UsuarioRequest $request, Usuario $usuario)
    {
        $result = $this->service->update($usuario->id, $request->all());
        return back()->with('success', 'Registro atualizado com sucesso');
    }
}
