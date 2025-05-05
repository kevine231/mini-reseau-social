<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Interest;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Inertia\Inertia;

class RegisterController extends Controller
{
    public function create()
    {
        return Inertia::render('Auth/Register', [
            'interests' => Interest::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'photo' => ['nullable', 'image', 'max:1024'], // Max 1MB
            'interests' => ['required', 'array', 'min:1'],
            'groups' => ['array'],
        ]);

        // Gérer l'upload de la photo
        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('profile-photos', 'public');
        }

        // Créer l'utilisateur
        $user = User::create([
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'photo' => $photoPath,
        ]);

        // Attacher les centres d'intérêt
        $user->interests()->attach($request->interests);

        // Créer les groupes
        if ($request->has('groups')) {
            foreach ($request->groups as $groupData) {
                $group = Group::create([
                    'name' => $groupData['name'],
                    'description' => $groupData['description'],
                    'created_by' => $user->id,
                ]);

                // Ajouter l'utilisateur comme membre du groupe
                $group->members()->attach($user->id, ['role' => 'admin']);
            }
        }

        // Connecter l'utilisateur
        auth()->login($user);

        return redirect()->route('dashboard');
    }
}
