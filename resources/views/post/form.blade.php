@extends('main')

@section('titulo', isset($data) ? 'Editar Pedido' : 'Novo Pedido')

@section('conteudo')
<div class="card p-4" style="background-color:#2a0810;border:1px solid #D4A35D;">
    <form action="{{ isset($data) ? route('post.update', $data->id) : route('post.store') }}" method="POST">
        @csrf
        @if(isset($data)) @method('PUT') @endif

        <div class="mb-3">
            <label class="form-label">Nº Pedido</label>
            <input type="number" name="numero_pedido" class="form-control" value="{{ $data->numero_pedido ?? '' }}">
            @error('numero_pedido') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $data->nome ?? '' }}">
            @error('nome') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Valor Total</label>
            <input type="number" step="0.01" name="valor_t" class="form-control" value="{{ $data->valor_t ?? '' }}">
            @error('valor_t') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-warning">Salvar</button>
        <a href="{{ url('/post') }}" class="btn btn-outline-light">Cancelar</a>
    </form>
</div>
@endsection