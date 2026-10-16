@extends('main')
@section('titulo', 'Listagem de Fornecedores')
@section('conteudo')
    <div class="row">
        <h3>Listagem de Fornecedores</h3>
        <form action="{{ route('fornecedor.search') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-2">
                    <label for="tipo">Tipo</label>
                    <select name="tipo" class="form-select">
                        <option value="nome">Nome</option>
                        <option value="cnpj">CNPJ</option>
                        <option value="telefone">Telefone</option>
                        <option value="produto_id">Produto</option>
                    </select>
                </div>
                <div class="col-5">
                    <label for="valor">Valor</label>
                    <input type="text" name="valor" placeholder="Pesquisar..." class="form-control">
                </div>
                <div class="col-5">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <a href="{{ url('fornecedor/create') }}" class="btn btn-success"> Novo</a>
                </div>
            </div>
        </form>
    </div>
    <div class="row mt-4">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CNPJ</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Produto</th>
                    <th scope="col">Ação</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $item)
                    <tr>
                        <th scope='row'>{{ $item->id }}</th>
                        <td>{{ $item->nome }}</td>
                        <td>{{ $item->cnpj }}</td>
                        <td>{{ $item->telefone }}</td>
                        <td>{{ $item->produto->nome }}</td>
                        <td>
                            <a class='btn btn-warning' title='Editar' href="{{ route('fornecedor.edit', $item->id) }}">Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('fornecedor.destroy', $item->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class='btn btn-danger' title='Excluir'
                                    onclick="return confirm('Deseja Excluir?')">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop