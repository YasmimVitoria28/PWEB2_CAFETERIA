@extends('main')
@section('titulo', isset($data) ? 'Editar Cupom' : 'Novo Cupom')
@section('conteudo')
    <div class="row">
        @php
            if (!empty($data->id)) {
                $action = route('cupom.update', $data->id);
            } else {
                $action = route('cupom.store');
            }
        @endphp
        <h4>Formulário Cupom</h4>
        <form action="{{ $action }}" method="post">
            @csrf
            @if (!empty($data->id))
                @method('PUT')
            @endif
            <input type="hidden" name="id" value="{{ old('id', $data->id ?? '') }}">

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

            <div class="col-6 mb-3">
                <label for="codigo">Código cupom</label>
                <input type="text" name="codigo" id="codigo" class="form-control" 
                    value="{{ old('codigo', $data->codigo ?? '') }}">
                @error('codigo') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="col-6 mb-3">
                <label for="desconto_percentual">Desconto (%)</label>
                <input type="number" min="1" max="100" name="desconto_percentual" id="desconto_percentual" class="form-control"
                    value="{{ old('desconto_percentual', $data->desconto_percentual ?? '') }}" >
                @error('desconto_percentual') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            
            <div class="mt-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ route('cupom.index') }}" class="btn btn-primary">Voltar</a>
            </div>
        </form>
    </div>
@stop