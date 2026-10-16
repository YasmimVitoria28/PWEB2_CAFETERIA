<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Funcionario;

class FuncionarioController extends Controller
{
    public function index()
    {
        $dados = Funcionario::all();
        return view('funcionario.list')->with(['dados' => $dados]);
    }

    function create()
    {
        return view('funcionario.form');
    }

    function validateForm(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'login' => 'required',
            'senha' => 'required',
            'cpf' => 'required',
            'imagem' => 'nullable|image|mimes:png,jpg,jpeg',
        ], [
            'nome.required' => "O :attribute é obrigatorio",
            'email.required' => "O :attribute é obrigatorio",
            'login.required' => "O :attribute é obrigatorio",
            'senha.required' => "A :attribute é obrigatoria",
            'cpf.required' => "A :attribute é obrigatoria",
        ]);
    }

    function store(Request $request)
    {
        $this->validateForm($request);
        $dados = $request->all();
        $dados['senha'] = bcrypt($request->senha); 
        $imagem = $request->file('imagem');

        if ($imagem) {
            $nome_imagem = date('YmdiHs') . "." . $imagem->getClientOriginalExtension();
            $diretorio = "imagem/funcionario/";
            $imagem->storeAs($diretorio, $nome_imagem, 'public');
            $dados['imagem'] = $diretorio . $nome_imagem;
        }

        Funcionario::create($dados);
        return redirect('funcionario')->with("success", 'Registro Salvo com sucesso!');
    }

    function edit($id)
    {
        $data = Funcionario::find($id);
        return view('funcionario.form', compact('data'));
    }

    function update(Request $request, $id)
    {
        $this->validateForm($request);
        $dados = $request->all();
        $dados['senha'] = bcrypt($request->senha);
        Funcionario::find($id)->update($dados);
        return redirect('funcionario')->with("success", 'Registro Atualizado com sucesso!');
    }

    function destroy($id)
    {
        Funcionario::destroy($id);
        return redirect('funcionario')->with("success", 'Registro removido com sucesso!');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Funcionario::where($request->tipo, 'like', "%$request->valor%")->get();
        } else {
            $dados = Funcionario::all();
        }
        return view('funcionario.list', compact('dados'));
    }
}