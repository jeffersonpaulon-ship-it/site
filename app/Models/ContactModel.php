<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table = 'contact'; // Nome da tabela no banco de dados
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome', 'empresa', 'cargo', 'email', 'telefone', 'site', 'mensagem', 'created_at', 'updated_at']; // Campos permitidos para inserção
}