<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretaria extends Model
{
    use HasFactory;

    // Definindo o nome da tabela se for diferente do nome padrão
    protected $table = 'secretarias';

    // Campos que podem ser preenchidos
    protected $fillable = [
        'login',
        'senha',
    ];

    // Relacionamento com Agendamentos (uma secretária pode ter vários agendamentos)
    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class, 'id_secretaria');
    }
}