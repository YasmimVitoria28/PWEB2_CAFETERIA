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
                <label for="razao_social">Razão social</label>
                <input type="text" name="razao_social" id="razao_social" class="form-control" 
                    value="{{ old('razao_social', $data->razao_social ?? '') }}">
                @error('razao_social') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            

            <div class="col-6">
                <label for="cnpj">CNPJ</label>
                <input type="text" name="cnpj" class="form-control"
                    value="{{ old('cnpj', $data->cnpj ?? '') }}">
                @error('cnpj') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-6">
                <label for="vendedor">Vendedor</label>
                <input type="text" name="vendedor" id="vendedor" class="form-control" 
                    value="{{ old('vendedor', $data->vendedor ?? '') }}">
                @error('vendedor') <small class="text-danger">{{ $message }}</small> @enderror
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