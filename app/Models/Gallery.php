<?php

namespace App\Models;
use CodeIgniter\Model;

class Gallery extends Model
{
    protected $table = 'gallery';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title_gallery', 'photo', 'menu_id', 'created_at', 'updated_at'];
}