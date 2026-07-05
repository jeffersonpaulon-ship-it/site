<?php

namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table = 'blog'; // Nome da tabela
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'slug', 'author', 'category', 'subtitle', 'content', 'main_image', 'additional_images', 'created_at', 'updated_at'];

    // Definir os callbacks antes de inserir ou atualizar
    protected $beforeInsert = ['generateSlug'];
    protected $beforeUpdate = ['generateSlug'];

    // Função para gerar o slug
    protected function generateSlug(array $data)
    {
        if (isset($data['data']['title'])) {
            $data['data']['slug'] = url_title($data['data']['title'], '-', true);
        }

        return $data;
    }

    // Função para buscar post pelo slug
    public function getPostBySlug($slug)
    {
        return $this->where('slug', $slug)->first();
    }

    // Função para buscar os posts mais recentes
    public function getRecentPosts($limit = 3)
    {
        return $this->orderBy('created_at', 'DESC')->limit($limit)->findAll();
    }
}