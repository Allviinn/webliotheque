$(document).ready(function() {
  
  var menu = $('#articleCriteresMenu');
	var parVille = $('#articleCriteresVille');
	var parAuteur = $('#articleCriteresAuteur');
	var parTitre = $('#articleCriteresTitre');

  //------------------------------------------------------------------------------------------------------------

	$('#boutonVilleSuivant').on('click', function(event) {   //navigation des articles de recherche superposés sur les fleches
		event.preventDefault();
		      parVille.animate({left: '-80%'}, 200, function() {
              parVille.css('z-index', '5');
              parTitre.css('z-index', '10');
              parAuteur.css('z-index', '15');
          });
      parVille.animate({left: '5%'}, 200);
    
	});

	$('#boutonAuteurSuivant').on('click', function(event) {    //navigation des articles de recherche superposés sur les fleches
		event.preventDefault();
		      parAuteur.animate({left: '-80%'}, 200, function() {
              parAuteur.css('z-index', '5');
              parVille.css('z-index', '10');
              parTitre.css('z-index', '15');

        });
    parAuteur.animate({left: '9%'}, 200);
	});

  $('#boutonTitreSuivant').on('click', function() {
      event.preventDefault();
          parTitre.animate({left: '-80%'}, 200, function() {
              parTitre.css('z-index', '5');
              parAuteur.css('z-index', '10');
              parVille.css('z-index', '15');

          });
    parTitre.animate({left: '13%'}, 200);
  });

//------------------------------------------------------------------------------------------------------------
        
        $('#parVille').keyup(function(e){//ajax, envoi de donnée de la recherche par ville
        	$('#recupAjaxVille').html('');
        	var code = e.which;
        	if(code == 16 || code == 20) {
       			return;
    		}

    		if($('#parVille').val().length !== 0) {
				$('#recupAjaxVille').css('visibility', 'visible');  //ajax, envoi de donnée de la recherche par ville

    		} else if($('#parVille').val().length == 0) {

				$('#recupAjaxVille').css('visibility', 'hidden');
    		}

            $.ajax({
                type:'POST',
                 url:'rechercheVille',
                 data: {
                    "_token": $('#token').attr('value'),//ajax, envoi de donnée de la recherche par ville
                    "villes": $('#parVille').val()
                    },
                 success:function(data){
                 	for (var k = 0; k < data.villes.length ; k++) {
                		$('#recupAjaxVille').append('<a href="" class="listeVilles" style="margin: 0px; padding: 0px; text-decoration: none;">' + data.villes[k].nom_de_l_emprunteur +'</a><br>');

              		}
                    
                    $('.listeVilles').on('click', function(e) {//ajax, envoi de donnée de la recherche par ville
                    	e.preventDefault();
        				$('#parVille').val($(this).html());
        				$('#recupAjaxVille').css('visibility', 'hidden');
        			});

                }
            });
        });
//------------------------------------------------------------------------------------------------------------
        $('#parAuteur').keyup(function(e){

        	$('#recupAjaxAuteur').html('');
        	var code = e.which;
        	if(code == 16 || code == 20) {//ajax, envoi de donnée de la recherche par auteur
       			return;
    		}

    		if($('#parAuteur').val().length !== 0) {
				$('#recupAjaxAuteur').css('visibility', 'visible');//ajax, envoi de donnée de la recherche par auteur

    		} else if($('#parAuteur').val().length == 0) {

				$('#recupAjaxAuteur').css('visibility', 'hidden');//ajax, envoi de donnée de la recherche par auteur
    		}

            $.ajax({
                type:'POST',
                 url:'rechercheAuteur',
                 data: {
                    "_token": $('#token').attr('value'),//ajax, envoi de donnée de la recherche par auteur
                    "auteurs": $('#parAuteur').val()
                    },
                 success:function(data){

                      for (var k = 0; k < data.villesAuteur.length ; k++) {//ajax, envoi de donnée de la recherche par auteur
                		$('#recupAjaxAuteur').append('<a href="" class="listeAuteurs" style="margin: 0px; padding: 0px; text-decoration: none;">' + data.villesAuteur[k].auteur_principal_nom_700a +'</a><br>');

              		}  

              		$('.listeAuteurs').on('click', function(e) {//ajax, envoi de donnée de la recherche par auteur
              			e.preventDefault();
        				$('#parAuteur').val($(this).html());
        				$('#recupAjaxAuteur').css('visibility', 'hidden');
        			});
                }
            });
        });
//------------------------------------------------------------------------------------------------------------
        $('#parTitre').keyup(function(e){

        	$('#recupAjaxTitre').html('');
        	var code = e.which;
        	if(code == 16 || code == 20) {//ajax, envoi de donnée de la recherche par titre de livre
       			return;
    		}

    		if($('#parTitre').val().length !== 0) {
				$('#recupAjaxTitre').css('visibility', 'visible');//ajax, envoi de donnée de la recherche par titre de livre

    		} else if($('#parTitre').val().length == 0) {

				$('#recupAjaxTitre').css('visibility', 'hidden');
    		}

            $.ajax({
                type:'POST',
                 url:'rechercheTitre',
                 data: {
                    "_token": $('#token').attr('value'),//ajax, envoi de donnée de la recherche par titre de livre
                    "titres": $('#parTitre').val()
                    },
                 success:function(data){

                      for (var k = 0; k < data.villesTitre.length ; k++) {//ajax, envoi de donnée de la recherche par titre de livre
                		$('#recupAjaxTitre').append('<a href="" class="listeTitres" style="margin: 0px; padding: 0px; text-decoration: none;">' + data.villesTitre[k].titre_200a +'</a><br>');

              		}  

              		$('.listeTitres').on('click', function(e) {//ajax, envoi de donnée de la recherche par titre de livre
              			e.preventDefault();
        				$('#parTitre').val($(this).html());
        				$('#recupAjaxTitre').css('visibility', 'hidden');eqrhyqerh
        			});
                }
            });
        });


//------------------------------------------------------------------------------------------------------------
    if ($(window).width() < 1000) {

          $('#checkVille').change(function() {
                if($(this).is(':checked') == true) {
                        $('#ville').css('color', '#d90b37');
                         $('#articleCriteresVille').css('opacity', '1');
                } else {
                      $('#ville').css('color', '#696273');
                      $('#articleCriteresVille').css('opacity', '0');
                }
          });

           $('#checkAuteur').change(function() {
                if($(this).is(':checked') == true) {
                        $('#auteur').css('color', '#d90b37');
                        $('#articleCriteresAuteur').css('opacity', '1');
                } else {
                      $('#auteur').css('color', '#696273');
                       $('#articleCriteresAuteur').css('opacity', '0');
                }
          });

           $('#checkTitre').change(function() {
                if($(this).is(':checked') == true) {
                        $('#titre').css('color', '#d90b37');
                       $('#articleCriteresTitre').css('opacity', '1');
                } else {
                      $('#titre').css('color', '#696273');
                       $('#articleCriteresTitre').css('opacity', '0');
                }
          });


           $('.check').change(function() {
            if ($('#checkTitre').is(':checked') == false 
                && $('#checkAuteur').is(':checked') == false 
                && $('#checkVille').is(':checked') == false) {
                $('#unCritereMin').css('opacity', '1');
            } else {
              $('#unCritereMin').css('opacity', '0');
            }

            if ($('#checkTitre').is(':checked') == true && $('#checkAuteur').is(':checked') == false  && $('#checkVille').is(':checked') == false || $('#checkTitre').is(':checked') == false && $('#checkAuteur').is(':checked') == true && $('#checkVille').is(':checked') == false || $('#checkTitre').is(':checked') == false && $('#checkAuteur').is(':checked') == false && $('#checkVille').is(':checked') == true) {

                $('.autreCriteres').css('display', 'none');

            } else {

              $('.autreCriteres').css('display', 'block');
            }

          });
        
    } else {
          $('#checkVille').change(function() {
                if($(this).is(':checked') == true) {
                        $('#ville').css('color', '#d90b37');
                        $('#articleCriteresVille').css('opacity', '1');
                        $('#parVille').removeAttr('disabled');
                } else {
                      $('#ville').css('color', '#696273');
                      $('#articleCriteresVille').css('opacity', '0.3');
                      $('#parVille').attr('disabled', 'disabled');
                }
          });

           $('#checkAuteur').change(function() {
                if($(this).is(':checked') == true) {
                        $('#auteur').css('color', '#d90b37');
                        $('#articleCriteresAuteur').css('opacity', '1');
                        $('#parAuteur').removeAttr('disabled');
                } else {
                      $('#auteur').css('color', '#696273');
                       $('#articleCriteresAuteur').css('opacity', '0.3');
                       $('#parAuteur').attr('disabled', 'disabled');
                }
          });

           $('#checkTitre').change(function() {
                if($(this).is(':checked') == true) {
                      $('#titre').css('color', '#d90b37');
                      $('#articleCriteresTitre').css('opacity', '1');
                      $('#parTitre').removeAttr('disabled');
                } else {
                      $('#titre').css('color', '#696273');
                       $('#articleCriteresTitre').css('opacity', '0.3');
                       $('#parTitre').attr('disabled', 'disabled');
                }
          });

           $('.check').change(function() {
            if ($('#checkTitre').is(':checked') == false 
                && $('#checkAuteur').is(':checked') == false 
                && $('#checkVille').is(':checked') == false) {
                $('#unCritereMin').css('opacity', '1');
                $('#unCritereMin').css('z-index', '19');
            } else {
              $('#unCritereMin').css('opacity', '0');
            }

          });
    }
//--------------------------------Clik sur lancer recherche ---------------------

$('#submit').on('click', function(e) {
      if ($('#checkTitre').is(':checked') == false 
      && $('#checkAuteur').is(':checked') == false 
      && $('#checkVille').is(':checked') == false) {
                
          alert('Saisissez au moins un critere');
          e.preventDefault();        
            } else {
              
            }


});


	
});