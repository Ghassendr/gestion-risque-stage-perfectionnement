<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ptrs', function (Blueprint $table) {
            $table->id();
             $table->string('name');
             $table->string('traitement');
             $table->string('mesureiso');
             $table->string('action');
             $table->string('responsable');
             $table->string('etat');
             $table->string('efficacite');
             $table->string('commentaire');
             $table->string('impact');
             $table->string('faclite');
             $table->string('vraisemblance');
             $table->string('criticiter');
             $table->string('niveaucriticiter');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ptrs');
    }
};
