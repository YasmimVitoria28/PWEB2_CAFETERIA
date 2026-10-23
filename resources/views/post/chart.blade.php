<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8"> 
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> <!-- compatibilidade com navegadores antigos -->
    <title>Gráfico</title> <!-- texto que aparece na aba do navegador -->

    <!-- dar o visual (fundo, margens, cartão branco) -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<!-- h-screen: ocupa a tela toda | bg-gray-100: fundo cinza claro -->
<body class="h-screen bg-gray-100">

    
    <div class="container px-4 mx-auto">

        <!-- Cartão branco em volta do gráfico -->
        <div class="p-6 m-20 bg-white rounded shadow">

            {!! $chart->container() !!}
        </div>

    </div>

    {{-- Larapex: carrega a biblioteca ApexCharts, que é quem realmente desenha o gráfico --}}
    <script src="{{ $chart->cdn() }}"></script>

    {{-- Larapex: gera o JavaScript com os dados do seu gráfico e manda desenhar no espaço criado acima --}}
    {{ $chart->script() }}
</body>

</html>