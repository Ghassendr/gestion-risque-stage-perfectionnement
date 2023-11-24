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
        Schema::create('risques', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('cause');
            $table->string('menaces');
            $table->string('proprietaire');
            $table->string('type');
            $table->string('mesuressec');
            $table->string('financier');
            $table->string('image');
            $table->string('confirmite');
            $table->string('satisfaction');
            $table->string('impacte');
            $table->string('facilite');
            $table->string('vraisemblance');
            $table->string('indice');
            $table->string('criticite');
            $table->string('niveaucrit');
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
        Schema::dropIfExists('risques');
    }
};
