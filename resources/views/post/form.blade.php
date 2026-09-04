@extends('main')
@section('titulo', isset($data) ? 'Editar Pedido' : 'Novo Pedido')
@section('conteudo')
    <div class="row">
        @php
            if (!empty($data->id)) {
                $action = route('post.update', $data->id);
            } else {
                $action = route('post.store');
            }
        @endphp
        <h4>Formulário Pedido</h4>
        <form action="{{ $action }}" method="post">
            @csrf
            @if (!empty($data->id))
                @method('PUT')
            @endif
            <input type="hidden" name="id" value="{{ old('id', $data->id ?? '') }}">
            <div class="col-6">
                <label for="numero_pedido">Nº Pedido</label>
                <input type="number" name="numero_pedido" class="form-control"
                    value="{{ old('numero_pedido', $data->numero_pedido ?? '') }}">
                @error('numero_pedido') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="col-6">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control"
                    value="{{ old('nome', $data->nome ?? '') }}">
                @error('nome') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="col-6">
                <label for="valor_t">Valor Total</label>
                <input type="number" step="0.01" name="valor_t" class="form-control"
                    value="{{ old('valor_t', $data->valor_t ?? '') }}">
                @error('valor_t') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ url('post') }}" class="btn btn-primary"> Voltar</a>
            </div>
        </form>
    </div>
@stop