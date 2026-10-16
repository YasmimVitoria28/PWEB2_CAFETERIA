@extends('main')
@section('titulo', isset($data) ? 'Editar Fornecedor' : 'Novo Fornecedor')
@section('conteudo')
    <div class="row">
        @php
            if (!empty($data->id)) {
                $action = route('fornecedor.update', $data->id);
            } else {
                $action = route('fornecedor.store');
            }
        @endphp
        <h4>Formulário Fornecedor</h4>
        <form action="{{ $action }}" method="post">
            @csrf
            @if (!empty($data->id))
                @method('PUT')
            @endif
            <input type="hidden" name="id" value="{{ old('id', $data->id ?? '') }}">

            <div class="col-6 mb-3">
                <label for="nome">Nome do Fornecedor</label>
                <input type="text" name="nome" id="nome" class="form-control" 
                    value="{{ old('nome', $data->nome ?? '') }}">
                @error('nome') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-6">
                <label for="cnpj">CNPJ</label>
                <input type="number" name="cnpj" class="form-control"
                    value="{{ old('cnpj', $data->cnpj ?? '') }}">
                @error('cnpj') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-6">
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" class="form-control"
                    value="{{ old('telefone', $data->telefone ?? '') }}">
            </div>

            <div class="col-6 mb-3">
                <label for="produto_id">Produto</label>
                <select name="produto_id" id="produto_id" class="form-select">
                    <option value="">Selecione o Produto</option>
                    @foreach ($produtos as $produto)
                        <option value="{{ $produto->id }}"
                            {{ old('produto_id', $data->produto_id ?? '') == $produto->id ? 'selected' : '' }}>
                            {{ $produto->nome }}
                        </option>
                    @endforeach
                </select>
                @error('produto_id') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            
            <div class="mt-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ route('fornecedor.index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </form>
    </div>
@stop