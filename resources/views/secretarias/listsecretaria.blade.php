@extends('layouts.app')

@section('content')
    <h1>Lista de Secretárias</h1>

    <!-- Mensagem de sucesso, caso exista -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Botão para criar nova secretária -->
    <a href="{{ route('secretarias.create') }}" class="btn btn-primary mb-3">Nova Secretária</a>

    <!-- Tabela de listagem de secretárias -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Login</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dados as $secretaria)
                <tr>
                    <td>{{ $secretaria->id }}</td>
                    <td>{{ $secretaria->login }}</td>
                    <td>
                        <a href="{{ route('secretarias.edit', $secretaria->id) }}" class="btn btn-warning btn-sm">Editar</a>
                        
                        <form action="{{ route('secretarias.destroy', $secretaria->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta secretária?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Nenhuma secretária cadastrada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection