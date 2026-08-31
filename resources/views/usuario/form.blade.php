@extends('main')

@section('titulo', isset($data) ? 'Editar Usuário' : 'Novo Usuário')

@section('conteudo')
<div class="card p-4" style="background-color:#2a0810;border:1px solid #D4A35D;">
    <form action="{{ isset($data) ? route('usuario.update', $data->id) : route('usuario.store') }}" method="POST">
        @csrf
        @if(isset($data)) @method('PUT') @endif

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $data->nome ?? '' }}">
            @error('nome') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ $data->email ?? '' }}">
            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Telefone</label>
            <input type="text" name="telefone" class="form-control" value="{{ $data->telefone ?? '' }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Login</label>
            <input type="text" name="login" class="form-control" value="{{ $data->login ?? '' }}">
            @error('login') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Senha</label>
            <input type="password" name="senha" class="form-control">
            @error('senha') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <button class="btn btn-warning">Salvar</button>
        <a href="{{ url('/usuario') }}" class="btn btn-outline-light">Cancelar</a>
    </form>
</div>
@endsection