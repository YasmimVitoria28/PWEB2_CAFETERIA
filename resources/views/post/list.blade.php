@extends('main')
@section('titulo', 'Listagem de Pedidos')
@section('conteudo')
    <div class="row">
        <h3>Listagem de Pedidos</h3>
        <form action="{{ route('post.search') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-2">
                    <label for="tipo">Tipo</label>
                    <select name="tipo" class="form-select">
                        <option value="nome">Nome</option>
                        <option value="numero_pedido">Nº Pedido</option>
                    </select>
                </div>
                <div class="col-5">
                    <label for="valor">Valor</label>
                    <input type="text" name="valor" placeholder="Pesquisar..." class="form-control">
                </div>
                <div class="col-5">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <a href="{{ url('post/create') }}" class="btn btn-success"> Novo</a>
                </div>
            </div>
        </form>
    </div>
    <div class="row mt-4">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nº Pedido</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Valor Total</th>
                    <th scope="col">Ação</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $item)
                    <tr>
                        <th scope='row'>{{ $item->id }}</th>
                        <td>{{ $item->numero_pedido }}</td>
                        <td>{{ $item->nome }}</td>
                        <td>R$ {{ number_format($item->valor_t, 2, ',', '.') }}</td>
                        <td>
                            <a class='btn btn-warning' title='Editar' href="{{ route('post.edit', $item->id) }}">Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('post.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class='btn btn-danger' title='Exclur'
                                    onclick='return confirm("Deseja Excluir?")'>Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop