<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" type="text/css" href="css/styleAlvin/styleRechercheCriteres.css">

        <title>Laravel</title>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"
                integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
                crossorigin="anonymous"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    </head>
    <body>
        <form method='post' id="formRecherche" action='resultat' autocomplete='off'>
        <header>

            <ul id="listeHeader">
                <li id="home" class="liPNG"><a href="webliotheque71/public/">Accueil</a></li>
                <li id="recherchPar" class="liPNG">Rechercher par :</li>
                <li id="ville" class="liPNG">Ville&nbsp;&nbsp;<input type="checkbox" id="checkVille" class="check" checked></li>
                <li id="auteur" class="liPNG">Auteur&nbsp;&nbsp;<input type="checkbox" id="checkAuteur" class="check" checked></li>
                <li id="titre" class="liPNG">Titre&nbsp;&nbsp;<input type="checkbox" id="checkTitre" class="check" checked></li>
                
            </ul>

        </header>

        <section id="sectionCriteres">

        
            <article class="articleCriteres" id="articleCriteresTitre">

                <h3 style="text-align:center;">Recherche par titre</h3>
                <div class='aligne'>
                <input type="text" name="parTitre" id="parTitre" placeholder="Entrez le titre d'un livre"><br>
                <div class="recupAjax" id="recupAjaxTitre"></div></div>
                <img width="200" class="xxl" src="css/styleAlvin/bookXXL.png">
                <button class="autreCriteres" id="boutonTitreSuivant">Autres critères de recherche&nbsp;&nbsp;<img width="15" src="css/styleAlvin/right-arrow.png"></button>
            </article>


            <article class="articleCriteres" id="articleCriteresAuteur">

                <h3>Recherche par auteur</h3>
                <div class='aligne'>
                <input type="text" name="parAuteur" id="parAuteur" placeholder="Entrez le nom d'un auteur"><br>
                <div class="recupAjax" id="recupAjaxAuteur"></div></div>
                <img width="200" class="xxl" src="css/styleAlvin/auteurXXL.png">
                <button class="autreCriteres" id="boutonAuteurSuivant">Autres critères de recherche&nbsp;&nbsp;<img width="15" src="css/styleAlvin/right-arrow.png"></button>
            </article>


            <article class="articleCriteres" id="articleCriteresVille">

                <h3>Recherche par ville</h3>
                <div class='aligne'>
                <input type="text" name="parVille" id="parVille" placeholder="Entrez le nom d'une ville"><br>
                <div class="recupAjax" id="recupAjaxVille"></div></div>
                <img width="200" class="xxl" src="css/styleAlvin/city.png">

                <button class="autreCriteres" id="boutonVilleSuivant">Autres critères de recherche&nbsp;&nbsp;<img width="15" src="css/styleAlvin/right-arrow.png"></button>
            </article>
        <div id="unCritereMin">Veullez sélectionner au moins un critère de recherche</div>
        <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
        <button id="submit">Lancer la recherche !</button>
        </form >
        </section>  

        <div id="div"></div>
        
        <script type="text/javascript" src="js/navCriteresRecherche.js"></script>
    </body>
</html>