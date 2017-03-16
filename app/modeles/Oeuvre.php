<?php

namespace App\modeles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use DB;

class Oeuvre extends Model
{
    /**
     * Lecture de tous les oeuvres avec mise en oeuvre
     * des jointures
     * @return Collection d'Oeuvres
     */

    public function getOeuvres(){
        $oeuvres = DB::table('oeuvre')
            ->Select('id_oeuvre', 'oeuvre.id_proprietaire', 'titre', 'prix')
            ->join('proprietaire', 'oeuvre.id_proprietaire', '=','proprietaire.id_proprietaire')
            ->get();
        return $oeuvres;
    }

    /**
     * Lecture d'une oeuvre sur son ID
     * @param $id_oeuvre : id de l'oeuvre
     */
    public function getOeuvre($id_oeuvre){
        $oeuvre = DB::table('oeuvre')
            ->Select()
            ->Where('id_oeuvre','=', $id_oeuvre)
            ->first();
        return $oeuvre;
    }
}
