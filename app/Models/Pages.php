<?php

namespace App\Models;

use CodeIgniter\Model;

class Pages extends Model
{
    protected $table = 'pages';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'menu_id', 'photo_destaque', 'text', 'gallery_id',
        'title_destaque1', 'text1', 'title_destaque2', 'text2',
        'title_beneficios', 'text_beneficios', 'photo_beneficios',
        'text3', 'text4', 'text5', 'created_at', 'updated_at'
    ];
}