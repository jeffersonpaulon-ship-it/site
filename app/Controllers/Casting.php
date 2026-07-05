<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CastingModel;

class Casting extends BaseController
{
    public function index()
    {
        $model = new CastingModel();
        $data['casting'] = $model->getAllCasting();
        $data['title'] = 'Gerenciamento de Casting';

        return view('admin/casting', $data);
    }
}