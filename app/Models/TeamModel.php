<?php

namespace App\Models;

use CodeIgniter\Model;

class TeamModel extends Model
{
    protected $table = 'team'; // Nome da tabela no banco de dados
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'linkedin', 'position', 'photo', 'created_at', 'updated_at'];

    // Função para buscar todos os membros da equipe
    public function getTeamMembers()
    {
        return $this->orderBy('created_at', 'DESC')->findAll(); // Buscar todos os membros
    }
}