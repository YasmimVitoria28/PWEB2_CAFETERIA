<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class FornecedorProdutoChart
{
    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $qtdFornecedorPorProduto = DB::table('fornecedores')
            ->join('produto', 'produto.id', '=', 'fornecedores.produto_id')
            ->select('produto.nome', DB::raw('count(1) as qtd'))
            ->groupBy('produto.nome')
            ->orderBy('qtd', 'desc')
            ->get();

        $qtd = [];
        $nomeProdutos = [];

        foreach ($qtdFornecedorPorProduto as $item) {
            $nomeProdutos[] = $item->nome;
            $qtd[] = $item->qtd;
        }

        return (new LarapexChart)->pieChart()
            ->setTitle('Fornecedores por produto')
            ->setSubtitle('Grão de Ouro') 
            ->addData($qtd)                          
            ->setLabels($nomeProdutos);              
    }
}