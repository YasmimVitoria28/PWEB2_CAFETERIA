<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cupom;
use App\Models\Produto;

class CupomController extends Controller
{
    public function index()
    {
        $dados = Cupom::all();
        return view('cupom.list')->with(['dados' => $dados]);
    }

    function create()
    {
       $produtos = Produto::all(); 

        return view('cupom.form', compact('produtos'));
    }

    function validateForm(Request $request)
    {
        $request->validate([
            'produto_id' => 'required',
            'codigo' => 'required',
            'desconto_percentual' => 'required',
        ], [
            'produto_id.required' => "O :attribute é obrigatorio",
            'codigo.required' => "O :attribute é obrigatorio",
            'desconto_percentual.required' => "O :attribute é obrigatorio",
        ]);
    }

    function store(Request $request)
    {
        $this->validateForm($request);
        Cupom::create($request->all());
        return redirect('cupom')->with("success", 'Registro Salvo com sucesso!');
    }

    function edit($id)
    {
        $data = Cupom::findOrFail($id);
        $produtos = Produto::all(); 

        return view('cupom.form', compact('data', 'produtos'));
    }

    function update(Request $request, $id)
    {
        $this->validateForm($request);
        Cupom::find($id)->update($request->all());
        return redirect('cupom')->with("success", 'Registro Atualizado com sucesso!');
    }

    function destroy($id)
    {
        Cupom::destroy($id);
        return redirect('cupom')->with("success", 'Registro removido com sucesso!');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Cupom::where($request->tipo, 'like', "%$request->valor%")->get();
        } else {
            $dados = Cupom::all();
        }
        return view('cupom.list', compact('dados'));
    }
}