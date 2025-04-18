<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BienvenueMail extends Mailable
{
    use Queueable, SerializesModels;

    public $nom;

    // Constructeur pour initialiser la variable $nom
    public function __construct($nom)
    {
        $this->nom = $nom;
    }

    // Méthode build pour définir la vue de l'email
    public function build()
    {
        return $this->view('emails.bienvenue') // Appel de la vue 'emails.bienvenue'
                    ->with('nom', $this->nom);  // Passer la variable $nom à la vue
    }
}
