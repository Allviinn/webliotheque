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
		<a id='retour' href="webliotheque71/public/recherche/"><img id='img_retour' src="css/left-arrow.png" alt="retour"></a>
	    <h1>Résultats de votre recherche</h1>
	</header>
    <div id='conteneur'>
    	<script type="text/javascript">
    		var map;	
    		var x;
			var z;
			var nom 
    	</script>
    	<div id='resultat'>
    		<?php
    			$i=0;
    		?>
				@foreach($resultat as $monResultat)
					@if($i==0)
						@if(empty($monResultat->nom_de_l_emprunteur))
							@if(count($resultat)>1)
								<script type="text/javascript">
								    x = '{{ $resultat[1]->longitude}}';
								    z = '{{ $resultat[1]->latitude}}';
								    nom = '{{ $resultat[1]->nom_de_l_emprunteur}}';
								</script>
							@else
								<script type="text/javascript">
								    x = 4.383721499999979;
								    z = 47.0525047;
								    nom = '';
								</script>
							@endif
						@else
							<script type="text/javascript">
							    x = '{{ $monResultat->longitude }}';
							    z = '{{ $monResultat->latitude }}';
							    nom = '{{ $monResultat->nom_de_l_emprunteur }}';
							</script>
						@endif			
					@endif
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
							@if(empty($monResultat->nom_de_l_emprunteur))
    							<p>Ce livre est pas disponible</p>
    						@else
								<a id='' class='lien' href='#'>{{ $monResultat->nom_de_l_emprunteur }} <i class="fa fa-map-marker" aria-hidden="true"></i></a>
							@endif
							<br>
						</article>
						<?php
    						$i++;
    					?>
				@endforeach
		</div>
		<div id="conteneurMap">
			<div id="map"></div>
		</div>
	<div>
	<script type="text/javascript">
		var nbClass;
		nbClass = $('.lien').length;
		map = L.map('map').setView([z,x], 15);
							L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
							    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
							}).addTo(map);
							L.marker([{{ $monResultat->latitude }}, {{ $monResultat->longitude }}]).addTo(map)
							    .bindPopup(nom)
							    .openPopup();
		for(var i=0;i<nbClass;i++)
				{
					if($('.lien')[i].text == nom+" ")
					{
						$('.lien')[i].style.color = ' #E66125';
					}
					else
					{
						$('.lien')[i].style.color = 'White';
					}
				}

		$('document').ready(function(){
			nbClass = $('.lien').length;
			console.log(nbClass);
			$.ajaxSetup({
				headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
			});
			$('.lien').click(function(event){
				for(var i=0;i<nbClass;i++)
				{
					if($('.lien')[i].text == this.text)
					{
						$('.lien')[i].style.color = ' #E66125';
					}
					else
					{
						$('.lien')[i].style.color = 'White';
					}
				}
				event.preventDefault();
				$.ajax({
					type:'POST',
					url:'positionVille',
					data:{
						"_token": '{{ csrf_token() }}',
						"ville": this.text
					},
					success:function(data){
						var x = data.ville[0].longitude;
						var z = data.ville[0].latitude;
		
							map.remove();
							map = L.map('map').setView([z, x], 15);
							L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
							    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
							}).addTo(map);
							L.marker([z, x]).addTo(map)
							    .bindPopup(data.ville[0].nom_de_l_emprunteur)
							    .openPopup();
					}
				});
			});
		});
	</script>
</body>
</html>