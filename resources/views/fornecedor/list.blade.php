@extends('main')
@section('titulo', 'Listagem de Fornecedores')
@section('conteudo')
    <div class="row">
        <form action="{{ route('fornecedor.search') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-2">
                    <label for="tipo">Tipo</label>
                    <select name="tipo" class="form-select">
                        <option value="razao_social">Razão social</option>
                        <option value="cnpj">CNPJ</option>
                        <option value="vendedor">Vendedor</option>
                        <option value="telefone">Telefone</option>
                    </select>
                </div>
                <div class="col-5">
                    <label for="valor">Valor</label>
                    <input type="text" name="valor" placeholder="Pesquisar..." class="form-control">
                </div>
                <div class="col-5">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                    <a href="{{ url('fornecedor/create') }}" class="btn btn-success"> Novo</a>
                    <a href="{{ route('fornecedor.report') }}" class="btn btn-danger"> Relatório</a>
                    <a href="{{ route('fornecedor.chart') }}" class="btn btn-warning"> Gráfico</a>
                </div>
            </div>
        </form>
    </div>
    <div class="row mt-4">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Razão social</th>
                    <th scope="col">CNPJ</th>
                    <th scope="col">Vendedor</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Produtos</th>
                    <th scope="col">Ação</th>
                    <th scope="col">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dados as $item)
                    <tr>
                        <th scope='row'>{{ $item->id }}</th>
                        <td>{{ $item->razao_social }}</td>
                        <td>{{ $item->cnpj }}</td>
                        <td>{{ $item->vendedor }}</td>
                        <td>{{ $item->telefone }}</td>
                        <td>{{ $item->produtos->pluck('nome')->implode(', ') ?: '-' }}</td>
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