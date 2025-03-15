<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produits',function(Blueprint $table){
            $table->id();
            $table->string('code')->nullable();
            $table->string('libelle');
            $table->integer('prix_u');
            $table->integer('stock');
            $table->integer('id_categorie');
            $table->string('image1');
            $table->string('image2');
            $table->string('image3');
            $table->string('couleur');
            $table->string('garantie')->nullable();
            $table->string('capacite');
            $table->string('puissance');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
