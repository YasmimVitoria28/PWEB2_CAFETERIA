<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller
{
    public function index()
    {
        $dados = Produto::all();
        return view('produto.list')->with(['dados' => $dados]);
    }

    function create()
    {
        $categorias = Categoria::orderBy('nome')->get();
        return view('produto.form', compact('categorias'));
    }

    function validateForm(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'preco_unit' => 'required|numeric',
            'categoria_id' => 'required',
            'imagem' => 'nullable|image|mimes:png,jpg,jpeg',
        ], [
            'nome.required' => "O :attribute é obrigatorio",
            'preco_unit.required' => "O :attribute é obrigatorio",
            'categoria_id.required' => "A :attribute é obrigatoria",
        ]);
    }

    function store(Request $request)
    {
        $this->validateForm($request);
        $dados = $request->all();
        $imagem = $request->file('imagem');

        if ($imagem) {
            $nome_imagem = date('YmdiHs') . "." . $imagem->getClientOriginalExtension();
            $diretorio = "imagem/produto/";
            $imagem->storeAs($diretorio, $nome_imagem, 'public');
            $dados['imagem'] = $diretorio . $nome_imagem;
        }

        Produto::create($dados);
        return redirect('produto')->with("success", 'Registro Salvo com sucesso!');
    }

    function edit($id)
    {
        $data = Produto::find($id);
        $categorias = Categoria::orderBy('nome')->get();
        return view('produto.form', compact('data', 'categorias'));
    }

    function update(Request $request, $id)
    {
        $this->validateForm($request);
        $dados = $request->all();
        $imagem = $request->file('imagem');

        if ($imagem) {
            $nome_imagem = date('YmdiHs') . "." . $imagem->getClientOriginalExtension();
            $diretorio = "imagem/produto/";
            $imagem->storeAs($diretorio, $nome_imagem, 'public');
            $dados['imagem'] = $diretorio . $nome_imagem;
        }

        Produto::find($id)->update($dados);
        return redirect('produto')->with("success", 'Registro Atualizado com sucesso!');
    }

    function destroy($id)
    {
        Produto::destroy($id);
        return redirect('produto')->with("success", 'Registro removido com sucesso!');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Produto::where($request->tipo, 'like', "%$request->valor%")->get();
        } else {
            $dados = Produto::all();
        }
        return view('produto.list', compact('dados'));
    }
}