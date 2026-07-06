<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdutoServicoModel extends Model
{
    protected $table = 'produtos_servicos';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome', 'descricao', 'preco_diaria', 'preco_3_dias', 'preco_5_dias', 'preco_7_dias', 'preco_10_dias', 'ano_utilizacao', 'custo_proprio', 'custo_locado'];

    protected $useTimestamps = false; // A tabela não tem campos de timestamp

    protected $validationRules = [
        'nome' => 'required|max_length[255]',
        'descricao' => 'required',
        'preco_diaria' => 'required|numeric',
        'preco_3_dias' => 'required|numeric',
        'preco_5_dias' => 'required|numeric',
        'preco_7_dias' => 'required|numeric',
        'preco_10_dias' => 'required|numeric',
        'ano_utilizacao' => 'required|numeric|exact_length[4]',
        'custo_proprio' => 'required|numeric',
        'custo_locado' => 'required|numeric'
    ];

    protected $validationMessages = [
        'nome' => [
            'required' => 'O campo Nome é obrigatório.',
            'max_length' => 'O Nome não pode exceder 255 caracteres.'
        ],
        'descricao' => [
            'required' => 'O campo Descrição é obrigatório.'
        ],
        'preco_diaria' => [
            'required' => 'O Preço da Diária é obrigatório.',
            'numeric' => 'O Preço da Diária deve ser um número.'
        ],
        // Adicione mensagens similares para os outros campos
    ];

    // Método para debug da consulta SQL
    public function insertWithDebug($data)
    {
        $builder = $this->db->table($this->table);
        $sql = $builder->getCompiledInsert($data);
        log_message('debug', 'SQL Insert Query: ' . $sql);
        return $this->insert($data);
    }
}