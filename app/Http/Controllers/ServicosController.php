<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    // Listagem de todos os serviços
    public function index()
    {
        $dados = Servico::all();
        return view('servico.list', compact('dados'));
    }

    // Exibição do formulário de criação
    public function create()
    {
        return view('servico.form');
    }

    // Armazenamento de um novo serviço
    public function store(Request $request)
    {
        $request->validate([
            'nome_servico' => 'required|max:100',
            'descricao' => 'nullable|max:255',
            'preco' => 'required|numeric',
        ]);

        Servico::create($request->all());

        return redirect()->route('servicos.index')->with('success', 'Serviço criado com sucesso.');
    }

    // Exibição do formulário de edição
    public function edit($id)
    {
        $servico = Servico::findOrFail($id);
        return view('servico.form', compact('servico'));
    }

    // Atualização de um serviço
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome_servico' => 'required|max:100',
            'descricao' => 'nullable|max:255',
            'preco' => 'required|numeric',
        ]);

        $servico = Servico::findOrFail($id);
        $servico->update($request->all());

        return redirect()->route('servicos.index')->with('success', 'Serviço atualizado com sucesso.');
    }

    // Exclusão de um serviço
    public function destroy($id)
    {
        $servico = Servico::findOrFail($id);
        $servico->delete();

        return redirect()->route('servicos.index')->with('success', 'Serviço excluído com sucesso.');
    }

    // Busca por serviços
    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Servico::where('nome_servico', 'like', "%{$request->valor}%")->get();
        } else {
            $dados = Servico::all();
        }
        
        return view('servico.list', ['dados' => $dados]);
    }
}