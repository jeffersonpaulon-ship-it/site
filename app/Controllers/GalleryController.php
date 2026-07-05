<?php

namespace App\Controllers;

use App\Models\CaseModel;

class GalleryController extends BaseController
{
    public function index()
    {
        // Carregar os Cases de Sucesso (mesma fonte usada na home e em /cases)
        $caseModel = new CaseModel();
        $galleryItems = $caseModel->orderBy('id', 'DESC')->findAll();

        // Passar os projetos para a view
        return view('partials/gallery', ['galleryItems' => $galleryItems]);
    }
}