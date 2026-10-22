<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;
use App\Models\Produto;
use Barryvdh\DomPDF\Facade\Pdf;

class FornecedorController extends Controller
{
    public function index()
    {
        // Carrega os fornecedores trazendo também a relação com o produto
        $dados = Fornecedor::with('produto')->get();
        return view('fornecedor.list')->with(['dados' => $dados]);
    }

    public function create()
    {
        $produtos = Produto::all(); 

        return view('fornecedor.form', compact('produtos'));
    }

    public function validateForm(Request $request)
    {
        $request->validate([
            'nome'       => 'required',
            'cnpj'       => 'required',
            'telefone'   => 'required',
            'produto_id' => 'required',
        ], [
            'nome.required'       => "O :attribute é obrigatório",
            'cnpj.required'       => "O :attribute é obrigatório",
            'telefone.required'   => "O :attribute é obrigatório",
            'produto_id.required' => "O :attribute é obrigatório",
        ]);
    }

    public function store(Request $request)
    {
        $this->validateForm($request);
        Fornecedor::create($request->all());
        return redirect('fornecedor')->with("success", 'Registro Salvo com sucesso!');
    }

    public function edit($id)
    {
        $data = Fornecedor::findOrFail($id);
        $produtos = Produto::all(); 

        return view('fornecedor.form', compact('data', 'produtos'));
    }

    public function update(Request $request, $id)
    {
        $this->validateForm($request);
        Fornecedor::findOrFail($id)->update($request->all());
        return redirect('fornecedor')->with("success", 'Registro Atualizado com sucesso!');
    }

    public function destroy($id)
    {
        Fornecedor::destroy($id);
        return redirect('fornecedor')->with("success", 'Registro removido com sucesso!');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Fornecedor::with('produto')
                ->where($request->tipo, 'like', "%$request->valor%")
                ->get();
        } else {
            $dados = Fornecedor::with('produto')->get();
        }
        return view('fornecedor.list', compact('dados'));
    }

    public function report() //relatorio
    {
        $fornecedores = Fornecedor::with('produto')->orderBy('nome')->get();

        $data = [
            'titulo' => 'Relatório Listagem de Fornecedores',
            'date' => date('d/m/Y'),
            'dados' => $fornecedores
        ];

        $pdf = Pdf::loadView('fornecedor.report', $data);

        return $pdf->download('relatorio_fornecedores.pdf');
    }
}