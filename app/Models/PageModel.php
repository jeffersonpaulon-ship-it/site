<?php

namespace App\Models;

use CodeIgniter\Model;

class PageModel extends Model
{
    protected $table = 'pages';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'menu_id', 'photo_destaque', 'content', 'gallery_id', 
        'title_destaque1', 'text1', 'title_destaque2', 'text2',
        'title_beneficios', 'text_beneficios', 'photo_beneficios', 
        'text3', 'text4', 'text5', 'partials1', 'partials2', 'partials3', 'created_at'
    ];

    // Buscar a página pelo slug do menu relacionado
    public function getPageBySlug($slug)
    {
        return $this->select('pages.*, menus.slug')
                    ->join('menus', 'menus.id = pages.menu_id')
                    ->where('menus.slug', $slug)
                    ->first();
    }
}