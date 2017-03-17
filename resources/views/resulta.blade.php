<!DOCTYPE html>
<html>
<head>
	<title>Résultats</title>
	<link rel="stylesheet" type="text/css" href="css/style_affichage_resulta.css">
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.0.3/dist/leaflet.css" />
	<link href="https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css" rel="stylesheet">
	<script src="https://unpkg.com/leaflet@1.0.3/dist/leaflet.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.1.js" integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA=" crossorigin="anonymous"></script>
</head>
<body>
	<header>
	    <h1>Résultats de votre</h1>
	</header>
    <div id='conteneur'>
    	<div id='resultat'>
				@foreach($resultat as $monResultat)
					@if(empty($monResultat->nom_de_l_emprunteur))
    					<p>Ce live est pas disponible</p>
    				@else
						<article class="unArticle">
							<label>Titre de l'ouvrage:</label>
							<p>{{ $monResultat->titre_200a }}</p><br>
							<label>Nom de l'auteur:</label>
							<p>{{ $monResultat->auteur_principal_nom_700a }}</p><br>
							<label>Prénom de l'auteur:</label>
							<p>{{ $monResultat->auteur_principal_prenom_700b }}</p><br>
							<label>Editeur:</label>
							<p>{{ $monResultat->editeur_210c }}</p><br>
							<label>Année d'édition:</label>
							<p>{{ $monResultat->annee_edition_210d }}</p><br>
							<label>Type de document:</label>
							<p>{{ $monResultat->type_de_document_920t }}</p><br>
							<label>Bibliothèque:</label>
							<a id='{{ $monResultat->nom_de_l_emprunteur }}' class='lien' href='#'>{{ $monResultat->nom_de_l_emprunteur }} <i class="fa fa-map-marker" aria-hidden="true"></i></a>
							<br>
						</article>
					@endif
				@endforeach
		
		</div>
		<div id="conteneurMap">
			<div id="map"></div>
		</div>
	<div>
	<script type="text/javascript">
		var test = false;
		var map;
		$('document').ready(function(){
			$.ajaxSetup({
				headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
			});
			$('a').click(function(event){
				event.preventDefault();

				$.ajax({
					type:'POST',
					url:'positionVille',
					data:{
						"_token": '{{ csrf_token() }}',
						"ville": this.id
					},
					success:function(data){
						var x = data.ville[0].longitude;
						var z = data.ville[0].latitude;
						if(test == false )
						{
							map = L.map('map').setView([z, x], 20);
							L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
							    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
							}).addTo(map);
							L.marker([z, x]).addTo(map)
							    .bindPopup(data.ville[0].nom_de_l_emprunteur)
							    .openPopup();
							test = true;
						}
						else
						{
							map.remove();
							map = L.map('map').setView([z, x], 20);
							L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
							    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
							}).addTo(map);
							L.marker([z, x]).addTo(map)
							    .bindPopup(data.ville[0].nom_de_l_emprunteur)
							    .openPopup();
							
						}
					}
				});
			});
		});
	</script>
</body>
</html>