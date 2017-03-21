<?php

namespace App\Http\Controllers;
use App\modeles\Adherent;
use App\modeles\Oeuvre;
use Illuminate\Support\Facades\Session;

class AdherentController extends Controller
{
    public function reserverOeuvre(){
        $erreur = Session::get('erreur');
        Session::forget('erreur');
        
        $oeuvre = new Oeuvre();
        $adherent = new Adherent();
        $adherents = $adherent->getAdherent();
        $titreVue = "Reserver une Oeuvre";
        //Affiche le formulaire en lui fournissant les données à afficher
        return view('formReservation', compact('oeuvre', 'adherents', 'titreVue', 'erreur'));
    }
    
}
