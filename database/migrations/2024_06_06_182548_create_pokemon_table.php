<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pokemon', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('hp');
            $table->float('weight');
            $table->float('height');
            $table->unsignedBigInteger('type1_id');
            $table->unsignedBigInteger('type2_id')->nullable();
            $table->string('image'); // Ajout de la colonne image
            $table->timestamps();

            $table->foreign('type1_id')->references('id')->on('types')->onDelete('cascade');
            $table->foreign('type2_id')->references('id')->on('types')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pokemon');
    }
};