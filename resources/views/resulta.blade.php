<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />
	<script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
</head>
<body>


    <h1>Hello world !!!</h1>
@foreach($resultat as $monResultat)
	
	<p>{{ $monResultat->titre_200a }}</p><br>
	<p>{{ $monResultat->auteur_principal_nom_700a }}</p><br>
	<p>{{ $monResultat->auteur_principal_prenom_700b }}</p><br>
	<p>{{ $monResultat->editeur_210c }}</p><br>
	<p>{{ $monResultat->annee_edition_210d }}</p><br>
	<p>{{ $monResultat->type_de_document_920t }}</p><br>
	<p>{{ $monResultat->nom_de_l_emprunteur }}</p><br>
	<p>{{ $monResultat->longitude }}</p><br>
	<p>{{ $monResultat->latitude }}</p><br>
	

@endforeach

</body>
</html>