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
        <form method='post' id="formRecherche" action='resultat'>
        <header>

            <ul id="listeHeader">
                <li id="ville" class="liPNG"><a href="#"><img class="imgPNG" width="35" src="css/styleAlvin/localisation.png"><a/></li>
                <li id="auteur" class="liPNG"><a href="#"><img class="imgPNG" width="35" src="css/styleAlvin/auteur.png"><a/></li>
                <li id="titre" class="liPNG"><a href="#"><img class="imgPNG" width="35" src="css/styleAlvin/book.png"><a/></li>
                <li id="liSearch"><a id="submit" href="#"><img id="imgSearch" width="35" src="css/styleAlvin/search.png"><a/></li>
            </ul>

        </header>

        <section id="sectionCriteres">

        
            <article class="articleCriteres" id="articleCriteresTitre">

                <h3 style="text-align:center;">Recherche par titre</h3>
                <div class='aligne'>
                <input type="text" name="parTitre" id="parTitre" placeholder="Entrez le titre d'un livre"><br>
                <div class="recupAjax" id="recupAjaxTitre"></div></div>
                <img width="200" src="css/styleAlvin/bookXXL.png">
                <button id="boutonTitrePrecedent"><img src="css/styleAlvin/left-arrow.png"></button>
            </article>


            <article class="articleCriteres" id="articleCriteresAuteur">

                <h3>Recherche par auteur</h3>
                <div class='aligne'>
                <input type="text" name="parAuteur" id="parAuteur" placeholder="Entrez le nom d'un auteur"><br>
                <div class="recupAjax" id="recupAjaxAuteur"></div></div>
                <img width="200" src="css/styleAlvin/auteurXXL.png">
                <button id="boutonAuteurSuivant"><img src="css/styleAlvin/right-arrow.png"></button>
                <button id="boutonAuteurPrecedent"><img src="css/styleAlvin/left-arrow.png"></button>
            </article>


            <article class="articleCriteres" id="articleCriteresVille">

                <h3>Recherche par ville</h3>
                <div class='aligne'>
                <input type="text" name="parVille" id="parVille" placeholder="Entrez le nom d'une ville"><br>
                <div class="recupAjax" id="recupAjaxVille"></div></div>
                <img width="200" src="css/styleAlvin/city.png">

                <button id="boutonVilleSuivant"><img src="css/styleAlvin/right-arrow.png"></button>
            </article>

        <input type="hidden" id="token" name="_token" value="{{ csrf_token() }}">
        </form >
        </section>  

        <div id="div"></div>
        
        <script type="text/javascript" src="js/navCriteresRecherche.js"></script>
    </body>
</html>