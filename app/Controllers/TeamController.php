<?php

namespace App\Controllers;

use App\Models\TeamModel;

class TeamController extends BaseController
{
    public function index()
    {
        // Carregar o modelo da equipe
        $teamModel = new TeamModel();

        // Buscar os membros da equipe
        $teamMembers = $teamModel->getTeamMembers();

        // Passar os membros da equipe para a view
        return view('partials/team', ['teamMembers' => $teamMembers]);
    }
}