<?php

namespace App\Controllers;

class LandingPageController extends BaseController
{
    public function index()
    {
        // Carrega a view da Landing Page
        return view('landing_page_view');
    }
}