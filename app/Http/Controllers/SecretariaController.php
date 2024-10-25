<?php

namespace App\Http\Controllers;

use App\Models\Secretaria;
use Illuminate\Http\Request;

class SecretariaController extends Controller
{
    // Listagem de todas as secretárias
    public function index()
    {
        $dados = Secretaria::all();

        return view('secretaria.list', [
            'dados' => $dados
        ]);
    }

    // Exibição do formulário de criação
    public function create()
    {
        return view('secretaria.form');
    }

    // Armazenamento de uma nova secretária
    public function store(Request $request)
    {
        $request->validate(
            [
                'login' => 'required|max:100|min:3|unique:secretarias',
                'senha' => 'required|max:255|min:6',
            ],
            [
                'login.required' => "O campo login é obrigatório.",
                'login.max' => "O login pode ter no máximo 100 caracteres.",
                'login.min' => "O login deve ter no mínimo 3 caracteres.",
                'login.unique' => "Este login já está em uso.",
                'senha.required' => "O campo senha é obrigatório.",
                'senha.max' => "A senha pode ter no máximo 255 caracteres.",
                'senha.min' => "A senha deve ter no mínimo 6 caracteres.",
            ]
        );

        $data = $request->all();
        $data['senha'] = bcrypt($data['senha']);  // Criptografando a senha

        Secretaria::create($data);

        return redirect('secretaria');
    }

    // Exibição do formulário de edição
    public function edit($id)
    {
        $dado = Secretaria::find($id);

        return view('secretaria.form', [
            'dado' => $dado
        ]);
    }

    // Atualização de uma secretária
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'login' => 'required|max:100|min:3|unique:secretarias,login,' . $id,
                'senha' => 'nullable|max:255|min:6',
            ],
            [
                'login.required' => "O campo login é obrigatório.",
                'login.max' => "O login pode ter no máximo 100 caracteres.",
                'login.min' => "O login deve ter no mínimo 3 caracteres.",
                'login.unique' => "Este login já está em uso.",
                'senha.max' => "A senha pode ter no máximo 255 caracteres.",
                'senha.min' => "A senha deve ter no mínimo 6 caracteres.",
            ]
        );

        $data = $request->all();

        // Atualizar a senha apenas se estiver sendo enviada
        if ($request->filled('senha')) {
            $data['senha'] = bcrypt($data['senha']);
        } else {
            unset($data['senha']);
        }

        Secretaria::updateOrCreate(
            ['id' => $id],
            $data
        );

        return redirect('secretaria');
    }

    // Exclusão de uma secretária
    public function destroy($id)
    {
        Secretaria::findOrFail($id)->delete();

        return redirect('secretaria');
    }

    // Busca por secretárias
    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $dados = Secretaria::where($request->tipo, 'like', "%$request->valor%")->get();
        } else {
            $dados = Secretaria::all();
        }

        return view('secretaria.list', ['dados' => $dados]);
    }
}