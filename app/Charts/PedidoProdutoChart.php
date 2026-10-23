<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class PedidoProdutoChart
{
    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $valorPorProduto = DB::table('post')
            ->select('produto', DB::raw('sum(valor_t) as total'))
            ->groupBy('produto')
            ->orderBy('total', 'desc')
            ->get();

        $valores = [];
        $nomeProdutos = [];

        foreach ($valorPorProduto as $item) {
            $nomeProdutos[] = $item->produto;
            $valores[] = (float) $item->total;
        }

        // Cria o gráfico de barras
        return (new LarapexChart)->barChart()
            ->setTitle('Valor total dos pedidos por produto') 
            ->setSubtitle('Grão de Ouro')             
            ->addData($valores, 'Valor total (R$)')             
            ->setXAxis($nomeProdutos);                          
    }
}