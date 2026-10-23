<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class FornecedorProdutoChart
{
    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $qtdProdutosPorFornecedor = DB::table('produto')
            ->join('fornecedores', 'fornecedores.id', '=', 'produto.fornecedor_id')
            ->select('fornecedores.razao_social', DB::raw('count(produto.id) as qtd'))
            ->groupBy('fornecedores.razao_social')
            ->orderBy('qtd', 'desc')
            ->get();

        $qtd = [];
        $nomeFornecedores = [];

        foreach ($qtdProdutosPorFornecedor as $item) {
            $nomeFornecedores[] = $item->razao_social;
            $qtd[] = $item->qtd;
        }

        return (new LarapexChart)->pieChart()
            ->setTitle('Produtos por Fornecedor')
            ->setSubtitle('Grão de Ouro') 
            ->addData($qtd)                          
            ->setLabels($nomeFornecedores);              
    }
}