<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('home');
});

// Afficher le formulaire d'authentification 
Route::get('/getLogin', 'ProprietaireController@getLogin');

// Réponse au clic sur le bouton Valider du formulaire formLogin
Route::post('/signIn', 'ProprietaireController@signIn');
// Déloguer le propriétaire
Route::get('/signOut', 'ProprietaireController@signOut');

// Afficher la liste des Oeuvres
Route::get('/listerOeuvres', 'OeuvreController@getOeuvres');

// Afficher un manga pour pouvoir le modifier
Route::get('/modifierOeuvre/{id}', 'OeuvreController@updateOeuvre');

// Enregistrer la mise à jour d'une oeuvre
Route::post('/validerOeuvre','OeuvreController@validateOeuvre');

// Afficher le formulaire de saisie d'une nouvelle oeuvre
Route::get('/ajouterOeuvre','OeuvreController@addOeuvre');

// Supprimer une oeuvre
Route::get('supprimerOeuvre/{id}', 'OeuvreController@deleteOeuvre');

// Afficher la liste des réservations
Route::get('/reservationOeuvre','ReservationController@getReservation');
// Réserver une oeuvre
Route::get('/addReservation/{titre}', 'ReservationController@addReservation');
// Valider une réservation
Route::post('/validerReservation', 'ReservationController@validerReservation');
// Confirmer une réservation

// Supprimer une réservation


