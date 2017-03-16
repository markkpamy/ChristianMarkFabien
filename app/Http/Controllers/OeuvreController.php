<?php

namespace App\Http\Controllers;
use App\Http\Requests;
use Request;
use App\modeles\Oeuvre;
use Illuminate\Support\Facades\Session;

class OeuvreController extends Controller
{
    public function getMangas(){
        $erreur = Session::get('erreur');
        Session::forget('erreur');
        $oeuvre = new Oeuvre();
        
        $oeuvres = $oeuvre -> getOeuvres();
        return view('listeOeuvres', compact('mangas', 'erreur'));
    }
}
