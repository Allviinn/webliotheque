$(document).ready(function() {
  
  var menu = $('#articleCriteresMenu');
	var parVille = $('#articleCriteresVille');
	var parAuteur = $('#articleCriteresAuteur');
	var parTitre = $('#articleCriteresTitre');

	$('#boutonVilleSuivant').on('click', function(event) {
		event.preventDefault();
		parVille.animate({left: '-200%'});

	});

	$('#boutonAuteurSuivant').on('click', function(event) {
		event.preventDefault();
		parAuteur.animate({left: '-200%'});

	});

	$('#boutonTitrePrecedent').on('click', function(event) {
		event.preventDefault();
		parAuteur.animate({left: '9%'});

	});

	$('#boutonAuteurPrecedent').on('click', function(event) {
		event.preventDefault();
		parVille.animate({left: '5%'});

	});

	$('#submit').on('click', function() {
		$('#formRecherche').submit();
	});

        
        $('#parVille').keyup(function(e){
        	$('#recupAjaxVille').html('');
        	var code = e.which;
        	if(code == 16 || code == 20) {
       			return;
    		}

    		if($('#parVille').val().length !== 0) {
				$('#recupAjaxVille').css('visibility', 'visible');

    		} else if($('#parVille').val().length == 0) {

				$('#recupAjaxVille').css('visibility', 'hidden');
    		}

            $.ajax({
                type:'POST',
                 url:'rechercheVille',
                 data: {
                    "_token": $('#token').attr('value'),
                    "villes": $('#parVille').val()
                    },
                 success:function(data){
                 	for (var k = 0; k < data.villes.length ; k++) {
                		$('#recupAjaxVille').append('<a href="" class="listeVilles" style="margin: 0px; padding: 0px; text-decoration: none;">' + data.villes[k].nom_de_l_emprunteur +'</a><br>');

              		}
                    
                    $('.listeVilles').on('click', function(e) {
                    	e.preventDefault();
        				$('#parVille').val($(this).html());
        				$('#recupAjaxVille').css('visibility', 'hidden');
        			});

                }
            });
        });

        $('#parAuteur').keyup(function(e){

        	$('#recupAjaxAuteur').html('');
        	var code = e.which;
        	if(code == 16 || code == 20) {
       			return;
    		}

    		if($('#parAuteur').val().length !== 0) {
				$('#recupAjaxAuteur').css('visibility', 'visible');

    		} else if($('#parAuteur').val().length == 0) {

				$('#recupAjaxAuteur').css('visibility', 'hidden');
    		}

            $.ajax({
                type:'POST',
                 url:'rechercheAuteur',
                 data: {
                    "_token": $('#token').attr('value'),
                    "auteurs": $('#parAuteur').val()
                    },
                 success:function(data){

                      for (var k = 0; k < data.villesAuteur.length ; k++) {
                		$('#recupAjaxAuteur').append('<a href="" class="listeAuteurs" style="margin: 0px; padding: 0px; text-decoration: none;">' + data.villesAuteur[k].auteur_principal_nom_700a +'</a><br>');

              		}  

              		$('.listeAuteurs').on('click', function(e) {
              			e.preventDefault();
        				$('#parAuteur').val($(this).html());
        				$('#recupAjaxAuteur').css('visibility', 'hidden');
        			});
                }
            });
        });

        $('#parTitre').keyup(function(e){

        	$('#recupAjaxTitre').html('');
        	var code = e.which;
        	if(code == 16 || code == 20) {
       			return;
    		}

    		if($('#parTitre').val().length !== 0) {
				$('#recupAjaxTitre').css('visibility', 'visible');

    		} else if($('#parTitre').val().length == 0) {

				$('#recupAjaxTitre').css('visibility', 'hidden');
    		}

            $.ajax({
                type:'POST',
                 url:'rechercheTitre',
                 data: {
                    "_token": $('#token').attr('value'),
                    "titres": $('#parTitre').val()
                    },
                 success:function(data){

                      for (var k = 0; k < data.villesTitre.length ; k++) {
                		$('#recupAjaxTitre').append('<a href="" class="listeTitres" style="margin: 0px; padding: 0px; text-decoration: none;">' + data.villesTitre[k].titre_200a +'</a><br>');

              		}  

              		$('.listeTitres').on('click', function(e) {
              			e.preventDefault();
        				$('#parTitre').val($(this).html());
        				$('#recupAjaxTitre').css('visibility', 'hidden');
        			});
                }
            });
        });



    if ($(window).width() < 1000) {

        $('#imageMenuLo').attr('src', 'css/styleAlvin/localisation-couleur.png');

        $('#menuVille').on('click', function(e) {
          e.preventDefault();
          $('#imageMenuLo').attr('src', 'css/styleAlvin/localisation-couleur.png');
          $('#imageMenuAu').attr('src', 'css/styleAlvin/auteur.png');
          $('#imageMenuTi').attr('src', 'css/styleAlvin/book.png');
           parAuteur.animate({left: '9%'});
           parVille.animate({left: '5%'});
        });


        $('#menuAuteur').on('click', function(e) {
          $('#imageMenuLo').attr('src', 'css/styleAlvin/localisation.png');
          $('#imageMenuAu').attr('src', 'css/styleAlvin/auteur-couleur.png');
          $('#imageMenuTi').attr('src', 'css/styleAlvin/book.png');
          e.preventDefault();
            parVille.animate({left: '-200%'});
            parAuteur.animate({left: '9%'});
        });


        $('#menuTitre').on('click', function(e) {
          $('#imageMenuLo').attr('src', 'css/styleAlvin/localisation.png');
          $('#imageMenuAu').attr('src', 'css/styleAlvin/auteur.png');
          $('#imageMenuTi').attr('src', 'css/styleAlvin/book-couleur.png');
          e.preventDefault();
            parVille.animate({left: '-200%'});
            parAuteur.animate({left: '-200%'});
        });
} else {
    $('#menuVille, #menuAuteur, #menuTitre').on('click', function(e) {
          e.preventDefault();
          
        });
}



	
});