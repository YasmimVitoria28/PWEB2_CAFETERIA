<?php

namespace App\Charts;

// Biblioteca que desenha os gráficos
use ArielMejiaDev\LarapexCharts\LarapexChart;
// Permite fazer consultas direto nas tabelas do banco
use Illuminate\Support\Facades\DB;

class PedidoProdutoChart
{
    // O método build() monta o gráfico e devolve ele pronto para o controller
    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        // Consulta no banco: soma o valor dos pedidos de cada produto
        $valorPorProduto = DB::table('post')
            // pega o nome do produto e soma (sum) o valor_t de todos os pedidos dele
            ->select('produto', DB::raw('sum(valor_t) as total'))
            // agrupa por produto, para somar um produto de cada vez
            ->groupBy('produto')
            // coloca o produto com maior valor primeiro
            ->orderBy('total', 'desc')
            // executa a consulta e traz o resultado
            ->get();

        // Duas listas vazias: uma para os valores e outra para os nomes
        $valores = [];
        $nomeProdutos = [];

        // Percorre o resultado da consulta e separa nome e valor nas listas
        foreach ($valorPorProduto as $item) {
            $nomeProdutos[] = $item->produto;
            // (float) transforma o total em número decimal, que o gráfico exige
            $valores[] = (float) $item->total;
        }

        // Cria o gráfico de barras
        return (new LarapexChart)->barChart()
            ->setTitle('Valor total dos pedidos por produto')   // título do gráfico
            ->setSubtitle('Grão de Ouro')                       // subtítulo
            ->addData($valores, 'Valor total (R$)')             // os valores das barras e o nome da série
            ->setXAxis($nomeProdutos);                          // os nomes embaixo de cada barra
    }
}