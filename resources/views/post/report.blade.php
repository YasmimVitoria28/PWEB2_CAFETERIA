<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>{{ $titulo }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 13px;
            color: #333;
        }

        .cabecalho {
            text-align: center;
            border-bottom: 3px solid #b8860b;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .cabecalho h1 {
            margin: 0;
            color: #b8860b;
            font-size: 28px;
        }

        .cabecalho p {
            margin: 4px 0 0 0;
            color: #777;
        }

        h3 {
            text-align: center;
            margin-bottom: 5px;
        }

        .data {
            text-align: center;
            color: #777;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            background-color: #b8860b;
            color: #fff;
            padding: 10px;
            text-align: left;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .total {
            margin-top: 25px;
            text-align: right;
            font-size: 18px;
            font-weight: bold;
            color: #b8860b;
        }

        .rodape {
            margin-top: 60px;
            text-align: center;
            font-size: 11px;
            color: #999;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
    </style>
</head>

<body>
    <div class="cabecalho">
        <h1>Grão de Ouro</h1>
        <p>Cafeteria</p>
    </div>

    <h3>{{ $titulo }}</h3>
    <p class="data">Emitido em {{ $date }}</p>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nº do Pedido</th>
                <th>Produto</th>
                <th>Valor Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $pedido->id }}</td>
                <td>{{ $pedido->numero_pedido }}</td>
                <td>{{ $pedido->produto }}</td>
                <td>R$ {{ number_format($pedido->valor_t, 2, ',', '.') }}</td>
            </tr>
        </tbody>
    </table>

    <p class="total">Total: R$ {{ number_format($pedido->valor_t, 2, ',', '.') }}</p>

    <div class="rodape">
        Obrigado pela preferência! Grão de Ouro
    </div>
</body>

</html>