<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemPropostaModel extends Model
{
    protected $table = 'itens_proposta';
    protected $primaryKey = 'id';
    protected $allowedFields = ['proposta_id', 'produto_servico_id', 'quantidade', 'dias', 'valor', 'custo_locado', 'lucro', 'margem'];
}