@extends('main')

@section('titulo', 'Produtos')

@section('conteudo')
<div class="d-flex justify-content-between mb-3">
    <a href="{{ url('/produto/create') }}" class="btn btn-warning">Novo Produto</a>
</div>

<form action="{{ route('produto.search') }}" method="POST" class="row g-2 mb-3">
    @csrf
    <div class="col-auto">
        <select name="tipo" class="form-select">
            <option value="nome">Nome</option>
            <option value="categoria">Categoria</option>
        </select>
    </div>
    <div class="col-auto">
        <input type="text" name="valor" class="form-control" placeholder="Buscar...">
    </div>
    <div class="col-auto">
        <button class="btn btn-outline-warning">Buscar</button>
    </div>
</form>

<div class="card" style="background-color:#2a0810;border:1px solid #D4A35D;">
    <table class="table table-dark table-striped mb-0">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Categoria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dados as $item)
            <tr>
                <td>{{ $item->nome }}</td>
                <td>R$ {{ number_format($item->preco_unit, 2, ',', '.') }}</td>
                <td>{{ $item->categoria }}</td>
                <td>
                    <a href="{{ route('produto.edit', $item->id) }}" class="btn btn-sm btn-outline-warning">Editar</a>
                    <form action="{{ route('produto.destroy', $item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Confirma exclusão?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection