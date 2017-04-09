<?php

namespace App\modeles;

use Illuminate\Database\Eloquent\Model;
use DB;

class Reservation extends Model
{
    /**
     * Ajouter une reservation d'oeuvre
     * @param type $id_oeuvre
     * @param type $id_adherent
     * @param type $date_reservation
     * @param type $statut
     * @throws \App\modeles\Exception
     */
    public function addReservation($id_oeuvre, $id_adherent, $date_reservation, $statut){
        try{
            DB::table('reservation')->insert(
                ['id_oeuvre'=> $id_oeuvre,
                'id_adherent' => $id_adherent,
                'date_reservation' => $date_reservation,
                'statut' => $statut]
            );
        } catch (Exception $ex){
            throw $ex;
        }
    }
    
    public function getReservations(){
        $reservations = DB::table('reservation')
            ->Select('reservation.id_oeuvre','date_reservation','adherent.nom_adherent','adherent.prenom_adherent', 'statut','titre')
            ->join('adherent', 'adherent.id_adherent', '=','reservation.id_adherent')
            ->join('oeuvre','oeuvre.id_oeuvre','=','reservation.id_oeuvre')
            ->get();
        return $reservations;
    }

    public function getReservation($idOeuvre){
        $reservation = DB::table('reservation')
            ->where('id_oeuvre','=', $idOeuvre)
            ->get();
        return $reservation;
    }

    /**
     * @param $date Date date de reservation
     * @param $idOeuvre int id de l oeuvre
     * @param $idAdherent int id adherent
     * @throws \Exception
     */
    public function deleteReservation($date, $idOeuvre, $idAdherent){
        try{
            DB::table('reservation')
                ->where([
                    ['id_oeuvre','=',$idOeuvre],
                    ['date_reservation','=', $date],
                    ['id_adherent','=',$idAdherent]
                    ])
                ->delete();
        }catch (Exception $ex){
            throw $ex;
        }
    }
}
