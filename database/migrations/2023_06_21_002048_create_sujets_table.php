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
        Schema::create('sujets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("sujet");
            $table->string("nameen");
            $table->string("namestag1");
            $table->string("namestag2");
            $table->string("langage");
            $table->string("descption");
            $table->string("rappoert");
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sujet');
    }
};
