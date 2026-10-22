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

        tr:nth-child(even) td {
            background-color: #faf6ea;
        }

        .total {
            margin-top: 20px;
            text-align: right;
            font-weight: bold;
            color: #b8860b;
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
                <th>Nome</th>
                <th>CNPJ</th>
                <th>Telefone</th>
                <th>Produto</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dados as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nome }}</td>
                    <td>{{ $item->cnpj }}</td>
                    <td>{{ $item->telefone }}</td>
                    <td>{{ $item->produto->nome ?? ' - ' }}</td> <!-- mostra o nome do produto e se o fornecedor não tiver produto, mostra um traço em vez de dar erro -->
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="total">Total de fornecedores: {{ $dados->count() }}</p>
</body>

</html>