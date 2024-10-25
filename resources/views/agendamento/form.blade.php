@extends('base')

@section('conteudo')
    <h1>{{ isset($dado) ? 'Editar Agendamento' : 'Novo Agendamento' }}</h1>

    <!-- Se houver erros de validação, eles aparecerão aqui -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ isset($dado) ? route('agendamento.update', $dado->id) : route('agendamento.store') }}" method="POST">
        @csrf
        @if (isset($dado))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="nome_cliente">Nome do Cliente</label>
            <input type="text" class="form-control" name="nome_cliente" value="{{ old('nome_cliente', isset($dado) ? $dado->nome_cliente : '') }}" required>
        </div>

        <div class="form-group">
            <label for="telefone_cliente">Telefone do Cliente</label>
            <input type="text" class="form-control" name="telefone_cliente" value="{{ old('telefone_cliente', isset($dado) ? $dado->telefone_cliente : '') }}" required>
        </div>

        <div class="form-group">
            <label for="data_agendamento">Data do Agendamento</label>
            <input type="date" class="form-control" name="data_agendamento" value="{{ old('data_agendamento', isset($dado) ? $dado->data_agendamento : '') }}" required>
        </div>

        <div class="form-group">
            <label for="horario_agendamento">Horário do Agendamento</label>
            <input type="time" class="form-control" name="horario_agendamento" value="{{ old('horario_agendamento', isset($dado) ? $dado->horario_agendamento : '') }}" required>
        </div>

        <div class="form-group">
            <label for="id_servico">Serviço</label>
            <select class="form-control" name="id_servico" required>
                <option value="">Selecione um Serviço</option>
                @foreach($servicos as $servico)
                    <option value="{{ $servico->id }}" {{ isset($dado) && $dado->id_servico == $servico->id ? 'selected' : '' }}>
                        {{ $servico->nome_servico }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="id_secretaria">Secretária</label>
            <select class="form-control" name="id_secretaria" required>
                <option value="">Selecione uma Secretária</option>
                @foreach($secretarias as $secretaria)
                    <option value="{{ $secretaria->id }}" {{ isset($dado) && $dado->id_secretaria == $secretaria->id ? 'selected' : '' }}>
                        {{ $secretaria->login }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            {{ isset($dado) ? 'Atualizar Agendamento' : 'Criar Agendamento' }}
        </button>
        <a href="{{ route('agendamento.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection