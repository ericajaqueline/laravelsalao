<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    // Defina o nome da tabela, caso seja diferente de 'agendamentos'
    protected $table = 'agendamentos';

    // Especifique quais campos podem ser preenchidos em massa
    protected $fillable = [
        'nome_cliente',
        'telefone_cliente',
        'data_agendamento',
        'horario_agendamento',
        'id_servico',
        'id_secretaria',
    ];

    /**
     * Relacionamento com o modelo de Servico (1 agendamento pertence a 1 serviço)
     */
    public function servico()
    {
        return $this->belongsTo(Servico::class, 'id_servico');
    }

    /**
     * Relacionamento com o modelo de Secretaria (1 agendamento pertence a 1 secretária)
     */
    public function secretaria()
    {
        return $this->belongsTo(Secretaria::class, 'id_secretaria');
    }
}