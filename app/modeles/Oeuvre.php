<?php

namespace App\modeles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use DB;

class Oeuvre extends Model
{
    public function getOeuvres(){
        $oeuvres = DB::table('oeuvre')
            ->Select('id_oeuvre', 'oeuvre.id_proprietaire', 'titre', 'prix')
            ->join('proprietaire', 'oeuvre.id_proprietaire', '=','propritaire.id_proprietaire')
            ->get();
        return $oeuvres;
    }
}
