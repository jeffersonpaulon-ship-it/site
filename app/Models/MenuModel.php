<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = 'menus'; // Nome da tabela no banco de dados
    protected $primaryKey = 'id';

    // Força o CodeIgniter a sempre retornar arrays puros para não perder dados nos submenus
    protected $returnType = 'array';

    // Campos permitidos para inserção/atualização
    protected $allowedFields = [
        'parent_id', 'title_menu', 'title', 'description', 'keywords', 'canonical',
        'image', 'link', 'slug', 'order', 'icon', 'show_in_menu', 'menu_id'
    ];

    public function getMenuItems()
    {
        // Retorna todos os itens do menu, ordenados pelo campo 'order'
        return $this->orderBy('order', 'ASC')->findAll();
    }

    // Método para pegar itens do menu que devem ser mostrados no menu (show_in_menu = 1)
    public function getVisibleMenuItems()
    {
        return $this->where('show_in_menu', 1)->orderBy('order', 'ASC')->findAll();
    }
}