<?php

namespace App\modeles;

use Illuminate\Database\Eloquent\Model;
use DB;
class Adherent extends Model
{
    public function getAdherent(){
        $adherent = DB::table('adherent')->get();
        return $adherent;
    }
}
