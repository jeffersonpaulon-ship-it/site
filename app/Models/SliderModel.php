<?php

namespace App\Models;

use CodeIgniter\Model;

class SliderModel extends Model
{
    protected $table = 'sliders'; // Nome da tabela no banco de dados
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'subtitle', 'image', 'button_text', 'button_link', 'order', 'created_at', 'updated_at'];

    // Função para buscar os sliders ordenados
    public function getSliders()
    {
        return $this->orderBy('order', 'ASC')->findAll();
    }
}