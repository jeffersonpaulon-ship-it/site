<?php

namespace App\Models;

use CodeIgniter\Model;

class TrabalheConoscoModel extends Model
{
    protected $table = 'trabalhe_conosco';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'mei', 'cnpj', 'cpf', 'nome', 'sobrenome', 'apelido', 'celular', 'email', 'senha', 'data_nascimento', 'cep', 'endereco', 'numero', 'complemento', 'bairro', 'cidade', 'uf', 'possui_veiculo', 'idiomas', 'funcao_pretendida', 'foto_perfil_1', 'foto_perfil_2', 'foto_corpo_inteiro_1', 'foto_corpo_inteiro_2', 'foto_corpo_inteiro_3', 'foto_corpo_inteiro_4',  'descricao', 'created_at', 'updated_at'
    ];
}