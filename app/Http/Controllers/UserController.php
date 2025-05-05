<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Méthode pour activer un utilisateur
    public function activate($id)
    {
        // Trouver l'utilisateur par ID
        $user = User::find($id);

        // Vérifier si l'utilisateur existe
        if ($user) {
            // Marquer l'utilisateur comme actif
            $user->active = 1;

            // Sauvegarder les modifications dans la base de données
            $user->save();

            // Retourner un message de succès
            return redirect()->back()->with('success', 'Utilisateur activé avec succès!');
        }

        // Si l'utilisateur n'est pas trouvé, retourner une erreur
        return redirect()->back()->with('error', 'Utilisateur non trouvé.');
    }

    // Méthode pour désactiver un utilisateur

    public function deactivate($id)
    {
        // Trouver l'utilisateur par ID
        $user = User::find($id);

        // Vérifier si l'utilisateur existe
        if ($user) {
            // Marquer l'utilisateur comme inactif
            $user->active = 0;

            // Sauvegarder les modifications dans la base de données
            $user->save();

            // Retourner un message de succès
            return redirect()->back()->with('success', 'Utilisateur désactivé avec succès!');
        }

        // Si l'utilisateur n'est pas trouvé, retourner une erreur
        return redirect()->back()->with('error', 'Utilisateur non trouvé.');
    }



    public function index()
{
    // Récupérer tous les utilisateurs
    $users = User::all();

    // Retourner la vue avec les utilisateurs
    return view('users.index', compact('users'));
}

}

