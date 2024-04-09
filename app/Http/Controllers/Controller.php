<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController // Classe de base pour tous les contrôleurs de l'application
{
    use AuthorizesRequests, ValidatesRequests;// Importe les traits pour l'autorisation et la validation des requêtes
}
