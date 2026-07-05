<?php

namespace App\Models;

use CodeIgniter\Model;

class CaseModel extends Model
{
    protected $table = 'cases';  // Nome da tabela no banco
    protected $primaryKey = 'id';  // Chave primária
    protected $allowedFields = ['title', 'description', 'description2', 'titulo2', 'description3', 'titulo3', 'description4', 'keywords', 'slug', 'image_site', 'image_banner', 'featured_image', 'carousel_image_1', 'carousel_image_2', 'carousel_image_3', 'carousel_image_4', 'carousel_image_5', 'carousel_image_6', 'client', 'project_date', 'category', 'description1', 'instagram'];
}