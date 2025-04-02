<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Afficher la vue du formulaire d'inscription.
     */
    public function create(): View
    {
        return view('auth.register');  // Formulaire d'inscription
    }

    /**
     * Gérer la requête d'inscription.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validation des données du formulaire
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Création de l'utilisateur avec l'attribut 'active' par défaut à 0
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'active' => 0,  // L'utilisateur est inactif par défaut
        ]);

        // Événement de l'inscription de l'utilisateur
        event(new Registered($user));

        // Connexion automatique de l'utilisateur
        Auth::login($user);

        // Redirection après l'inscription
        // Si l'utilisateur doit être redirigé vers une page spécifique (comme le tableau de bord)
        return redirect(route('dashboard'));  // Redirige vers le tableau de bord après l'inscription (si tu veux cette logique)

        // Si tu veux rediriger vers une autre page après l'inscription, tu peux utiliser une autre route :
        // return redirect('/');  // Redirige vers la page d'accueil
    }
}
