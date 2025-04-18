<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // Ajoute cette ligne pour l'accès à authorize()
use App\Http\Controllers\Controller; // Assure-toi que tu importes la classe Controller

class DashboardController extends Controller
{
    use AuthorizesRequests; // Ajoute ce trait pour avoir accès à la méthode authorize()

    // Fonction pour afficher le tableau de bord
    public function index()
    {
        // Vérifie si l'utilisateur peut accéder au tableau de bord
        $this->authorize('viewDashboard', User::class);

        // Récupérer le nombre total d'utilisateurs inscrits
        $totalUsers = User::count();

        // Calculer le taux d'engagement (en fonction des utilisateurs actifs)
        $activeUsers = User::where('active', 1)->count();
        $engagement = $totalUsers > 0 ? ($activeUsers / $totalUsers) * 100 : 0;

        // Passer les données à la vue
        return view('dashboard', compact('totalUsers', 'engagement'));
    }
}

