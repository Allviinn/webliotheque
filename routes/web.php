
<?php

Route::get('/a_propos', function (){
	return view('a_propos');
});

Route::get('/', 'accueilController@accueil');

Route::get('recherche', 'rechercheController@index');




// scrite d'ajout a la BDD webliotheque
<<<<<<< HEAD
Route::get('/ajoutBDD','ajoutBDD@insert');
=======
 Route::get('/ajoutBDD','ajoutBDD@insert');
>>>>>>> 09d266bf2488c566817b80917651e0ba5ee92108

Route::post('positionVille', 'resultatController@afficherMap');


Route::post('resultat', 'resultatController@envoiResultat');

Route::post('rechercheVille', 'rechercheController@rechercheVille');

Route::post('rechercheAuteur', 'rechercheController@rechercheAuteur');

Route::post('rechercheTitre', 'rechercheController@rechercheTitre');

