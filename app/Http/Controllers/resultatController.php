<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Bibliotheque;



class resultatController extends Controller
{
    public function envoiResultat(Request $request) 
    {

        $parVille = $request->input('parVille');    //Envoi des input du form a la page de resultats
        $parAuteur = $request->input('parAuteur'); //Envoi des input du form a la page de resultats
        $parTitre = $request->input('parTitre');    //Envoi des input du form a la page de resultats

        $table = new Bibliotheque;

        if(isset($parVille) || isset($parAuteur) || isset($parTitre)) 
        {
            $resultat = $table::select('*')->where('nom_de_l_emprunteur', $parVille)
                                                ->orWhere([['auteur_principal_nom_700a', $parAuteur],
                                                           ['nom_de_l_emprunteur', '!=',''], 
                                                        ])
                                                ->orWhere([['titre_200a','=', $parTitre],
                                                          ['nom_de_l_emprunteur', '!=',''],
                                                        ])->distinct()
                                                ->get();
        }



        if(isset($parVille) && isset($parAuteur) && isset($parTitre)) 
        {
            $resultat = $table::select('*')->where([
                                                ['nom_de_l_emprunteur', '=', $parVille],
                                                ['auteur_principal_nom_700a', '=', $parAuteur],
                                                ])->distinct()
                                                ->get();
        }



        if(isset($parVille) && isset($parAuteur) ||isset($parVille) && isset($parTitre) || isset($parAuteur) && isset($parTitre)) 
        {
            $resultat = $table::select('*')->where([
                                                            ['nom_de_l_emprunteur', '=', $parVille],
                                                            ['auteur_principal_nom_700a', '=', $parAuteur],
                                                            ])
                                                    ->orWhere([
                                                            ['nom_de_l_emprunteur', '=', $parVille],
                                                            ['titre_200a', '=', $parTitre],
                                                            ])
                                                    ->orWhere([
                                                            ['auteur_principal_nom_700a', '=', $parAuteur],
                                                            ['titre_200a', '=', $parTitre],
                                                            ['nom_de_l_emprunteur', '!=',''],
                                                            ])->distinct()
                                                    ->get();
        }

                return view('resulta', array('resultat' => $resultat));

    }

    public function afficherMap(Request $request)
    {
        $ville =  $request->input('ville');
        $uneBlibli = new Bibliotheque;
        $lesBibli = $uneBlibli::select("longitude","latitude","nom_de_l_emprunteur")->distinct()->where('nom_de_l_emprunteur',$ville)->get();
        return response()->json([
            'ville'=>$lesBibli
            ]);
    
    }
    
}

