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
      Schema::create('profils', function (Blueprint $table) {
    $table->id();
    $table->foreignId('etudiant_id')->constrained()->onDelete('cascade');
    $table->string('photo')->nullable();
    $table->string('telephone')->nullable();
    $table->string('adresse')->nullable();
    $table->date('date_naissance')->nullable();
    $table->enum('sexe', ['M', 'F'])->nullable();
    $table->text('bio')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profils');
    }
};
