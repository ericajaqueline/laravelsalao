<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Servico;
use App\Models\Secretaria;
use Illuminate\Http\Request;

class AgendamentoController extends Controller
{

    // Exibe todos os agendamentos (index)
    function index()
    {
        $dados = Agendamento::with(['servico', 'secretaria'])->get();

        return view('agendamento.list', [
            'dados' => $dados
        ]);
    }



    // Exibe o formulário para criação de novo agendamento
    function create()
    {
        $servicos = Servico::All();
        $secretarias = Secretaria::All();

        return view('agendamento.form', [
            'servicos' => $servicos,
            'secretarias' => $secretarias
        ]);
    }

    // Armazena o novo agendamento no banco de dados
    function store(Request $request)
    {
        $request->validate(
            [
                'nome_cliente' => 'required|max:130|min:3',
                'telefone_cliente' => 'required|max:20',
                'data_agendamento' => 'required|date',
                'horario_agendamento' => 'required',
                'id_servico' => 'required|exists:servicos,id',
                'id_secretaria' => 'required|exists:secretarias,id',
            ],
            [
                'nome_cliente.required' => "O nome do cliente é obrigatório",
                'nome_cliente.max' => "O máximo de caracteres para o nome do cliente é 130",
                'nome_cliente.min' => "O mínimo de caracteres para o nome do cliente é 3",
                'telefone_cliente.required' => "O telefone do cliente é obrigatório",
                'telefone_cliente.max' => "O máximo de caracteres para o telefone do cliente é 20",
                'data_agendamento.required' => "A data do agendamento é obrigatória",
                'data_agendamento.date' => "A data deve ser válida",
                'horario_agendamento.required' => "O horário do agendamento é obrigatório",
                'id_servico.required' => "O serviço é obrigatório",
                'id_servico.exists' => "O serviço selecionado não existe",
                'id_secretaria.required' => "A secretária é obrigatória",
                'id_secretaria.exists' => "A secretária selecionada não existe",
            ]
        );

        $data = $request->all();
        Agendamento::create($data);

        return redirect('agendamento');
    }

    // Exibe o formulário para edição de um agendamento existente
    function edit($id)
    {
        $dado = Agendamento::find($id);
        $servicos = Servico::All();
        $secretarias = Secretaria::All();

        return view('agendamento.form', [
            'dado' => $dado,
            'servicos' => $servicos,
            'secretarias' => $secretarias,
        ]);
    }

    // Atualiza o agendamento existente no banco de dados
    function update(Request $request, $id)
    {
        $request->validate(
            [
                'nome_cliente' => 'required|max:130|min:3',
                'telefone_cliente' => 'required|max:20',
                'data_agendamento' => 'required|date',
                'horario_agendamento' => 'required',
                'id_servico' => 'required|exists:servicos,id',
                'id_secretaria' => 'required|exists:secretarias,id',
            ],
            [
                'nome_cliente.required' => "O nome do cliente é obrigatório",
                'nome_cliente.max' => "O máximo de caracteres para o nome do cliente é 130",
                'nome_cliente.min' => "O mínimo de caracteres para o nome do cliente é 3",
                'telefone_cliente.required' => "O telefone do cliente é obrigatório",
                'telefone_cliente.max' => "O máximo de caracteres para o telefone do cliente é 20",
                'data_agendamento.required' => "A data do agendamento é obrigatória",
                'data_agendamento.date' => "A data deve ser válida",
                'horario_agendamento.required' => "O horário do agendamento é obrigatório",
                'id_servico.required' => "O serviço é obrigatório",
                'id_servico.exists' => "O serviço selecionado não existe",
                'id_secretaria.required' => "A secretária é obrigatória",
                'id_secretaria.exists' => "A secretária selecionada não existe",
            ]
        );

        $data = $request->all();
        Agendamento::updateOrCreate(
            ['id' => $id],
            $data
        );

        return redirect('agendamento');
    }

    // Deleta um agendamento existente
    public function destroy($id)
    {
        $agendamento = Agendamento::findOrFail($id);
        $agendamento->delete();

        return redirect('agendamento');
    }

    // Função de busca de agendamentos com filtro
     function search(Request $request)
    {
        $query = Agendamento::query();

        if ($request->filled('nome_cliente')) {
            $query->where('nome_cliente', 'like', '%' . $request->nome_cliente . '%');
        }

        if ($request->filled('telefone_cliente')) {
            $query->where('telefone_cliente', 'like', '%' . $request->telefone_cliente . '%');
        }

        if ($request->filled('data_agendamento')) {
            $query->whereDate('data_agendamento', $request->data_agendamento);
        }

        $dados = $query->get();

        return view('agendamento.list', ['dados' => $dados]);
    }
}
