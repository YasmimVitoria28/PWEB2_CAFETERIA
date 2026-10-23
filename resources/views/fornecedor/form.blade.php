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

            <div class="col-6 mb-3">
                <label for="cnpj">CNPJ</label>
                <input type="text" name="cnpj" class="form-control"
                    value="{{ old('cnpj', $data->cnpj ?? '') }}">
                @error('cnpj') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-6 mb-3">
                <label for="vendedor">Vendedor</label>
                <input type="text" name="vendedor" id="vendedor" class="form-control" 
                    value="{{ old('vendedor', $data->vendedor ?? '') }}">
                @error('vendedor') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-6 mb-3">
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" class="form-control"
                    value="{{ old('telefone', $data->telefone ?? '') }}">
            </div>

            <div class="col-6 mb-3">
                <label class="form-label">Produtos</label>
                <div class="border rounded p-2 form-control" style="max-height: 150px; overflow-y: auto;">
                    @foreach ($produtos as $produto)
                        @php
                            $selected = old('produtos', isset($data) ? $data->produtos->pluck('id')->toArray() : []);
                        @endphp
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="produtos[]" value="{{ $produto->id }}" id="produto_{{ $produto->id }}"
                                {{ in_array($produto->id, $selected) ? 'checked' : '' }}>
                            <label class="form-check-label" for="produto_{{ $produto->id }}">
                                {{ $produto->nome }}
                            </label>
                        </div>
                    @endforeach
                </div>
                @error('produtos') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mt-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ route('fornecedor.index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </form>
    </div>
@stop