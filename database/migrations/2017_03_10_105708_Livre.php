<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Livre extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('bibliotheques', function (Blueprint $table) 
          {
            $table->increments('id');
            $table->string('isbn_010a');
            $table->string('titre_200a');
            $table->string('complement_du_titre_200e');
            $table->string('auteur_principal_nom_700a');
            $table->string('auteur_principal_prenom_700b');
            $table->string('auteur_principal_qualificatif_700c');
            $table->string('autre_auteur_principal_nom_701a');
            $table->string('autre_auteur_principal_prenom_702b');
            $table->string('utre_auteur_principal_qualificatif_702b');
            $table->string('editeur_210c');
            $table->string('annee_edition_210d');
            $table->string('pagination_215a');
            $table->string('format_215d');
            $table->string('agence_de_catalogage_801b');
            $table->string('numero_de_code_a_barres_915b');
            $table->string('type_de_document_920t');
            $table->string('section_997e');
            $table->string('cote_1_997h');
            $table->string('cote_2_997i');
            $table->string('nom_de_l_emprunteur');
            $table->string('longitude');
            $table->string('latitude');
            $table->string('entityid');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
