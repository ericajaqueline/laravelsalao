@extends('layouts.app')

@section('content')
    <h1>{{ isset($dado) ? 'Editar Secretária' : 'Nova Secretária' }}</h1>

    <!-- Exibir erros de validação -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($dado) ? route('secretarias.update', $dado->id) : route('secretarias.store') }}" method="POST">
        @csrf
        @if (isset($dado))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="login">Login</label>
            <input type="text" class="form-control" name="login" value="{{ old('login', isset($dado) ? $dado->login : '') }}" required>
        </div>

        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" name="senha" {{ isset($dado) ? '' : 'required' }}>
            <small class="form-text text-muted">Deixe em branco para não alterar a senha.</small>
        </div>

        <button type="submit" class="btn btn-primary">
            {{ isset($dado) ? 'Atualizar Secretária' : 'Criar Secretária' }}
        </button>
        <a href="{{ route('secretarias.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection