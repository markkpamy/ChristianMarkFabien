<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Http\Requests;
use App\modeles\Adherent;
use App\modeles\Oeuvre;
use App\modeles\Reservation;
use Request;


class ReservationController extends Controller
{
    public function addReservation($idOeuvre)
    {
        $erreur = Session::get('erreur');
        Session::forget('erreur');
        $laOeuvre = new Oeuvre();
        $oeuvre = $laOeuvre->getOeuvre($idOeuvre);
        $adherent = new Adherent();
        $adherents = $adherent->getAdherent();
        $titreVue = "Reserver une Oeuvre";
        //Affiche le formulaire en lui fournissant les données à afficher
        return view('formReservation', compact('oeuvre', 'adherents', 'titreVue', 'erreur'));
    }

    public function validerReservation()
    {
        $id_oeuvre = Request::input('id_oeuvre');
        $id_adherent = Request::input('cbAdherent');
        $date_reservation = Request::input('date_reservation');
        $statut = "Attente";
        $reservation = new Reservation();

        try {
            $reservation->addReservation($id_oeuvre, $id_adherent, $date_reservation, $statut);
        } catch (Exception $ex) {
            $erreur = $ex->getMessage();
        }
        //On reaffiche la listes des oeuvres
        return redirect('/listerOeuvres');
    }
    public function confirmerReservation($id_oeuvre, $date)
    {
        $reservation = new Reservation();
        try {
            $reservation->confirmerReservation($id_oeuvre, $date);
        } catch (Exception $ex) {
            $erreur = $ex->getMessage();
        }

        //On reaffiche la listes des reservations
        return redirect('/reservationOeuvre');
    }

    public function deleteReservation($id_oeuvre, $date)
    {
        $reservation = new Reservation();
        try {
            $reservation->deleteReservation($id_oeuvre, $date);
        } catch (Exception $ex) {
            $erreur = $ex->getMessage();
        }
        return redirect('/reservationOeuvre');
    }

    public function getReservations()
    {
        $erreur = Session::get('erreur');
        Session::forget('erreur');
        $reservation = new Reservation();
        $reservations = $reservation->getReservations();
        return view('listeReservations', compact('reservations', 'erreur'));
    }
}
