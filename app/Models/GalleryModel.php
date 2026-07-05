<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryModel extends Model
{
    protected $table = 'galleries'; // Nome da tabela
    protected $primaryKey = 'id';
    protected $allowedFields = ['project_name', 'client_name', 'category', 'description', 'images', 'video_url', 'image_home', 'created_at', 'updated_at'];

    // Função para buscar apenas os projetos para exibição na home
    public function getHomeGallery()
    {
        return $this->where('home_image', 1)->orderBy('created_at', 'DESC')->findAll();
    }
}