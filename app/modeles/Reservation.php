<?php

namespace App\modeles;

use Illuminate\Database\Eloquent\Model;
use DB;
use DateTime;

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
           $date = date_create($date_reservation);
            DB::table('reservation')->insert(
                ['id_oeuvre'=> $id_oeuvre,
                'id_adherent' => $id_adherent,
                //'date_reservation' => DB::raw(date_format('$date_reservation', '%d/%m/%Y')),
                    'date_reservation' => date_format($date, 'Y-m-d'),
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
    public function confirmerReservation($idOeuvre, $date){
        try{
            if((DB::table('reservation')
                ->Select('statut')
                ->where([
                    ['id_oeuvre','=',$idOeuvre],
                    ['date_reservation','=', $date]
                ])
                ->get()) != 'Confirmé'
            ) {
                $statut = "Confirmé";
                DB::table('reservation')
                    ->where([
                        ['id_oeuvre', '=', $idOeuvre],
                        ['date_reservation', '=', $date]
                    ])
                    ->insert(['statut' => $statut]);
            }
        }catch (Exception $ex){
            throw $ex;
        }
    }

    /**
     * @param $idOeuvre
     * @param $date
     * @return Reservation à supprimer
     */
    public function getReservation($idOeuvre, $date){
        $reservation = DB::table('reservation')
            ->where([
                ['id_oeuvre','=', $idOeuvre],
                ['date_reservation','=', $date]
            ])
            ->get();
        return $reservation;
    }

    /**
     * @param $date Date date de reservation
     * @param $idOeuvre int id de l oeuvre
     * @param $idAdherent int id adherent
     * @throws \Exception
     */
    public function deleteReservation($idOeuvre,$date){
        try{
            DB::table('reservation')
                ->where([
                    ['id_oeuvre','=',$idOeuvre],
                    ['date_reservation','=', $date]
                    ])
                ->delete();
        }catch (Exception $ex){
            throw $ex;
        }
    }
}
