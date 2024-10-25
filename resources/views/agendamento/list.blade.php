
@extends('base')

@section('conteudo')
    <div class="container mt-4">
        <h1>Agendamento</h1>
        
        <!-- Botão para criar novo agendamento -->
        <a href="{{ route('agendamento.create') }}" class="btn btn-primary mb-3">Criar Novo Agendamento</a>

        <!-- Formulário de busca -->
        <form action="{{ url('agendamento/search') }}" method="GET"        class="mb-3">
            <div class="input-group">
                <input type="text" name="valor" class="form-control" placeholder="Buscar">
                <select name="tipo" class="form-select">
                    <option value="nome_cliente">Nome do Cliente</option>
                    <option value="telefone_cliente">Telefone</option>
                    <option value="data_agendamento">Data</option>
                </select>
                <button type="submit" class="btn btn-secondary">Buscar</button>
            </div>
        </form>

        <!-- Tabela de agendamento -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Cliente</th>
                    <th>Telefone</th>
                    <th>Data</th>
                    <th>Horário</th>
                    <th>Serviço</th>
                    <th>Secretária</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($dados as $agendamento)
                    <tr>
                        <td>{{ $agendamento->nome_cliente }}</td>
                        <td>{{ $agendamento->telefone_cliente }}</td>
                        <td>{{ $agendamento->data_agendamento }}</td>
                        <td>{{ $agendamento->horario_agendamento }}</td>
                        <td>{{ $agendamento->servico->nome_servico }}</td>
                        <td>{{ $agendamento->secretaria->login }}</td>
                        <td>
                            <a href="{{ route('agendamento.edit', $agendamento->id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('agendamento.destroy', $agendamento->id) }}" method="POST" onsubmit="return confirm('Tem certeza?');" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop