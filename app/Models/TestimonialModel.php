<?php

namespace App\Models;

use CodeIgniter\Model;

class TestimonialModel extends Model
{
    protected $table = 'testimonials'; // Nome da tabela
    protected $primaryKey = 'id';
    protected $allowedFields = ['client_name', 'company_name', 'testimonial_text', 'client_photo', 'video_url', 'created_at', 'updated_at'];

    // Função para buscar todos os depoimentos
    public function getTestimonials()
    {
        return $this->orderBy('created_at', 'DESC')->findAll(); // Retornar todos os depoimentos
    }
}