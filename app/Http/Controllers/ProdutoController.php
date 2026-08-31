<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        $dados = Produto::all();
        return view('produto.list')->with(['dados' => $dados]);
    }

    function create()
    {
        return view('produto.form');
    }

    function validateForm(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'preco_unit' => 'required|numeric',
            'categoria' => 'required',
        ], [
            'nome.required' => "O :attribute é obrigatorio",
            'preco_unit.required' => "O :attribute é obrigatorio",
            'categoria.required' => "A :attribute é obrigatoria",
        ]);
    }

    function store(Request $request)
    {
        $this->validateForm($request);
        Produto::create($request->all());
        return redirect('produto')->with("success", 'Registro Salvo com sucesso!');
    }

    function edit($id)
    {
        $data = Produto::find($id);
        return view('produto.form', compact('data'));
    }

    function update(Request $request, $id)
    {
        $this->validateForm($request);
        Produto::find($id)->update($request->all());
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