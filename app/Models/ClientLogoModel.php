<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientLogoModel extends Model
{
    protected $table = 'client_logos'; // Nome da tabela
    protected $primaryKey = 'id';
    protected $allowedFields = ['client_name', 'logo_image', 'logo_image_white', 'order', 'created_at', 'updated_at'];

    // Função para buscar os logos ordenados
    public function getClientLogos()
    {
        return $this->orderBy('order', 'ASC')->findAll();
    }
}