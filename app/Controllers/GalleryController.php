<?php

namespace App\Controllers;

use App\Models\GalleryModel;

class GalleryController extends BaseController
{
    public function index()
    {
        // Carregar o modelo da galeria
        $galleryModel = new GalleryModel();

        // Buscar os projetos para a home
        $galleryItems = $galleryModel->getHomeGallery();

        // Passar os projetos para a view
        return view('partials/gallery', ['galleryItems' => $galleryItems]);
    }
}