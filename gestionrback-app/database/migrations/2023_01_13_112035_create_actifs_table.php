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
        Schema::create('actifs', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->string('type');
            $table->string('proprietaire');
            $table->string('processuse');
            $table->string('c');
            $table->string('i');
            $table->string('d');
            $table->string('selectionnee');
            $table->string('commantaire');
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
        Schema::dropIfExists('actifs');
    }
};
