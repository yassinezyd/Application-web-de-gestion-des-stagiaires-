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
        Schema::create('encadrants', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger("idont");
            $table->string("name");
            $table->string("email");
            $table->string("mobile");
            $table->string("specialite");
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encadrants');
    }
};
