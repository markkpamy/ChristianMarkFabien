<?php

namespace App\modeles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use DB;

class Utilisateur extends Model
{
    public function login($login, $pwd){
        $connected = false;
        $user = DB::table('user')
                ->select()
                ->where('login', '=', $login)
                ->first();
        if($user){
            if($user -> pwd == $pwd){
                Session::put('id', $user->user_id);
                $connected = true;
            }
        }
    return $connected;
    }
}
