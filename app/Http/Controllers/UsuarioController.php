<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index()
    {
        $dados = Usuario::all();
        return view('usuario.list')->with(['dados' => $dados]);
    }

    function create()
    {
        return view('usuario.form');
    }

    function validateForm(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'login' => 'required',
            'senha' => 'required',
        ], [
            'nome.required' => "O :attribute é obrigatorio",
            'email.required' => "O :attribute é obrigatorio",
            'login.required' => "O :attribute é obrigatorio",
            'senha.required' => "A :attribute é obrigatoria",
        ]);
    }

    function store(Request $request)
    {
        $this->validateForm($request);
        $dados = $request->all();
        $dados['senha'] = bcrypt($request->senha); // & erro comum: salvar senha em texto puro
        Usuario::create($dados);
        return redirect('usuario')->with("success", 'Registro Salvo com sucesso!');
    }

    function edit($id)
    {
        $data = Usuario::find($id);
        return view('usuario.form', compact('data'));
    }

    function update(Request $request, $id)
    {
        $this->validateForm($request);
        $dados = $request->all();
        $dados['senha'] = bcrypt($request->senha);
        Usuario::find($id)->update($dados);
        return redirect('usuario')->with("success", 'Registro Atualizado com sucesso!');
    }

    function destroy($id)
    {
        Usuario::destroy($id);
        return redirect('usuario')->with("success", 'Registro removido com sucesso!');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Usuario::where($request->tipo, 'like', "%$request->valor%")->get();
        } else {
            $dados = Usuario::all();
        }
        return view('usuario.list', compact('dados'));
    }
}