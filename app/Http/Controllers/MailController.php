<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\BienvenueMail;

class MailController extends Controller
{
    public function envoyer()
    {
        $nom = "Jean Dupont"; // Données à envoyer à la vue


        Mail::to("test@example.com")->send(new BienvenueMail($nom));

        return "E-mail envoyé avec succès vers Mailtrap !";
    }
}
