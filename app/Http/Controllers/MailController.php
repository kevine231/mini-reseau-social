<?php
namespace App\Http\Controllers;
use App\Mail\BienvenueMail;
use Illuminate\Support\Facades\Mail;
class MailController extends Controller
{
public function envoyer()
{
$nom = "Jean Dupont";
Mail::to("test@exemple.com")->send(new BienvenueMail($nom));
return "E-mail envoyé avec succès vers Mailtrap !";
}
}
