@extends('main')

@section('titulo', isset($data) ? 'Editar Produto' : 'Novo Produto')

@section('conteudo')
<div class="card p-4" style="background-color:#2a0810;border:1px solid #D4A35D;">
    <form action="{{ isset($data) ? route('produto.update', $data->id) : route('produto.store') }}" method="POST">
        @csrf
        @if(isset($data)) @method('PUT') @endif

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $data->nome ?? '' }}">
            @error('nome') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Preço</label>
            <input type="number" step="0.01" name="preco_unit" class="form-control" value="{{ $data->preco_unit ?? '' }}">
            @error('preco_unit') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Categoria</label>
            <select name="categoria_id" class="form-select">
                @foreach($categorias as $item)
                    <option value="{{ $item->id }}" {{ (isset($data) && $data->categoria_id == $item->id) ? 'selected' : '' }}>
                        {{ $item->nome }}
                    </option>
                @endforeach
            </select>
            @error('categoria_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-warning">Salvar</button>
        <a href="{{ url('/produto') }}" class="btn btn-outline-light">Cancelar</a>
    </form>
</div>
@endsection