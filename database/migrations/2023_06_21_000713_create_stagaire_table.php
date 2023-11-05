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
        Schema::create('stagiaires', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("cin");
            $table->string("name");
            $table->string("sex");
            $table->bigInteger("age");
            $table->string("mobile");
            $table->string("email");
            $table->string("stage");
            $table->string("specialite");
            $table->string("etude");
            $table->string("cv");
            $table->date("datedebut");
            $table->date("datefin");


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stagiaires');
    }
};
