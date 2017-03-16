<?php

namespace App\modeles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use DB;

class Proprietaire extends Model
{
    public function login($login, $pwd){
        $connected = false;
        $proprietaire = DB::table('proprietaire')
                ->select()
                ->where('login', '=', $login)
                ->first();
        if($proprietaire){
            if($proprietaire -> pwd == $pwd){
                Session::put('id', $proprietaire->id_proprietaire);
                $connected = true;
            }
        }
    return $connected;
    }
    
    public function logout(){
        Session::forget('id');
    }

    /**
     * Liste les propriétaires
     * @return Collection Proprietaire
     */
    public function getProprietaire(){
        $proprietaires = DB::table('proprietaire')->get();
        return $proprietaires;
    }
}
