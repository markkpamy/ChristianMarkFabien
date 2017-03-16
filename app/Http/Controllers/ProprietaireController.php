<?php

namespace App\Http\Controllers;
use Request;
use App\modeles\Utilisateur;

class UtilisateurController extends Controller
{
    public function getLogin() {
        $erreur = "";
        return view ('formLogin', compact('erreur'));
    }
    
    public function signIn(){
        $login = Request::input('login');
        $pwd = Request::input('pwd');
        $utilisateur = new Utilisateur();
        $connected = $utilisateur -> login ($login, $pwd);
        if($connected){
            return view ('home');
        } else {
            $erreur = "Login ou mot de passe incorrect !";
            return view ('formLogin', compact ('erreur'));
        }
    }
}
