<?php

namespace App\Charts;

// Biblioteca que desenha os gráficos
use ArielMejiaDev\LarapexCharts\LarapexChart;
// Permite fazer consultas direto nas tabelas do banco
use Illuminate\Support\Facades\DB;

class FornecedorProdutoChart
{
    // O método build() monta o gráfico e devolve ele pronto para o controller
    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        // Consulta no banco: conta quantos fornecedores existem para cada produto
        $qtdFornecedorPorProduto = DB::table('fornecedores')
            // junta a tabela fornecedores com a produto, ligando pelo produto_id
            ->join('produto', 'produto.id', '=', 'fornecedores.produto_id')
            // pega o nome do produto e conta (count) quantos fornecedores tem em cada um
            ->select('produto.nome', DB::raw('count(1) as qtd'))
            // agrupa por nome do produto, para contar um produto de cada vez
            ->groupBy('produto.nome')
            // coloca o produto com mais fornecedores primeiro
            ->orderBy('qtd', 'desc')
            // executa a consulta e traz o resultado
            ->get();

        // Duas listas vazias: uma para as quantidades e outra para os nomes
        $qtd = [];
        $nomeProdutos = [];

        // Percorre o resultado da consulta e separa nome e quantidade nas listas
        foreach ($qtdFornecedorPorProduto as $item) {
            $nomeProdutos[] = $item->nome;
            $qtd[] = $item->qtd;
        }

        // Cria o gráfico de pizza
        return (new LarapexChart)->pieChart()
            ->setTitle('Fornecedores por produto')   // título do gráfico
            ->setSubtitle('Grão de Ouro')            // subtítulo
            ->addData($qtd)                          // os números (tamanho de cada fatia)
            ->setLabels($nomeProdutos);              // os nomes de cada fatia
    }
}