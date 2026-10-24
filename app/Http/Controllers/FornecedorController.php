<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fornecedor;
use App\Models\Produto;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Charts\FornecedorProdutoChart;

class FornecedorController extends Controller
{
    public function index()
    {
        $dados = Fornecedor::with('produtos')->get();
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
            'razao_social' => 'required',
            'cnpj'         => 'required',
            'vendedor'     => 'required',
            'telefone'     => 'required',
            'produtos'     => 'required|array',
        ], [
            'razao_social.required' => "O :attribute é obrigatório",
            'cnpj.required'         => "O :attribute é obrigatório",
            'vendedor.required'     => "O :attribute é obrigatório",
            'telefone.required'     => "O :attribute é obrigatório",
            'produtos.required'     => "Selecione ao menos um produto",
        ]);
    }

    public function store(Request $request)
    {
        $this->validateForm($request);

        $fornecedor = Fornecedor::create($request->only(['razao_social', 'cnpj', 'vendedor', 'telefone']));

        // Atribui o fornecedor aos produtos selecionados
        Produto::whereIn('id', $request->produtos)->update(['fornecedor_id' => $fornecedor->id]);

        return redirect('fornecedor')->with("success", 'Registro Salvo com sucesso!');
    }

    public function edit($id)
    {
        $data = Fornecedor::with('produtos')->findOrFail($id);
        $produtos = Produto::all(); 

        return view('fornecedor.form', compact('data', 'produtos'));
    }

    public function update(Request $request, $id)
    {
        $this->validateForm($request);

        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->update($request->only(['razao_social', 'cnpj', 'vendedor', 'telefone']));

        // Desvincula os produtos antigos e vincula os novos
        Produto::where('fornecedor_id', $fornecedor->id)->update(['fornecedor_id' => null]);
        Produto::whereIn('id', $request->produtos)->update(['fornecedor_id' => $fornecedor->id]);

        return redirect('fornecedor')->with("success", 'Registro Atualizado com sucesso!');
    }

    public function destroy($id)
    {
        Produto::where('fornecedor_id', $id)->update(['fornecedor_id' => null]);
        Fornecedor::destroy($id);
        return redirect('fornecedor')->with("success", 'Registro removido com sucesso!');
    }

    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Fornecedor::with('produtos')
                ->where($request->tipo, 'like', "%$request->valor%")
                ->get();
        } else {
            $dados = Fornecedor::with('produtos')->get();
        }
        return view('fornecedor.list', compact('dados'));
    }

    public function report()
    {
        $fornecedores = Fornecedor::with('produtos')->orderBy('vendedor')->get();

        $data = [
            'titulo' => 'Relatório Listagem de Fornecedores',
            'date' => date('d/m/Y'),
            'dados' => $fornecedores
        ];

        $pdf = Pdf::loadView('fornecedor.report', $data);

        return $pdf->download('relatorio_fornecedores.pdf');
    }

    public function chart(FornecedorProdutoChart $chart)
    {
        return view('fornecedor.chart', ['chart' => $chart->build()]);
    }
}