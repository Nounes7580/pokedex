<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attacks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')->nullable(); // Rendre le champ nullable
            $table->integer('damage')->nullable(); // Optionnel, selon vos besoins
            $table->text('description')->nullable(); // Optionnel, selon vos besoins
            $table->unsignedBigInteger('type_id');
            $table->timestamps();

            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attacks');
    }
};

