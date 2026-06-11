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
        Schema::create('penilaians', function (Blueprint $table) {
        $table->id();

        $table->foreignId('pelamar_id')->constrained('pelamars')->onDelete('cascade');

        $table->integer('skill');
        $table->integer('pengalaman');
        $table->integer('pendidikan');
        $table->integer('interview');

        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaians');
    }
};
