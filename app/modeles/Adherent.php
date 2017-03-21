<?php

namespace App\modeles;

use Illuminate\Database\Eloquent\Model;
use DB;
class Adherent extends Model
{
    public function reserverOeuvre($id_oeuvre, $id_adherent, $date_reservation){
        try{
            DB::table('reservation')->insert(
                ['id_oeuvre'=> $id_oeuvre,
                'titre' => $id_oeuvre -> titre,
                'date_reservation' => $date_reservation]
            );
        } catch (Exception $ex){
            throw $ex;
        }
    }
    
    public function getAdherent(){
        $adherent = DB::table('adherent')->get();
        return $adherent;
    }
}
