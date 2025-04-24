<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
 public function saveStep1(Request $request)
 {
     $user = $request->user();

     $validated = $request->validate([
         'name' => 'required|string|max:255',
         'phone' => 'nullable|string|max:20',
         'birthdate' => 'required|date',
         'bio' => 'nullable|string',
         'location' => 'nullable|string',
     ]);

     $user->update($validated);
     $user->step_completed = 1;
     $user->save();

     return response()->json(['message' => 'Étape 1 complétée']);
 }

 public function saveStep2(Request $request)
 {
     $user = $request->user();

     $validated = $request->validate([
         'interests' => 'required|array',
         'interests.*' => 'exists:interests,id',
     ]);

     $user->interests()->sync($request->interests);
     $user->step_completed = 2;
     $user->save();

     return response()->json(['message' => 'Étape 2 complétée']);
 }

 public function saveStep3(Request $request)
 {
     $user = $request->user();

     // L'utilisateur peut choisir de rejoindre des groupes existants
     if ($request->has('groups')) {
         $user->groups()->sync($request->groups);
     }

     // L'utilisateur peut créer un nouveau groupe
     if ($request->has('new_group')) {
         $validated = $request->validate([
             'new_group.name' => 'required|string|max:255',
             'new_group.description' => 'required|string',
             'new_group.image' => 'nullable|image|max:2048',
         ]);

         // Gestion de l'upload d'image
         $imagePath = null;
         if ($request->hasFile('new_group.image')) {
             $imagePath = $request->file('new_group.image')->store('groups', 'public');
         }

         $group = Group::create([
             'name' => $validated['new_group']['name'],
             'description' => $validated['new_group']['description'],
             'image' => $imagePath,
             'creator_id' => $user->id,
         ]);

         // L'utilisateur est automatiquement membre et admin du groupe
         $user->groups()->attach($group->id, ['is_admin' => true]);
     }

     $user->step_completed = 3;
     $user->profile_completed = true;
     $user->save();

     return response()->json(['message' => 'Profil complété avec succès']);
 }

 public function updateProfile(Request $request)
 {
     $user = $request->user();

     $validated = $request->validate([
         'name' => 'required|string|max:255',
         'phone' => 'nullable|string|max:20',
         'birthdate' => 'required|date',
         'bio' => 'nullable|string',
         'location' => 'nullable|string',
         'social_links' => 'nullable|array',
         'avatar' => 'nullable|image|max:2048',
     ]);

     // Gestion de l'upload d'avatar
     if ($request->hasFile('avatar')) {
         $avatarPath = $request->file('avatar')->store('avatars', 'public');
         $validated['avatar'] = $avatarPath;
     }

     $user->update($validated);

     // Mise à jour des intérêts si fournis
     if ($request->has('interests')) {
         $user->interests()->sync($request->interests);
     }

     return response()->json(['message' => 'Profil mis à jour avec succès']);
 }
}
