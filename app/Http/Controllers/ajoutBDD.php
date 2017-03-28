<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bibliotheque;


class ajoutBDD extends Controller
{
     public function insert()
    {
    	set_time_limit(0);
    	$uneBlibli = new Bibliotheque;
<<<<<<< HEAD
    	if (($handle = fopen("C:\Users\Stagiaire\Desktop\modif\OpenDataDLP.csv", "r")) !== FALSE) 
=======
<<<<<<< HEAD
    	if (($handle = fopen("/home/seguin/OpenDataDLP.csv", "r")) !== FALSE) 
=======


    	if (($handle = fopen("\home\mujkic\OpenDataDLP.csv", "r")) !== FALSE) 
>>>>>>> 09d266bf2488c566817b80917651e0ba5ee92108
>>>>>>> 0e89c4cd1a584d2e525967c2a109191a2c063e4d
    	{
		    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
		    {
		        $num = count($data);
		        
		        		if(empty ($data[21])!=true)
		        		{
		
		        			$chaine1 = $data[21];
		        			$test = $chaine1;
			    		    if($chaine1[1]!='.')
							{
								
								$Achanger1 = substr($chaine1, 0, 1);
								$resulta1 = $Achanger1.'.';
								$resulta1 = $resulta1.substr($chaine1, 1);
							}
							else
							{
								$resulta1 = $data[21];
							}
						}
						else
						{
							$resulta1 = $data[21];
						}
		
						
						if(empty ($data[22])!=true)
						{
			    		    $chaine = $data[22];
			    		   	if($chaine[2]!='.')
							{
								$Achanger = substr($chaine, 0, 2);
								$resulta = $Achanger.'.';
								$resulta = $resulta.substr($chaine, 2);
							}
							else
							{
								$resulta = $data[22];
							}
						}
						else
						{
							$resulta = $data[22];
						}
		        $uneBlibli->insert
		        ([
	    			'titre_200a'=>$data[2],
	    			'complement_du_titre_200e'=>$data[3],
	    			'auteur_principal_nom_700a'=>$data[4],
	    			'auteur_principal_prenom_700b'=>$data[5],	
	    			'editeur_210c'=>$data[10],
	    			'annee_edition_210d'=>$data[11],	
	    			'type_de_document_920t'=>$data[16],
	    			'nom_de_l_emprunteur'=>$data[20],	
	    			'longitude'=>$resulta1,
<<<<<<< HEAD
	    			'latitude'=>$resulta
=======
<<<<<<< HEAD
	    			'latitude'=>$resulta
=======

	    			'latitude'=>$resulta

    			

>>>>>>> 09d266bf2488c566817b80917651e0ba5ee92108
>>>>>>> 0e89c4cd1a584d2e525967c2a109191a2c063e4d
    			]);

		    }
    		fclose($handle);
		}
    }
}
