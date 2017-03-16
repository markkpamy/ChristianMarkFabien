<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use App\modeles\Proprietaire;
use Request;
use App\modeles\Oeuvre;
use Illuminate\Support\Facades\Session;

class OeuvreController extends Controller
{
    public function getOeuvres(){
        $erreur = Session::get('erreur');
        Session::forget('erreur');
        $oeuvre = new Oeuvre();
        
        $oeuvres = $oeuvre -> getOeuvres();
        return view('listeOeuvres', compact('oeuvres', 'erreur'));
    }

    /**
     * Initialise toutes les listes déroulantes
     * Lit l'oeuvre à modifier
     * Initialise le formulaire en mode Modification
     *
     */

    public function updateOeuvre($id, $erreur=""){
        $laOeuvre = new Oeuvre();
        $oeuvre = $laOeuvre->getOeuvre($id);
        $proprietaire = new Proprietaire();
        $proprietaires = $proprietaire->getProprietaire();
        $titreVue = "Modification d'une Oeuvre";
        //Affiche le formulaire en lui fournissant les données à afficher
        return view('formOeuvre', compact('oeuvre','proprietaires','titreVue','erreur'));
    }
}
