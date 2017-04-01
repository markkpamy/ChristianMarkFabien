<?php

namespace App\modeles;

use Illuminate\Database\Eloquent\Model;
use DB;

class Reservation extends Model
{
    public function addReservation($id_oeuvre, $id_adherent, $date_reservation){
        try{
            DB::table('reservation')->insert(
                ['id_oeuvre'=> $id_oeuvre,
                'id_adherent' => $id_adherent,
                'date_reservation' => $date_reservation]
            );
        } catch (Exception $ex){
            throw $ex;
        }
    }
    
    public function getReservation(){
        
    }
}
