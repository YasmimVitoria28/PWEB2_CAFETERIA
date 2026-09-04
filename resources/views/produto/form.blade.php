@extends('main')
@section('titulo', isset($data) ? 'Editar Produto' : 'Novo Produto')
@section('conteudo')
    <div class="row">
        @php
            if (!empty($data->id)) {
                $action = route('produto.update', $data->id);
            } else {
                $action = route('produto.store');
            }
        @endphp
        <h4>Formulário Produto</h4>
        <form action="{{ $action }}" method="post">
            @csrf
            @if (!empty($data->id))
                @method('PUT')
            @endif
            <input type="hidden" name="id" value="{{ old('id', $data->id ?? '') }}">
            <div class="col-6">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" value="{{ old('nome', $data->nome ?? '') }}">
                @error('nome') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="col-6">
                <label for="preco_unit">Preço</label>
                <input type="number" step="0.01" name="preco_unit" class="form-control"
                    value="{{ old('preco_unit', $data->preco_unit ?? '') }}">
                @error('preco_unit') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="col-6">
                <label for="categoria">Categoria</label>
                <select name="categoria" class="form-select">
                    @foreach (['Doces e tortas', 'Salgados', 'Cafés'] as $cat)
                        <option value="{{ $cat }}"
                            {{ old('categoria', $data->categoria ?? '') == $cat ? 'selected' : '' }}>
                            {{ $cat }}
                        </option>
                    @endforeach
                </select>
                @error('categoria') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ url('produto') }}" class="btn btn-primary"> Voltar</a>
            </div>
        </form>
    </div>
@stop