@extends('main')
@section('titulo', isset($data) ? 'Editar Usuário' : 'Novo Usuário')
@section('conteudo')
    <div class="row">
        @php
            if (!empty($data->id)) {
                $action = route('usuario.update', $data->id);
            } else {
                $action = route('usuario.store');
            }
        @endphp
        <h4>Formulário Usuário</h4>
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
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $data->email ?? '') }}">
                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="col-6">
                <label for="telefone">Telefone</label>
                <input type="text" name="telefone" class="form-control"
                    value="{{ old('telefone', $data->telefone ?? '') }}">
            </div>
            <div class="col-6">
                <label for="login">Login</label>
                <input type="text" name="login" class="form-control" value="{{ old('login', $data->login ?? '') }}">
                @error('login') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="col-6">
                <label for="senha">Senha</label>
                <input type="password" name="senha" class="form-control">
                @error('senha') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-success">Salvar</button>
                <a href="{{ url('usuario') }}" class="btn btn-primary"> Voltar</a>
            </div>
        </form>
    </div>
@stop