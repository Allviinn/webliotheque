<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Bibliotheque;


class rechercheController extends Controller
{
    public function index() {
		return view('recherche'); 
    }

    

    public function rechercheVille( Request $request)
    {		
		if($request->ajax()) 
        {
            $parVille = $request->input('villes');

       		$villes = new Bibliotheque;

       		
       			$villes1 = $villes::select("nom_de_l_emprunteur")->where('nom_de_l_emprunteur', 'like', $parVille.'%')->limit(20)->distinct()->get();
       			return response()->json(array('villes' => $villes1));        
        } 

    }

     public function rechercheAuteur( Request $request)
    {		
		if($request->ajax()) 
        {
            $parAuteur = $request->input('auteurs');

       		$villes = new Bibliotheque;

				$villesAuteur = $villes::select("auteur_principal_nom_700a")->where('auteur_principal_nom_700a', 'like', $parAuteur.'%')->limit(20)->distinct()->get();
       			return response()->json(array('villesAuteur' => $villesAuteur));
        } 

    }

     public function rechercheTitre( Request $request)
    {		
		if($request->ajax()) 
        {
            $parTitre = $request->input('titres');

       		$villes = new Bibliotheque;

				$villesTitres = $villes::select("titre_200a")->where('titre_200a', 'like', $parTitre.'%')->limit(20)->distinct()->get();
       			return response()->json(array('villesTitre' => $villesTitres)); 
       		         
        } 

    }
    
}
