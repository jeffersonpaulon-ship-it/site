<?php

namespace App\Controllers;

use App\Models\TestimonialModel;

class TestimonialController extends BaseController
{
    public function index()
    {
        // Carregar o modelo de depoimentos
        $testimonialModel = new TestimonialModel();

        // Buscar todos os depoimentos e vídeos
        $testimonials = $testimonialModel->getTestimonials();

        // Passar os dados para a view
        return view('partials/testimonials', ['testimonials' => $testimonials]);
    }
}