<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\modeles\Adherent;
use App\modeles\Oeuvre;
use Request;


class ReservationController extends Controller
{
        public function addReservation($id_oeuvre){
        $erreur = Session::get('erreur');
        Session::forget('erreur');
        
        $oeuvreReserver = new Oeuvre();
        $oeuvre = $oeuvreReserver ->getOeuvres($id_oeuvre);
        $adherent = new Adherent();
        $adherents = $adherent->getAdherent();
        $titreVue = "Reserver une Oeuvre";
        //Affiche le formulaire en lui fournissant les données à afficher
        return view('formReservation', compact('oeuvre', 'adherents', 'titreVue', 'erreur'));
    }
    
    public function validerReservation(){
        
        $id_oeuvre = Request::input('id_oeuvre');
        $id_adherent = Request::input('cbAdherent');
        $date_reservation = Request::input('date_reservation');

        $adherent = new Adherent();

        try{
            if($id_oeuvre>0){
                $adherent->reserverOeuvre($id_oeuvre, $id_adherent, $date_reservation);
            }
            else{
                return redirect('/listerOeuvres');
            }
        }catch (Exception $ex){
            $erreur = $ex->getMessage();
        }
        //On reaffiche la listes des oeuvres
        return redirect('/listerOeuvres');
    }
}
