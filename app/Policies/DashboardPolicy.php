<?php

namespace App\Policies;

use App\Models\User;

class DashboardPolicy
{
    /**
     * Détermine si l'utilisateur peut voir le tableau de bord.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function viewDashboard(User $user)
    {
        // Exemple : L'utilisateur peut voir le tableau de bord s'il est administrateur
      //  return $user->role === 'admin'; // Remplace cette logique par la tienne

      return $user !== null; // Tout utilisateur authentifié peut voir le tableau de bord
    }

}
