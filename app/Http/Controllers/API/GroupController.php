<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GroupController extends Controller
{
  // Méthodes spécifiques pour rejoindre/quitter un groupe
  public function join(Request $request, Group $group)
  {
      $user = $request->user();

      // Vérifier si l'utilisateur n'est pas déjà membre
      if (!$user->groups->contains($group->id)) {
          $user->groups()->attach($group->id);
          return response()->json(['message' => 'Vous avez rejoint le groupe avec succès']);
      }

      return response()->json(['message' => 'Vous êtes déjà membre de ce groupe'], 400);
  }

  public function leave(Request $request, Group $group)
  {
      $user = $request->user();

      // Vérifier si l'utilisateur est membre
      if ($user->groups->contains($group->id)) {
          // S'assurer que ce n'est pas le créateur du groupe
          if ($group->creator_id === $user->id) {
              return response()->json(['message' => 'Le créateur ne peut pas quitter le groupe'], 400);
          }

          $user->groups()->detach($group->id);
          return response()->json(['message' => 'Vous avez quitté le groupe avec succès']);
      }

      return response()->json(['message' => 'Vous n\'êtes pas membre de ce groupe'], 400);
  }
