<?php

namespace App\Controllers;

use App\Models\SliderModel;

class SliderController extends BaseController
{
    public function index()
    {
        // Carregar o model dos sliders
        $sliderModel = new SliderModel();

        // Buscar todos os sliders ordenados pelo campo 'order'
        $sliders = $sliderModel->getSliders();

        // Passar os sliders para a view
        return view('partials/slider', ['sliders' => $sliders]);
    }
}