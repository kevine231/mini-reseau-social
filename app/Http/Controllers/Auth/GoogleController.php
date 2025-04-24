<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GoogleController extends Controller
{
  public function redirectToGoogle()
  {
      return Socialite::driver('google')->redirect();
  }

  public function handleGoogleCallback()
  {
      try {
          $user = Socialite::driver('google')->user();

          $finduser = User::where('google_id', $user->id)->first();

          if ($finduser) {
              Auth::login($finduser);
              return redirect('/dashboard');
          } else {
              $newUser = User::create([
                  'name' => $user->name,
                  'email' => $user->email,
                  'google_id' => $user->id,
                  'avatar' => $user->avatar,
                  'password' => null // Pas de mot de passe pour OAuth
              ]);

              Auth::login($newUser);
              return redirect()->route('profile.wizard.step1');
          }
      } catch (Exception $e) {
          return redirect('login')->withErrors('Une erreur s\'est produite lors de la connexion avec Google.');
      }
  }
}
