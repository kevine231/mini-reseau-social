<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
   public function store(Request $request)
   {
       $validated = $request->validate([
           'name' => 'required',
           'email' => 'required|email|unique:users',
           'password' => 'required|min:6',
           'interests' => 'nullable|string',
           'group' => 'nullable|string',
       ]);

       $user = \App\Models\User::create([
           'name' => $validated['name'],
           'email' => $validated['email'],
           'password' => bcrypt($validated['password']),
           // Tu peux aussi stocker interests et group dans des champs dédiés si tu les ajoutes à la table users
       ]);

       auth()->login($user);

       return response()->json(['message' => 'Utilisateur créé avec succès']);

       return redirect()->route('bienvenue');

   }

