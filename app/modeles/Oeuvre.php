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

    /**
     * Modification d'une Oeuvre
     * @param $id_Oeuvre
     * @param $titre_Oeuvre
     * @param $prix
     * @param $proprietaire
     * @throws \Exception
     */
    public function updateOeuvre($id_Oeuvre, $titre_Oeuvre, $prix, $proprietaire){
        try{
            DB::table('oeuvre')->where('id_oeuvre','=',$id_Oeuvre)
                ->update(
                    ['titre' => $titre_Oeuvre,
                    'id_proprietaire' => $proprietaire,
                    'prix' => $prix]
                );
        }catch (Exception $ex){
            throw $ex;
        }
    }
    /**
     * Insertion d'une oeuvre
     * @param $titre_oeuvre
     * @param $proprietaire_oeuvre
     * @param $prix
     * @throws \Exception
     */
    public function addOeuvre($titre_oeuvre, $proprietaire_oeuvre, $prix){
        try{
            DB::table('oeuvre')->insert(
                ['id_proprietaire'=> $proprietaire_oeuvre,
                'titre' => $titre_oeuvre,
                'prix' => $prix]
            );
        }catch (Exception $ex){
            throw $ex;
        }
    }
}
